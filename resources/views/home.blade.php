@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Converge API</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="card">Card Number</label>
                            <input class="form-control" name="card" placeholder="4124939******990"/>
                        </div>
                        <div class="form-group">
                            <label for="cardExp">Card Expiry Date</label>
                            <input class="form-control" name="cardExp" placeholder="1220"/>
                        </div>
                        <div class="form-group">
                            <label for="cardCVV">Card CVV</label>
                            <input class="form-control" name="cardCVV" placeholder="123"/>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input class="form-control" name="amount" />
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="type">
                                <option value="ccsale">Sale</option>
                                <option value="ccaddrecurring">Recurring</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="billingCycle">Billing Cycle</label>
                            <select class="form-control" name="billingCycle" id="billingCycle">
                                <option value="">Select</option>
                                <option value="DAILY">Daily</option>
                                <option value="WEEKLY">Weekly</option>
                                <option value="MONTHLY">Monthly</option>
                                <option value="QUARTERLY">Quarterly</option>
                                <option value="SEMESTER">Semester</option>
                                <option value="ANNUALLY">Annually</option>
                                <option value="SUSPENDED">Suspended</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nextPayment">Next Payment Date</label>
                            <input class="form-control datepicker" name="nextPayment" id="nextPayment" />
                        </div>
                        <div class="form-group">
                            <label for="avsAddress">User Address</label>
                            <textarea class="form-control" name="avsAddress" placeholder="TEST"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="avsZip">User Zip-code</label>
                            <input class="form-control" name="avsZip" placeholder="9999" />
                        </div>
                        <button class="btn btn-primary">Go</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $(".datepicker").datepicker({
            dateFormat: 'mm/dd/yy',
            minDate: 0
        });
    });
</script>
@endsection
