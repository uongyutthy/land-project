<?php
namespace App\Traits;


use App\Enums\StateValidateEnum;
use App\Models\BaseModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Enums\StateEnum;

trait StandardAuthorizeForm
{
    /**
     * @var $repository used for standard
     */
    private $repository;


    public function updateState($id, $nextState)
    {
        $currentData = $this->repository->find($id);
        $currentState = $currentData->{BaseModel::RECORD_STATE_ID};
        $validate = $this->validateNextState($currentState, $nextState);

        if($validate["status"] === StateValidateEnum::Yes) {
            DB::beginTransaction();
            try{
                $this->repository->update([BaseModel::RECORD_STATE_ID => $nextState], $id);

                if($nextState == StateEnum::Approved){
                    $this->approve($id);
                }elseif($nextState == StateEnum::Revised){
                    $this->revise($id);
                }

                DB::commit();
                return $this->getSuccessResponseArray(__('global.update_success'));
            }catch (\Exception $e){
                Log::error($e->getTraceAsString());
                DB::rollBack();
                return $this->getErrorResponseArray(Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
            }
        }

        Log::error($validate["message"]);
        return $this->getErrorResponseArray(Response::HTTP_INTERNAL_SERVER_ERROR, $validate["message"]);
    }



    /**
     * validate the next state is allow or not
     * @param integer $currentState
     * @param integer $nextState
     * @return array ['status'=> "", 'message'=> ""]
     */
    public function validateNextState($currentState, $nextState)
    {
        $msg = ['message'=>null, 'status'=> StateValidateEnum::Yes];
        if(!in_array($nextState, $this->getAllowNextStates($currentState)))
        {
            switch ($currentState)
            {
                case StateEnum::Pending:
                    $msg['message'] = __("state.pending");
                    break;
                case StateEnum::Verified:
                    $msg['message'] = __("state.verified");
                    break;
                case StateEnum::Approved:
                    $msg['message'] = __("state.approved");
                    break;
                case StateEnum::RejectedVerified:
                case StateEnum::RejectedApproved:
                    $msg['message'] = __("state.reject");
                    break;
            }

            if(!empty($msg['message'])) $msg['status'] = StateValidateEnum::No;
        }
        return $msg;
    }

    /**
     * Get all allow of the current state
     * @param integer $currentState
     * @return array
     */
    public function getAllowNextStates($currentState)
    {
        $allowState = [];
        switch ($currentState)
        {
            case StateEnum::Pending:
                $allowState = [StateEnum::Verified, StateEnum::RejectedVerified];
                break;
            case StateEnum::Verified:
                $allowState = [StateEnum::Approved, StateEnum::RejectedApproved];
                break;
            case StateEnum::Approved:
                $allowState = [StateEnum::Revised];
                break;
            case StateEnum::RejectedVerified:
            case StateEnum::RejectedApproved:
                $allowState = [StateEnum::Pending];
                break;
        }
        return $allowState;
    }
}