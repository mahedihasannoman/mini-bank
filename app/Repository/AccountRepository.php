<?php


namespace App\Repository;


use App\Account;

class AccountRepository implements AccountRepositoryInterface
{
    public function all($user_id)
    {
        return Account::where('user_id', $user_id)->orderBy('name')->get();
    }


    public function findById($account_id)
    {
        return Account::where('id', $account_id)->firstOrFail();

    }


    public function store(array $data)
    {
        return Account::create($data);
    }


    public function update($account_id)
    {


        $account = Account::where('id', $account_id)->firstOrFail();
        $account->update(request()->all());

    }


    public function delete($account_id)
    {
        $account = Account::where('id', $account_id)->delete();
    }

}
