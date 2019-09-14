<?php

namespace App\Http\Controllers;

use App\Contracts\Services\IUserService;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    private $userService;

    public function __construct(IUserService $userService)
    {
        parent::__construct();
        $this->userService = $userService;
    }

    /**
     * Show profile form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    /**
     * Update user profile
     *
     * @param ProfileUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProfileUpdateRequest $request) {
        $user = $this->userService->updateProfile($request);
        return response()->json([
            'status' => boolval($user),
            'message' => $user ? __('global.update_success') : __('global.update_fail')
        ], $user ? 200 : 500);
    }
}
