<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function author(User $us, User $user){
        if($us->id==$user->id){
            return true;
        }else{
            return false;
        }
    }
}
