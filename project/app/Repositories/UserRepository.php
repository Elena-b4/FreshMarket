<?php


namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function getAuthUser()
    {
        return Auth::user();
    }


}
