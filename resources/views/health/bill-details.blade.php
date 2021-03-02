@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="content__inner">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Conclusions on Lab test results </h4>
                    <h6 class="card-subtitle"><strong>Approve</strong> or <strong>Decline</strong> a <strong>Lab test </strong>based on the results attached to each test successive test</h6>

                    <div class="col">
                        <p class="alert alert-danger d-none" id="msg-danger"></p>
                        <p class="alert alert-success d-none" id="msg-success"></p>

                    </div>
                    <div class="table-responsive" id="res-table">
                        <table id="data-table" class="table table-bordered">
                            <thead class="thead-default">
                            <tr>
                                <th>Action</th>

                                <th class="d-none">ID</th>
                                <th class="d-none">Bill ID</th>
                                <th class="d-none">ID No</th>
                                <th class="d-none">Bill No.</th>
                                <th class="d-none">Unique Id</th>
                                <th>Test Name</th>
                                <th>Facility Name</th>
                                <th>Lab Result</th>
                                <th>Test Date</th>
                                <th>Actioned by</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tfoot>

                                <tr class="border-top-green ">

                                    <th colspan="2"><span><i style="font-family: 'Times New Roman', Times, serif">ID/PP Num:</i> </span> <span class="the-id-num"> <strong>331313221</strong></span></th>
                                    <th colspan="5"><span><i style="font-family: 'Times New Roman', Times, serif">Bill Number:</i> </span> <span class="the-bill-num"> <strong>HC31312-123213</strong></span></th>
                                </tr>

                            </tfoot>

                            <tbody>
                            @foreach ($getTestInfo->data as $key=>$item)
                                <tr class="gradeX">
                                    <td>
                                        <button class="btn btn-primary btn--raised btnSelect" data-toggle="modal" data-target="#get-id" title="Approval button"> <i class="zmdi zmdi-refresh"></i>  </button></td>

                                    <td class="d-none">{{ $item->id }}</td>
                                    <td class="d-none">{{ $item->billId }}</td>
                                    <td class="d-none idNum">{{ $item->idNo }}</td>
                                    <td class="d-none billNum">{{ $item->billNo }}</td>
                                    <td class="d-none">{{ $item->uniquePatientId }}</td>
                                    <td class="test-name">{{ $item->testName }}</td>
                                    <td class="labName">{{ $item->labTechName }}</td>
                                    <td class="lab-results">{{ $item->labResult }}</td>
                                    <td class="testDate">{{ $item->testDate }}</td>
                                    <td class="officer">{{ $item->approvedBy }}</td>
                                    @if($item->approved === "1")
                                        <td class="testStatus"><span class="badge badge-soft-warning badge-pill">Pending...</span></td>
                                    @elseif($item->approved === "2")
                                        <td class="testStatus"><span class="badge badge-soft-success badge-pill">Approved</span></td>
                                    @else
                                        <td class="testStatus"><span class="badge badge-soft-danger badge-pill">Declined</span></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <a class="float-right btn btn-primary" href="{{ route('doctor-updates') }}"> <i class="zmdi zmdi-skip-next"></i> Next</a>

                    </div>
                </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="get-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                            <div class="modal-title" id="testTittle"><strong>Make changes to test</strong></div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form id="cform">
                        <div class="modal-body pt-0">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="results-content p-3 bg-info-light border-info border">
                                        <p class="text-info"><strong>The lab results</strong></p>
                                        <p class="text-info the-results mb-4">The following were the lab findings for this particular test, what a success, my goodness</p>
                                        <hr>
                                        <i style="font-family: 'Times New Roman', Times, serif">The test was conducted at <strong class="labName text-capitalize">The lab name</strong></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="col-md-6 d-none">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" id="id" name="id" class="form-control the-id0" readonly>
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 d-none">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Actioned By</label>
                                                <input type="text" id="approvedBy" name="approvedBy" class="form-control" value="{{ Session::get('resource')[0]['user_full_name'] }}" readonly>
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                            <label class="text-black"><strong>Declare test conclusion/Verdict <strong class="text-danger">*</strong></strong></label>
                                            <div class="select mb-3 text-black">
                                                <select onchange="yesnoCheck(this);" id="condition" name="condition" class="form-control text-black border-dark input-group-lg">
                                                    <option value=" ">--Select condition--</option>
                                                    <option value="2">APPROVE</option>
                                                    <option value="3">DECLINE</option>
                                                </select>
                                                <span style="font-family: 'Times New Roman', Times, serif" class="initOfficer mt-2"></span>
                                            </div>

                                        <div class="select mb-3 text-black" id="ifYes" style="display: none;">
                                            <label class="text-black"><strong>Reason for decline <strong class="text-danger"></strong></strong></label>
                                            <textarea  id="reason" name="reason" class="form-control text-black border-dark input-group-lg" rows="3" placeholder="Enter Reason for declining only."></textarea>
                                            <span style="font-family: 'Times New Roman', Times, serif" class="initOfficer mt-2"></span>
                                        </div>

                                    </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" class="btn btn-secondary" data-dismiss="modal"> <i class="zmdi zmdi-close-circle"></i> Close</button>

                            <span type="submit" class="btn btn-success btn-update">
                        <i class="zmdi zmdi-save"></i> Save changes</span>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            var idNum;
            var billNum;
            $('#data-table tbody tr').each(function(index){
                var idNum=$(this).children('.idNum').text();
                var billNum=$(this).children('.billNum').text();

                // alert(billNum);
                $('.the-id-num').text(idNum);
                $('.the-bill-num').text(billNum);
            });


            // code to read selected table row cell data (values).
            $("#data-table").on('click','.btnSelect',function(){
                // get the current row
                var currentRow=$(this).closest("tr");

                var col1=$(this).parent().siblings().eq(0).text(); // get current row 1st TD value
                var col2=$(this).parent().siblings().eq(1).text();// get current row 2nd TD
                var col3=$(this).parent().siblings().eq(2).text(); // get current row 3rd TD

                var testName=$(this).parent().siblings('.test-name').text();
                var labResults=$(this).parent().siblings('.lab-results').text();
                var officer=$(this).parent().siblings('.officer').text();
                var testStatus=$(this).parent().siblings('.testStatus').text();
                var labName=$(this).parent().siblings('.labName').text();

                if(testStatus=="Approved"){
                    testStatus=2;
                    $('#get-id .initOfficer').html('<p class="mt-3"><i>This test was initially <strong class="text-success">Approved</strong> by <strong class="text-success">'+officer+'</strong></i><p>');
                }

                if(testStatus=="Declined"){
                    testStatus=2;
                    $('#get-id .initOfficer').html('<p class="mt-3"><i>This test was initially <strong class="text-danger">Declined</strong> by <strong class="text-danger">'+officer+'</strong></i><p>');

                }

                if(testStatus=="Pending..."){
                    testStatus="";
                }

                $('#get-id .condition').val(testStatus);
                $('#get-id .modal-body .labName').text(labName);
                $('#get-id .modal-body .the-id0').val(col1);
                $('#get-id .the-results').text(labResults);
                $('#testTittle').html('<h4 class"mb-0"><strong>'+testName+' Test verdict declaration</strong><hr></h4><p style="font-weight: 300;">Kindly declare test verdict based on the <strong>results</strong> that were recorded during the lab test.</p>');

            });
        });
    </script>

    <script type="text/javascript">
        $('.btn-update').click(function(e){
            e.preventDefault();

            var id = $('#id').val();
            var reason = $('#reason').val();
            var approvedBy = $("#approvedBy").val();
            var condition = $("#condition").val();
            if(approvedBy === "" || id ===""  || condition === "") {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }

            $('#loader14').removeClass('d-none');
            $.ajax({

                url: "approve-test" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {id:id, reason:reason, approvedBy:approvedBy, condition:condition},

                success:function(data){
                    $("#cform")[0].reset();

                    console.log(data.success.message);
                    $('#loader14').addClass('d-none');
                    $('#get-id').modal('hide');
                    // location.reload();

                    //$("#res-table").load(window.location + " #res-table");
                    swal({title: "Good job", text: data.success.message, type:
                            "success", icon:"success"}).then(function(){
                            location.reload();
                        }
                    );
                } ,
                error: function(data) {
                    console.log(data.success.message);
                    $('#get-id').modal('hide');
                    $('#loader14').addClass('d-none');
                    swal({
                        title: "Error!",
                        text:data.success.message,
                        icon: "success",
                    });

                }

            });

        })
    </script>

    <script type="text/javascript">
        function yesnoCheck(that) {
            if (that.value == "3") {
                //alert("check");
                document.getElementById("ifYes").style.display = "block";
            } else {
                document.getElementById("ifYes").style.display = "none";
            }
        }
    </script>

@endsection

