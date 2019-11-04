@extends('admin.master')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content animated fadeIn">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="pull-left">
                        <h3 class="box-title">{{strtoupper($title)}}</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-body min-height">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('storeWithdraw')}}" method="post" id="store_deposit" class="">
                        @csrf
                        <div class="col-md-12">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><small class="req text-danger">* </small>Amount (€)</label>
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" id="user_id">
                                                <input type="hidden" name="type" value="withdraw" id="type">
                                                <input class="form-control number single_euro_digit" required="" placeholder="Amount"
                                                       id="amount" name="amount" value="{{old('amount')}}" type="number">
                                                @if ($errors->has('amount'))
                                                    <span class="help-block">{{ $errors->first('amount') }} <i
                                                            class="fa fa-exclamation"></i></span>
                                                @endif
                                            </div>


                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Reference</label>
                                                <input type="text" class="form-control" name="reference"
                                                       id="reference" placeholder="Reference">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="date" class="control-label">
                                                <small class="req text-danger">* </small>Date</label>

                                            <input name="transaction_date" class="form-control datepicker"
                                                   type="text"
                                                   value="{{old('transaction_date')}}">

                                            @if ($errors->has('transaction_date'))
                                                <span class="help-block">{{ $errors->first('transaction_date') }} <i
                                                        class="fa fa-exclamation"></i></span>
                                            @endif

                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label><small class="req text-danger">* </small>Account</label>
                                            <select id="account_id" class="form-control" name="account_id">
                                                <option value="">Select an account</option>
                                                @foreach($accounts as $account)
                                                    <option value="{{$account->id}}">{{$account->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('account_id'))
                                                <span class="help-block">{{ $errors->first('account_id') }} <i
                                                        class="fa fa-exclamation"></i></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Note</label>
                                            <textarea name="description" id="description" class="form-control"
                                                      placeholder="Note"></textarea>
                                        </div>
                                    </div>

                                    <div class="row text-right">
                                        <button id="save-income" class="btn btn-info"><i class="fa fa-plus"></i>
                                            withdraw
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @include('admin.common.modal')
    </div>
@stop
@section('script')
    <script src="{{asset('/public/admin/scripts/scripts.js')}}"></script>
@endsection
