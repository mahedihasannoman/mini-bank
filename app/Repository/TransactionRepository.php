<?php


namespace App\Repository;


use App\Account;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionRepository implements TransactionRepositoryInterface
{

    /**
     * @return mixed
     */
    public function all()
    {
        return Transaction::orderBy('id')->get();
    }


    /**
     * @param $type
     * @return mixed
     */
    public function getTransactionByType($type)
    {
        return Transaction::orderBy('id')->where('type', $type)->get();
    }


    /**
     * @param $account_id
     * @return mixed
     */
    public function getTransactionByAccountId($account_id)
    {
        return Transaction::orderBy('id')->where('account_id', $account_id)->get();
    }


    /**
     * @param $transaction_id
     * @return mixed
     */
    public function findById($transaction_id)
    {
        return Transaction::where('id', $transaction_id)->firstOrFail();

    }


    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return Transaction::create($data);

    }


    /**
     * @param $transaction_id
     */
    public function update($transaction_id)
    {
        $transaction = Transaction::where('id', $transaction_id)->firstOrFail();
        $transaction->update(request()->all());

    }


    /**
     * @param $transaction_id
     */
    public function delete($transaction_id)
    {
        $transaction = Transaction::where('id', $transaction_id)->delete();
    }


    /**
     * @param $from_account
     * @param $to_account
     * @param $amount
     */
    public function transferBalance($data)
    {
        $from_account = $this->store([
            'user_id' => Auth::user()->id,
            'account_id' => $data->from_account,
            'amount' => $data->amount,
            'transaction_date' => $data->transaction_date,
            'description' => $data->description,
            'type' => 'transfer'
        ]);

        $to_account = $this->store([
            'user_id' => Auth::user()->id,
            'account_id' => $data->to_account,
            'amount' => $data->amount,
            'transaction_date' => $data->transaction_date,
            'description' => $data->description,
            'type' => 'deposit'
        ]);
    }


}
