@extends('layouts.app')

@section('content')
<section class="content">
    <header class="content__title">
        <h1>NON ACTIVE FOODHANDLERS</h1>

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
            <h4 class="card-title">Non Active Food handlers</h4>
            <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6>

            <div class="table-responsive">
                <table id="data-table" class="table table-bordered">
                    <thead class="thead-default">
                        <tr>
                            <th>Id No</th>
                            <th>certId</th>
                            <th>businessID</th>
                            <th>billNo</th>
                            <th>receiptNo</th>
                            <th>accountName</th>
                            <th>amountPaid</th>
                            <th>startDate</th>
                            <th>certExpiry</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id No</th>
                            <th>certId</th>
                            <th>businessID</th>
                            <th>billNo</th>
                            <th>receiptNo</th>
                            <th>accountName</th>
                            <th>amountPaid</th>
                            <th>startDate</th>
                            <th>certExpiry</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($getNonActiveCerts->data as $key => $item)
                        <tr>
                            <td>{{  $item->idNo }}</td>
                            <td>{{  $item->certId }}</td>
                            <td>{{  $item->businessID }}</td>
                            <td>{{  $item->billNo }}</td>
                            <td>{{  $item->receiptNo }}</td>
                            <td>{{  $item->accountName }}</td>
                            <td>{{  $item->amountPaid }}</td>
                            <td>{{  $item->startDate }}</td>
                            <td>{{  $item->certExpiry }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</section>

@endsection

