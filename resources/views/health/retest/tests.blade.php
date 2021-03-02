@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="content__inner">
            <div class="card">




                <div class="card-body">
                    <h4 class="card-title">Test retest assignment portal</h4>
                    <h6 class="card-subtitle">Click on the Assign results button in order to key in the lat Test lab findings</h6>

                    <div class="col">
                        <p class="alert alert-danger d-none" id="msg-danger"></p>
                        <p class="alert alert-success d-none" id="msg-success"></p>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Patient Id: {{ $getIndividualTestHeader->data->Header->uniquePatientId }}</p>
                            <p>Total Tests: {{ $getIndividualTestHeader->data->Header->noOfTest }}</p>
                            <p>Passed Tests: {{ $getIndividualTestHeader->data->Header->noOfTestPass }}</p>
                            <p>Failed Tests: {{ $getIndividualTestHeader->data->Header->noOfTestFailed }}</p>
                        </div>
                        <div class="col-md-6">

                            <p> Bill Number: {{ $getIndividualTestHeader->data->Header->billNo }}</p>
                            <p> Facility Name: {{ $getIndividualTestHeader->data->Header->labTechName }}</p>
                            <p> Test Date: {{ $getIndividualTestHeader->data->Header->testDate }}</p>
                            <p> Bill Number: {{ $getIndividualTestHeader->data->Header->billNo }}</p>

                        </div>
                    </div>
                    <div class="table-responsive" id="res-table">
                        <table id="data-table" class="table table-bordered">
                            <thead class="thead-default">
                            <tr>
                                <th class="d-none">Bill ID</th>
                                <th>ID No</th>
                                <th>Test Name</th>
                                <th class="d-none">Test TypeId</th>
                                <th>Lab Result/Findings</th>
                                <th>Facility Name</th>
                                <th>Update</th>
                            </tr>
                            </thead>
                            <!--<tfoot>
                                <tr>
                                    <th>Bill ID</th>
                                    <th>Test Name</th>
                                    <th>Test TypeId</th>
                                    <th>Lab Result</th>
                                    <th>Lab Tech Name</th>
                                    <th>Update</th>
                                </tr>
                            </tfoot>-->
                            <tbody class="table-striped">
                            @foreach ($getIndividualTestHeader->data->Info as $key=>$item)
                                <tr class="gradeX">
                                    <td class="d-none">{{ $item->id }}</td>
                                    <td>{{ $item->idNo }} </td>
                                    <td>{{ $item->testName }}</td>
                                    <td class="d-none">{{ $item->testTypeId }}</td>
                                    <td class="test-results">{{ $item->labResult }}</td>
                                    <td class="the-lab">{{ $item->labTechName }}</td>
                                    @if ($item->approved ==="3")
                                        <td><button class="btn btn-info btnSelect" data-toggle="modal" data-target="#get-id"> <i class="zmdi zmdi-edit"></i> Assign Retest</button></td>
                                    @else
                                        <td style="color:green"> Passed <i class="zmdi zmdi-check-circle-u"></i></td>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <a class="float-right btn btn-primary" href="{{ route('get-all-test') }}"> <i class="zmdi zmdi-skip-next"></i> Next</a>
                    </div>
                </div>
            </div>

        <!-- Modal -->
        <div class="modal fade" id="get-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="testTittle"><strong>Make changes to test</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <form id="">
                        <div class="modal-body pt-3">
                            <div class="col-12 p-4 bg-info-yellow text-black mb-4">
                                <p class=" m-0">Remember to click on <strong>Save Changes</strong> after making your changes on this test.</p>
                            </div>
                            <div class="form-row">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="col">
                                            <div class="form-group">
                                                <label>ID</label>

                                                <input type="text" id="id" name="id" class="form-control the-id0" readonly>

                                                <i class="form-group__bar d-none"></i>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12" >
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Test Type ID</label>

                                                <input type="text" id="testTypeId" name="testTypeId" class="form-control the-id2" readonly>

                                                <i class="form-group__bar d-none"></i>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Lab Result/Lab findings  <strong class="text-danger">*</strong></label>
                                                <textarea class="form-control alert alert-inverse" rows="5" id="labResult" name="labResult" placeholder="Enter the lab results " onclick="this.focus();this.select()"></textarea>
                                                <i class="form-group__bar d-none"></i>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="zmdi zmdi-close-circle"></i> Close</button>
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
        <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                // code to read selected table row cell data (values).
                $("#data-table").on('click','.btnSelect',function(){
                    // alert("clicked");
                    // get the current row
                    var currentRow=$(this).closest("tr");

                    var col1=$(this).parent().siblings().eq(0).text(); // get current row 1st TD value
                    var col2=$(this).parent().siblings().eq(2).text();// get current row 2nd TD
                    var id_num=$(this).parent().siblings().eq(1).text();
                    var col3=$(this).parent().siblings().eq(3).text(); // get current row 3rd TD

                    var results=$(this).parent().siblings('.test-results').text();
                    var the_lab=$(this).parent().siblings('.the-lab').text();
                    var lab_val=0;
                    if(the_lab=="Jericho Health Centre - Eastlands"){
                        lab_val=4;
                    }

                    if(the_lab=="Langata Health Centre Langata"){
                        lab_val=5;
                    }
                    if(the_lab=="Mathare North Health Centre  Mathare"){
                        lab_val=5;
                    }
                    if(the_lab=="Ngaira/Rhodes Health Centre Haile Selassie Avenue"){
                        lab_val=7;
                    }
                    if(the_lab=="STC Casino  River Road"){
                        lab_val=8;
                    }

                    if(the_lab=="Kangemi Health Centre"){
                        lab_val=9;
                    }

                    if(the_lab=="Westlands Health Centre"){
                        lab_val=10;
                    }

                    if(the_lab=="Lady Northy State House Rd"){
                        lab_val=11;
                    }

                    if(the_lab=="Own Premises Mobile Clinics"){
                        lab_val=12;
                    }

                    if(the_lab=="Ngaira Dispensary"){
                        lab_val=13;
                    }

                    if(the_lab=="STC SPECIAL TREATMENT AND SKIN CLINIC"){
                        lab_val=14;
                    }

                    if(the_lab=="Dandora health clinic"){
                        lab_val=15;
                    }
                    if(the_lab==""){
                        lab_val="";
                    }

                    // alert(results+lab_val);

                    $("#get-id textarea").val(results);
                    $("#get-id #labId").val(lab_val);


                    $('#get-id .modal-body .the-id0').val(col1);
                    $('#get-id .modal-body .the-id1').val(col2);
                    $('#get-id .modal-body .the-id2').val(col3);

                    $('#testTittle').html('<h4 class"mb-0"><strong>'+col2+' Test</strong><hr></h4><span class="thin">Assign the correct observed results for this patient.</span><p><strong>ID Num:'+id_num+'</strong></p>');


                });
            });
        </script>

        <script type="text/javascript">
            //getting selected test name



            // var test_name=$('#testNam').val();
            $('.btn-update').click(function(e){
                e.preventDefault();




                var id = $('#id').val();
                var testTypeId = $("#testTypeId").val();
                var labResult = $("#labResult").val();




                if(labResult === "" ) {
                    swal({
                        title: "Required fields",
                        text:"Please Fill All Required Field",
                        icon: "danger",
                    });
                    return false;
                }



                $('#loader14').removeClass('d-none');
                $.ajax({

                    url: "<?php echo url('save-updates-retest') ?>" ,
                    type: "POST",
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {id:id, testTypeId:testTypeId, labResult:labResult},

                    success:function(data){
                        // $("#form11")[0].reset();


                        //console.log(data.success.message);
                        $('#loader14').addClass('d-none');
                        $('#get-id').modal('hide');
                        //location.reload();

                        //$("#res-table").load(window.location + " #res-table");

                        ///data.success.message

                        swal({title: "Good job", text: data.success.message, type:
                                "success", icon:"success"}).then(function(){
                                location.reload();
                            }
                        );
                    } ,
                    error: function(data) {

                        //console.log(data.success.message);
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


    </section>

@endsection

