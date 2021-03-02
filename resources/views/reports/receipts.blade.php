@extends('layouts.app')

@section('content')
<section class="content">
    <header class="content__title">
        <h1>RECEIPTS FOR FOODHANDLERS</h1>

        <div class="actions">
            <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
            <a href="#" class="actions__item zmdi zmdi-check-all"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">Refresh</a>
                    <a href="#" class="dropdown-item">Manage Widgets</a>
                    <a href="#" class="dropdown-item">Settings</a>
                </div>
            </div>
        </div>
    </header>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Receipts</h4>
            <h6 class="card-subtitle">All the receipts.</h6>

            <div class="table-responsive">
                <table id="data-table" class="table table-bordered">
                    <thead class="thead-default">
                        <tr>
                            <th>billNo</th>
                            <th>receiptDetailNo</th>
                            <th>paymentAmount</th>
                            <th>currency</th>
                            <th>source</th>
                            <th>dateCreated</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>billNo</th>
                            <th>receiptDetailNo</th>
                            <th>paymentAmount</th>
                            <th>currency</th>
                            <th>source</th>
                            <th>dateCreated</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($getReceipts->data as $key => $item)
                        <tr>
                            <td>{{  $item->billNo }}</td>
                            <td>{{  $item->receiptDetailNo }}</td>
                            <td>{{  $item->paymentAmount }}</td>
                            <td>{{  $item->currency }}</td>
                            <td>{{  $item->source }}</td>
                            <td>{{  $item->dateCreated }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</section>

@endsection

