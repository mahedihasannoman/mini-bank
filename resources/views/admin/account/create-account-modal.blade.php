<div class="modal fade" id="createAccount">
    <div class="modal-dialog">
        <form action="{{route('storeAccount')}}" method="post" class="form-horizontal" id="create-new-account">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create New Account</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger display-error" style="display: none"></div>

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Account Name</label>

                            <div class="col-sm-8 margin-bottom">

                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                <input name="name" class="form-control" id="name"
                                       placeholder="Account Name"
                                       type="text" value="{{old('name')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Opening Balance</label>

                            <div class="col-sm-8 margin-bottom">
                                <input name="opening_balance" class="form-control" id="opening_balance"
                                       placeholder="Opening Balance"
                                       type="number" value="{{old('opening_balance')}}">


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Account Number</label>

                            <div class="col-sm-8 margin-bottom">
                                <input name="account_number" class="form-control" id="account_number"
                                       placeholder="Account Number"
                                       type="text" value="{{old('account_number')}}">


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Description</label>

                            <div class="col-sm-8 margin-bottom">
                                <input name="description" class="form-control" id="description"
                                       placeholder="Description"
                                       type="text" value="{{old('description')}}">

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i
                                class="fa fa-close"></i> Close
                        </button>
                        <button type="submit" class="btn btn-primary create-account" id="create-new-account"><i
                                class="fa fa-floppy-o"></i>
                            Save
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
