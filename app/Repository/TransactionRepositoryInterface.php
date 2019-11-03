<?php

namespace App\Repository;

interface TransactionRepositoryInterface
{
    public function all();

    public function getTransactionByType($type);


    public function getTransactionByAccountId($account_id);

    public function findById($transaction_id);

    public function store(array $data);

    public function update($transaction_id);

    public function delete($transaction_id);

    public function transferBalance(array $data);

}
