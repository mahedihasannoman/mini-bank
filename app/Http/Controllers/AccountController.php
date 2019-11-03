<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountRequest;
use App\Repository\AccountRepositoryInterface;
use App\Repository\TransactionRepositoryInterface;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{


    private $accountRepository;
    private $transactionRepository;

    public function __construct(AccountRepositoryInterface $accountRepository, TransactionRepositoryInterface $transactionRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->transactionRepository = $transactionRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allAccount()
    {
        $data['title'] = 'All Accounts';
        $data['activeMenu'] = 'all_accounts';
        $data['accounts'] = $this->accountRepository->all(Auth::user()->id);
        return view('admin.account.index', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $this->accountRepository->store($request->all());

        $notification = array(
            'message' => 'Account has been created',
            'alertType' => 'success'
        );


        return response()->json($notification);

        //return redirect()->route('allAccount')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Account $account
     * @return \Illuminate\Http\Response
     */
    public function show($account_id)
    {
        $data['title'] = 'Account transactions report';
        $data['activeMenu'] = 'view_account';
        $data['account_id'] = $account_id;

        $data['deposit'] = Transaction::where('account_id', $account_id)->where('type', 'deposit')->sum('amount');
        $data['transfer'] = Transaction::where('account_id', $account_id)->where('type', 'transfer')->sum('amount');
        $data['total_transactions'] = count($this->transactionRepository->getTransactionByAccountId($account_id));
        $data['transactions'] = $this->transactionRepository->getTransactionByAccountId($account_id);

        return view('admin.account.details', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Account $account
     * @return \Illuminate\Http\Response
     */
    public function editAccount($account_id)
    {
        $account = $this->accountRepository->findById($account_id);
        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Account $account
     * @return \Illuminate\Http\Response
     */
    public function updateAccount(AccountRequest $request, $account_id)
    {
        $this->accountRepository->update($account_id);
        $notification = array(
            'message' => 'Account details has been updated',
            'alertType' => 'success'
        );

        $notification = array(
            'message' => 'Category has been created',
            'alertType' => 'success'
        );

        return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Account $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($account_id)
    {
        $this->accountRepository->delete($account_id);
        $notification = array(
            'message' => 'Account has been deleted',
            'alertType' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
