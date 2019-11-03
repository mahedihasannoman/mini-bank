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

                    <a class="btn btn-default pull-right" data-toggle="modal" data-target="#createAccount">
                        <i class="fa fa-plus"></i> Add New Account</a></div>


                <div class="box-body min-height">
                    <table id="" class="table table-bordered table-striped datatable"
                           data-form="deleteForm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Account Number</th>
                            <th>Opening Balance</th>
                            <th>Description</th>
                            <th>Option</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $account)
                            <tr>
                                <td>{{$account->id}}</td>
                                <td>{{$account->name}}</td>
                                <td>{{$account->account_number}}</td>
                                <td>{{$account->opening_balance}}</td>
                                <td>{{$account->description}}</td>
                                <td>
                                    <form class="inline form-delete" method="post"
                                          action="{{route('delete_account',$account->id)}}">
                                        {{@csrf_field()}}
                                        <button data-tooltip="tooltip" title="Delete Account"
                                                type="submit"
                                                class="btn btn-danger delete_modal btn-sm"><i
                                                class="fa fa-trash"></i> Delete
                                        </button>

                                    </form>
                                    <a href="{{route('viewAccount',$account->id)}}" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i> Account Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @include('admin.account.create-account-modal')

                </div>
            </div>
        </section>
        @include('admin.common.modal')
    </div>
@stop
@section('script')
    <script>


        /**
         * Create account
         */

        $(".create-account").on("click", function (e) {
            e.preventDefault();
            axios.post("{{route('storeAccount')}}", {

                'name': document.querySelector("#name").value,
                'user_id': document.querySelector("#user_id").value,
                'opening_balance': document.querySelector("#opening_balance").value,
                'account_number': document.querySelector("#account_number").value,
                'description': document.querySelector("#description").value,
                '_token': "{{csrf_token()}}"
            })
                .then((response) => {
                    //console.log(response);

                    let type = response.data.alertType;
                    let message = response.data.message;

                    switch (type) {
                        case 'info':
                            toastr["info"](message);
                            break;

                        case 'warning':
                            toastr["warning"](message);
                            break;

                        case 'success':
                            toastr["success"](message);
                            break;

                        case 'error':
                            toastr["error"](message);
                            break;
                    }


                    /*
                        Redirect after 2 sec.
                     */

                    setTimeout(function () {
                        window.location.href = "{{route('allAccount')}}";
                    }, 2000);


                })
                .catch((error) => {
                    const errors = error.response.data.errors;
                    const firstItem = Object.keys(errors)[0];
                    const firstItemDOM = document.getElementById(firstItem);
                    const firstErrorMessage = errors[firstItem][0];


                    // Remove all error messages from the dom first.
                    const errorMessages = document.querySelectorAll('.text-danger');
                    errorMessages.forEach((element) => element.textContent = '');

                    firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${firstErrorMessage}</div>`);

                    // Remove all form control from highlighted text box.
                    const formControls = document.querySelectorAll('.form-control');
                    formControls.forEach((element) => element.classList.remove('border', 'border-danger'));


                });
        });


    </script>
@endsection
