<?php


namespace App\Repository;


use App\Models\User;

class UserRepository
{
    public function findAll()
    {
        return User::select('name', 'email', 'id')->get();
    }
}
