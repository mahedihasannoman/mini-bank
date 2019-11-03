<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Repository\TransactionRepositoryInterface;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{


    private $transactionRepository;


    /**
     * TransactionController constructor.
     * @param TransactionRepositoryInterface $transactionRepository
     */

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deposit()
    {

        $data['activeMenu'] = 'create_account_deposit';
        $data['title'] = 'Deposit money to your account';
        return view('admin.transaction.deposit', $data);

    }


    /**
     * @param TransactionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeDeposit(TransactionRequest $request)
    {
        $this->transactionRepository->store($request->all());

        $notification = array(
            'message' => 'Money has been deposited to your account',
            'alertType' => 'success'
        );
        return redirect()->route('allAccount')->with($notification);

    }


    public function transferBalance()
    {
        $data['activeMenu'] = 'create_balance_transfer';
        $data['title'] = 'Transfer balance';
        return view('admin.transaction.transfer', $data);
    }


    public function postTransferBalance(Request $request)
    {
        $this->transactionRepository->transferBalance($request);

        $notification = array(
            'message' => 'Account balance has been transferred',
            'alertType' => 'success'
        );

        return redirect()->route('allAccount')->with($notification);
    }


}
