<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupProfileCreateRequest;
use App\Http\Requests\GroupProfileUpdateRequest;
use App\Contracts\Repositories\IGroupProfileRepository;
use App\Validators\GroupProfileValidator;

/**
 * Class GroupProfilesController.
 *
 * @package namespace App\Http\Controllers;
 */
class GroupProfilesController extends Controller
{
    /**
     * @var IGroupProfileRepository
     */
    protected $repository;

    /**
     * @var GroupProfileValidator
     */
    protected $validator;

    /**
     * GroupProfilesController constructor.
     *
     * @param IGroupProfileRepository $repository
     * @param GroupProfileValidator $validator
     */
    public function __construct(IGroupProfileRepository $repository, GroupProfileValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $groupProfiles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $groupProfiles,
            ]);
        }

        return view('groupProfiles.index', compact('groupProfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupProfileCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(GroupProfileCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $groupProfile = $this->repository->create($request->all());

            $response = [
                'message' => 'GroupProfile created.',
                'data'    => $groupProfile->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupProfile = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $groupProfile,
            ]);
        }

        return view('groupProfiles.show', compact('groupProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groupProfile = $this->repository->find($id);

        return view('groupProfiles.edit', compact('groupProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GroupProfileUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(GroupProfileUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $groupProfile = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'GroupProfile updated.',
                'data'    => $groupProfile->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'GroupProfile deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'GroupProfile deleted.');
    }
}
