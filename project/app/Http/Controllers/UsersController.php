<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UsersController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showUserDetails()
    {
        $user = $this->userRepository->getAuthUser();
        return view('Account.user-details', compact('user'));
    }

    public function login()
    {
        return view('Account.user-login');
    }

    public function registerUser()
    {
        return view('Account.user-register');
    }

    public function storeOrder(StoreRequest $request)
    {
        $data = $request->validated();
        $id = $this->userRepository->getAuthUser()->id;
        UserHelper::storeOrder($data, $id);
        return redirect()->route('users.showUserDetails');
    }

    public function updateUserDetails(User $user, UpdateRequest $request)
    {
        $data = $request->validated();
        UserHelper::updateUserDetails($data, $user);
        return redirect()->back();
    }

}
