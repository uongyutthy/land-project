<?php
/**
 * Created by PhpStorm.
 * User: Tong Sovann
 * Date: 31 March 2019
 * Time: 11:48 AM
 */

namespace App\Services;

use App\Helpers\Helpers;
use App\Models\BaseAuthorizeFormModel;
use App\Models\BaseModel;
use Illuminate\Http\Response;

class BaseAuthorizeFormService
{

    /**
     * Update the record state
     * @param integer $id
     * @param integer $state
     * @param null $reason
     * @return mixed|array
     */
    public function status($id, $state, $reason = null)
    {
        return $this->updateState($id, $state, $reason);
    }

    private function updateState($id, $state, $reason = null){
        $model = $this->getById($id);
        $validation = $this->repository->validateNextState($model->{BaseAuthorizeFormModel::RECORD_STATE_ID},$state);

        if($validation['status'] == BaseAuthorizeFormModel::VALIDATION_YES)
        {
            $this->repository->update([BaseAuthorizeFormModel::RECORD_STATE_ID => $state], $id);
            return $this->getSuccessResponseArray(__("global.save_success"));
        }

        return $this->getErrorResponseArray(Response::HTTP_BAD_REQUEST, $validation['message']);
    }
}