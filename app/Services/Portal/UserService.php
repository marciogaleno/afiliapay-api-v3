<?php


namespace App\Services\Portal;


use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(array $data): User
    {
        return $this->repository->create($data);
    }

    public function update(array $data, int $userId): User
    {
        return $this->repository->update($data, $userId);
    }
}