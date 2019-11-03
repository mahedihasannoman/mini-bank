<?php

namespace App\Repository;

interface AccountRepositoryInterface
{
    public function all($user_id);

    public function findById($account_id);

    public function store(array $data);

    public function update($account_id);

    public function delete($account_id);
}
