@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="content__inner">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Health Headers</h4>
                    <h6 class="card-subtitle">Some header info here</h6>

                    <div class="col">
                        <p class="alert alert-danger d-none" id="msg-danger"></p>
                        <p class="alert alert-success d-none" id="msg-success"></p>

                    </div>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-bordered">
                            <thead class="thead-default">
                            <tr>
                                <th class="d-none">Bill ID</th>
                                <th>Bill Number</th>
                                <th class="d-none">Id No</th>
                                <th>Patient Id</th>
                                <th>No Tests</th>
                                <th>Passed</th>
                                <th>Failed</th>
                                <th>Test Date</th>
                                <th>Approve Status</th>
                               <th>Action</th>
                            </tr>
                            </thead>
                            <!--<tfoot>
                            <tr>
                                <th>Bill ID</th>
                                <th>Bill Number</th>
                                <th>Patient Id</th>
                                <th>Created Date</th>
                                <th>Test Date</th>
                                <th>Active</th>
                            </tr>
                            </tfoot>-->
                            <tbody>
                            @foreach ($getTestHeaders->data as $key=>$item)
                                <tr class="gradeX">
                                    <td class="d-none">{{ $item->billId }}</td>
                                    <td>{{ $item->billNo }}</td>
                                    <td class="d-none">{{ $item->idNo }}</td>
                                    <td>{{ $item->uniquePatientId }}</td>
                                    <td>{{ $item->noOfTest }}</td>
                                    <td>{{ $item->noOfTestPass }}</td>
                                    <td>{{ $item->noOfTestFailed }}</td>
                                    <td class="testDate">{{ $item->testDate }}</td>

                                    @if($item->printable=== "1")
                                        <td style="color: red"><span class="badge badge-pill badge-soft-warning">Not Approved</span></td>
                                    @else
                                        <td style="color: green"><span class="badge badge-pill badge-soft-success">Approved</span></td>
                                    @endif
                                    <td>
                                        <button class="btn btn-info btn--raised btnSelect" data-toggle="modal" data-target="#get-id"><i class="zmdi zmdi-print"></i> Approve Print
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="get-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Approver action form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                    <div class="modal-body">
                            <div class="form-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Bill ID <strong class="text-danger">*</strong></label>
                                                <input type="text" id="billId" name="billId" class="form-control the-id0" readonly>
                                                <input type="hidden" id="createdBy" name="createdBy" class="form-control" readonly value="{{ Session::get('resource')[0]['username'] }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>National ID <strong class="text-danger">*</strong></label>
                                                <input type="text" id="idNo" name="idNo" class="form-control the-id1" readonly>
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>



                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="zmdi zmdi-close-circle"></i> Close</button>

                        <span type="submit" class="btn btn-success btn-approve">
                        <i class="zmdi zmdi-save"></i> Approve Print</span>
                        <span class="d-none" id="loader14" >
                            <img src="{{ asset('img/loader/loader.gif') }}" style="size: 20px" />
                        </span>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            // code to read selected table row cell data (values).
            $("#data-table").on('click','.btnSelect',function(){
                // get the current row
                var currentRow=$(this).closest("tr");

                var col1=$(this).parent().siblings().eq(0).text(); // get current row 1st TD value
                var col2=$(this).parent().siblings().eq(1).text(); // get current row 2nd TD value
                var col3=$(this).parent().siblings().eq(2).text(); // get current row 3rd TD value

                $('#get-id .modal-body .the-id0').val(col1);
                $('#get-id .modal-body .the-id1').val(col3);


            });
        });
    </script>

    <script type="text/javascript">
        $('.btn-approve').click(function(e){
            e.preventDefault();

            var billId = $('#billId').val();
            var idNo = $("#idNo").val();
            var createdBy = $("#createdBy").val();


            if(billId === "" || idNo ==="" || createdBy==="") {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });

                return false;
            }


            $('#loader14').removeClass('d-none');
            $.ajax({

                url: "approve-print" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {idNo:idNo, billId:billId, createdBy:createdBy},

                success:function(data){

                    console.log(data.success.message);
                    $('#loader14').addClass('d-none');
                    $('#get-id').modal('hide');
                    location.reload();
                    // $('#msg-success').removeClass('d-none');
                    // $("#msg-success").html(data.success.message);
                    // $("#msg-success").delay(10000).fadeOut('slow');

                    swal({
                        title: data.success.message,
                        text:data.success.message,
                        icon: "info",
                    });

                } ,
                error: function(data) {

                    console.log(data.success.message);
                    $('#get-id').modal('hide');
                    $('#loader14').addClass('d-none');
                    // $('#msg-success').removeClass('d-none');
                    // $("#msg-success").html(data.success.message);
                    // $("#msg-success").delay(10000).fadeOut('slow');

                }

            });

        })
    </script>

@endsection


