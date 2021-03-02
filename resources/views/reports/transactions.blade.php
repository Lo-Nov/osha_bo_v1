@extends('layouts.app')

@section('content')
<section class="content">
    <h4 class="card-title">Transactions</h4>
                    <h6 class="card-subtitle">Table showing transactions done</h6>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="col-md-6 pull-right">

                        <button class="float-right btn btn-success" onclick="myFunction()"> <i class="zmdi zmdi-search-for"></i> Filter</button>
                        <div id="myDIV" style="display: none">
                        <form action="{{ route('health-transactions') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-sm-4">
                                    <label>Date From</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control hidden-md-up" placeholder="Pick Date from">
                                        <input type="text" name="from" class="form-control date-picker hidden-sm-down" placeholder="Pick Date from">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Date To</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control hidden-md-up" placeholder="Pick Date to">
                                        <input type="text" name="to" class="form-control date-picker hidden-sm-down" placeholder="Pick Date to">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label style="color: transparent">D</label>
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped">
                            <thead class="thead-default">
                                <tr>
                                    <th>Name</th>
                                    <th>Account From</th>
                                    <th>Account to</th>
                                    <th>Payment Mode</th>
                                    <th class="text-right">Amount (KES)</th>
                                    <th>Ref Num</th>
                                    <th>Transaction Code</th>
                                    <th>Date</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($getTransactions->data as $item)
                                    <tr>
                                        <td class="text-capitalize">{{ $item->names }}</td>
                                    <td><a href="tel:{{ $item->account_from }}" href="Call the individual">{{ $item->account_from }}</a></td>
                                    <td>{{ $item->account_to }}</td>
                                    <td>{{ $item->payment_mode }}</td>
                                    <td class="text-right font-weight-bolder text-success"><span class="">{{ number_format($item->amount,2) }}</span></td>
                                    <td>{{ $item->ref }}</td>
                                    <td class="text-capitalize">{{ $item->transaction_code }}</td>
                                    <td class="change-date">{{ $item->date }}</td>

                                    </tr>
                                    @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>

<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

@endsection

