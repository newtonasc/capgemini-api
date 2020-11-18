<?php 

namespace App\Models\Repository;

use App\Models\Entity\UserEntity;

class UserRepository
{
    protected $user;

    public function __construct(UserEntity $user)
    {
        $this->user = $user;
    }

    public function validateClient($id) 
    {
        return$this->user->where('id',$id)->count();
    }
}
