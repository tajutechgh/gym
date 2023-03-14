<?php

namespace App\Policies;

use App\Model\admin\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function staffs(User $user)
    {
        return $this->getPermission($user,1);
    }

    public function members(User $user)
    {
        return $this->getPermission($user,2);
    }

    public function memberships(User $user)
    {
        return $this->getPermission($user,3);
    }

    public function classes(User $user)
    {
        return $this->getPermission($user,4);
    }

    public function classaction(User $user)
    {
        return $this->getPermission($user,5);
    }

    public function groups(User $user)
    {
        return $this->getPermission($user,6);
    }

    public function groupaction(User $user)
    {
        return $this->getPermission($user,7);
    }

    public function attendance(User $user)
    {
        return $this->getPermission($user,8);
    }

    public function products(User $user)
    {
        return $this->getPermission($user,9);
    }

    public function equipments(User $user)
    {
        return $this->getPermission($user,10);
    }

    public function message(User $user)
    {
        return $this->getPermission($user,11);
    }

    public function report(User $user)
    {
        return $this->getPermission($user,12);
    }

    public function expenses(User $user)
    {
        return $this->getPermission($user,13);
    }

    public function roles(User $user)
    {
        return $this->getPermission($user,14);
    }

    public function permissions(User $user)
    {
        return $this->getPermission($user,15);
    }

    public function memberaction(User $user)
    {
        return $this->getPermission($user,16);
    }

    public function noticeaction(User $user)
    {
        return $this->getPermission($user,17);
    }

    public function galleryaction(User $user)
    {
        return $this->getPermission($user,18);
    }

    public function dayaction(User $user)
    {
        return $this->getPermission($user,19);
    }

    public function event(User $user)
    {
        return $this->getPermission($user,20);
    }

    public function manage(User $user)
    {
        return $this->getPermission($user,21);
    }

    public function dashboard(User $user)
    {
        return $this->getPermission($user,22);
    }
    
    protected function getPermission($user,$p_id)
    {
        foreach ($user->roles as $role) {

            foreach ($role->permissions as $permission) {

                if ($permission->id == $p_id) {

                    return true;
                }
            }
        }

        return false;
    }

}
