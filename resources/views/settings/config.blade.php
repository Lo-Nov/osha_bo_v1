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

                    </div>
                    <div class="table-responsive" id="res-table">
                        <table id="data-table" class="table table-bordered">
                            <thead class="thead-default">
                            <tr>
                                <th>ID</th>
                                <th>Feed Id</th>
                                <th>testTypeId</th>
                                <th>testName</th>
                                <th>retestPeriod</th>
                                <th>retestFee</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-striped">
                            @foreach ($getTestPlan->data as $key=>$item)
                                <tr class="gradeX">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->feeId }} </td>
                                    <td>{{ $item->testTypeId }}</td>
                                    <td >{{ $item->testName }}</td>
                                    <td>{{ $item->retestPeriod }}</td>
                                    <td>{{ $item->retestFee }}</td>
                                    <td><button class="btn btn-outline-success btnSelect" data-toggle="modal" data-target="#get-id"> <i class="zmdi zmdi-edit"></i> Edit</button></td>
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
                        <h5 class="modal-title" id="testTittle"><strong>Make changes to test</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <form id="cform">
                        <div class="modal-body pt-3">
                            <div class="col-12 p-4 bg-info-yellow text-black mb-4">
                                <p class=" m-0">Remember to click on <strong>Save Changes</strong> after making your changes on this test.</p>
                            </div>
                            <div class="form-row">
                                <div class="row">
                                    <div class="col-md-12" style="display:none">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>ID</label>

                                                <input type="text" id="id" name="id" class="form-control the-id0" readonly>

                                                <i class="form-group__bar d-none"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="col">
                                            <div class="form-group d-none">
                                                <label>Test Name</label>

                                                <input type="text" id="testName" name="testName" class="form-control the-id1" readonly>

                                                <i class="form-group__bar d-none"></i>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6" style="display:none">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Test Type ID</label>

                                                <input type="text" id="testTypeId" name="testTypeId" class="form-control the-id2" readonly>

                                                <i class="form-group__bar d-none"></i>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="">
                                            <label>Lab Ref Number <strong class="text-danger">*</strong></label>
                                            <div class="">
                                                <input type="text" id="labReferenceId" name="labReferenceId" class="form-control" placeholder="Enter Lab ref number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="">
                                            <label>Facility Name <strong class="text-danger">*</strong></label>
                                            <div class="select">
                                                <select  id="labId" name="labId" class="form-control">
                                                </select>
                                                <i class="form-group__bar d-none"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12 mt-3">
                                        <div class="">
                                            <label>Lab Result/Lab findings  <strong class="text-danger">*</strong></label>
                                            <textarea class="form-control alert alert-inverse" rows="5" id="labResult" name="labResult" placeholder="Enter the lab results " onclick="this.focus();this.select()"></textarea>
                                            <i class="form-group__bar d-none"></i>
                                        </div>

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
        // var test_name=$('#testNam').val();
        $('.btn-update').click(function(e){
            e.preventDefault();




            var id = $('#id').val();
            var testName = $("#testName").val();
            var testTypeId = $("#testTypeId").val();
            var labId = $("#labId").val();
            var labResult = $("#labResult").val();
            var labReferenceId = $("#labReferenceId").val();




            if(labResult === "" || labId ==="" || labReferenceId === "" ) {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }



            $('#loader14').removeClass('d-none');
            $.ajax({

                url: "save-updates" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {id:id, testName:testName, testTypeId:testTypeId, labId:labId, labResult:labResult, labReferenceId:labReferenceId},

                success:function(data){
                    $("#cform")[0].reset();


                    //console.log(data.success.message);
                    $('#loader14').addClass('d-none');
                    $('#get-id').modal('hide');
                    location.reload();

                    //$("#res-table").load(window.location + " #res-table");
                    swal({
                        title: data.success.message,
                        text:data.success.message,
                        icon: "success",
                    });
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
@endsection

