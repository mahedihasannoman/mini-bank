<?php


namespace App\Http\View\Composers;


use App\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AccountsComposer
{


    public function compose(View $view)
    {
        $view->with('accounts', Account::where('user_id', Auth::user()->id)->orderBy('name')->get());
    }
}
