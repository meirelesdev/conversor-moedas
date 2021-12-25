<?php

declare(strict_types=1);

namespace App\Domain\UseCases;

use App\Domain\Contracts\UserRepositoryInterface;
use App\Domain\Entities\User;
use Exception;

class CreateUser
{
    private $dataUser;
    private $repository;

    public function __construct(array $data, UserRepositoryInterface $repository)
    {
        $this->dataUser = $data;
        $this->repository = $repository;
    }
    public function execute()
    {
        $data = $this->dataUser;
        if(empty($data)){
            throw new Exception('It is not possible to create a user without data');
        }
        $user = new User();
        foreach($this->dataUser as $key => $value) {
            if(!$value) {
                throw new Exception("Field {$key} is Empty.");
            }
            $user->{'set'.ucfirst($key)}($value);
        }
        $userExists = $this->repository->getByUsername($user->getUsername());
        if($userExists){
            throw new Exception('Usuario já Cadastrado.');
        }
        $user = $this->repository->save($user);
        
        return $user;
    }
}