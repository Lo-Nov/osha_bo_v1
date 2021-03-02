@extends('layouts.app')
@section('content')


    <!--  pay confirmation pop up-->
    <section id="service-form-section" class="">
        <div class="container">
            <div class="row ">
                <div class="service-form-container  flex-column-md animated col-12 p-0">
                    <div class="col-12 service-form-img-container" id="health-img">
                        <div class="col-lg-8 col-md-12 position-relative p-5">
                            <h2 class="mb-4">NCCG Corporate Dashboard</h2>
                            <p class="font-14 mb-3  ">Select a task you would like to do from the options available</p>
                        </div>
                    </div>
                    <div class="col-12 p-5 position-relative transactions-form-container d-flex">
                        <div class="col-12 p-0 the-transaction-form animated">
                            <div class="mini-nav">
                                <ul>
                                    <a href="{{ route('upload-individual') }}">Upload Staff</a>
                                </ul>
                            </div>
                            <div class="float:right">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row d-none">
                                    <div class="col-md-3">
                                        <form action="{{ route('get-corporate-bill') }}" method="post">
                                            @csrf
                                            <input type="text" name="corporateId" id="corporateId" value="{{ Session::get('corporateId') }}">
                                            <button class="btn btn-success"> <i class="fa fa-print"></i> Generate Bill</button>
                                        </form>
                                    </div>
                                    <div class="col-md-3 float:right">
                                    </div>
                                    <div class="col-md-3 float:right">
                                    </div>
                                    <div class="col-md-3 float:right">
                                        <p class="alert alert-danger d-none" id="msg-danger"></p>
                                        <p class="alert alert-success d-none" id="msg-success"></p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('bill-selected') }}" method="post">
                                @csrf
                                <div class="responsive-table">
                                    <table id="example7" class="table table-condensed table-responsive responsive-table table-striped">
                                        <thead class="">
                                        <tr>
                                            <th>$</th>
                                            <th>Name</th>
                                            <th>Id NO</th>
                                            <th>Gender</th>
                                            <th>Mobile</th>
                                            <th>Start</th>
                                            <th>Expr</th>
                                            <th>Cert</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <input type="checkbox" class="select-all" /> Select all staffs<br />
                                        @foreach ($getCorporateIndividuals->data->list as $key=>$item)
                                            <tr>
                                                <td><!-- This input -->
                                                    <input type="hidden" name="corporateId" value="{{ Session::get('corporateId') }}">
                                                    <input type="checkbox" name="ids[]" class="subCheckbox"   value="{{$item->idNo}}">
                                                </td>

                                                <td>{{  $item->firstName }} {{  $item->otherNames }}</td>
                                                <td>{{  $item->idNo }}</td>
                                                <td>{{  $item->gender }}</td>
                                                <td>{{  $item->mobile }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->lastPaymentDate))  }}</td>
                                                <td>{{  date('d-m-Y', strtotime($item->certExpiry))  }}</td>
                                                @if($item->withCert == 1)
                                                    <td style="color:green">Yes</td>
                                                @else
                                                    <td>No </td>
                                                @endif
                                                @if($item->withCert == 1 && $item->approved == 2)
                                                    <td>
                                                        <a class="" href="{{ route('get-corporate-cert',$item->idNo) }}" target="_blank" ><i class="zmdi zmdi-print" aria-hidden="true"></i> Print</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                @elseif($item->withCert == 1 && $item->approved == 1)
                                                    <td>Not Approved</td>
                                                @else
                                                    <td>No cert</td>
                                                @endif

                                            </tr>
                                        @endforeach()
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-success" name="button">Generate Bill for selected entries</button>
                            </form>


                        </div>

                        <div class="col-12 d-none p-0 animated details-confirm">
                            <div class="">
                                <p class="mb-5 pb-2  ">
                                    <span class="back-toform" title="back to transactions form"><i data-feather="arrow-left"  class="mr-3 float-left"></i></span><strong>Enter the PIN sent to your phone</strong>
                                </p>
                                <hr class="mt-1 p-0">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--form section-->
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    {{-- //<script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{asset('js/select2.full.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select-all').on('click', function() {
                var checkAll = this.checked;
                $('input[type=checkbox]').each(function() {
                    this.checked = checkAll;
                });
            });
        });
    </script>

    <script type="text/javascript">
        $('.deleteIndv').click(function(){
            var id = $(this).data("id");
            alert(id);
        });
    </script>


@endsection
