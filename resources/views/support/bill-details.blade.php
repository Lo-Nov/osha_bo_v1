
@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="content__inner">
            <h4 class="card-title">Bill Details</h4>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                    <div class="col">
                        <p class="alert alert-danger d-none" id="msg-danger"></p>
                        <p class="alert alert-success d-none" id="msg-success"></p>

                    </div>
                </div>
                <div class="table-responsive" id="res-table">
                    <table id="data-table" class="table table-bordered">
                        <thead class="thead-default">
                        <tr>
                            <th>billId</th>
                            <th>billNo</th>
                            <th>paymentCode</th>
                            <th>customer</th>
                            <th>description</th>
                        </tr>
                        </thead>
                        <tbody class="table-striped">
                        @foreach ($getBillByIdNo->data as $key=>$item)
                            <tr class="gradeX">
                                <td>{{ $item->billId }} </td>
                                <td>{{ $item->billNo }} </td>
                                <td>{{ $item->paymentCode }} </td>
                                <td>{{ $item->customer }}</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@endsection

