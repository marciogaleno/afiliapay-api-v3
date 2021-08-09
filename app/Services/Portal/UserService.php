<?php


namespace App\Services\Portal;


use App\Models\User;
use App\Repositories\TenantRepostitory;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class UserService
{
    private UserRepository $repository;

    private TenantRepostitory $tenantRepostitory;

    public function __construct(UserRepository $repository, TenantRepostitory $tenantRepostitory)
    {
        $this->repository = $repository;
        $this->tenantRepostitory = $tenantRepostitory;
    }

    /**
     * @throws \Throwable
     */
    public function register(array $data): User
    {
        try {
            DB::beginTransaction();
            $user = $this->repository->create($data);
            $tenant = $this->tenantRepostitory->create(["name" => $user->email]);
            $user->tenant_id = $tenant->id;
            $user->save();
            DB::commit();
            return $user;
        } catch (\Throwable $throwable) {
            DB::rollBack();
            throw $throwable;
        }

    }

    public function update(array $data, int $userId): User
    {
        return $this->repository->update($data, $userId);
    }
}