<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    public function create(array $data): User
    {
        $user = User::create(array_merge(
            $data,
            ['password' => bcrypt($data["password"])]
        ));

        $user->profiles()->attach(2);

        return $user;
    }

    public function update(array $data, int $userId): User
    {
        $user = User::find($userId);
        $user->fill($data)->save();

        return $user;
    }
}