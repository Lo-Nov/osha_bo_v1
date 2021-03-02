@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="content__inner">
            <h4 class="card-title">Inspected Businesses</h4>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="float-right btn btn-outline-success" onclick="myFunction()"> <i class="zmdi zmdi-search-for"></i> Filter</button>
                            <div id="myDIV" style="display: none">
                                <form action="{{ route('get-inspections') }}" method="post" novalidate>
                                    @csrf
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInput">Name</label>
                                            <input type="date" class="form-control hidden-md-up" placeholder="Pick Date from" required>
                                            <input type="text" name="from" class="form-control date-picker hidden-sm-down" placeholder="Pick Date from" required>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">To</div>
                                                </div>
                                                <input type="date" class="form-control hidden-md-up" placeholder="Pick Date to" required>
                                                <input type="text" name="to" class="form-control date-picker hidden-sm-down" placeholder="Pick Date To" required>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status</div>
                                                </div>
                                                <select type="text" name="status" class="form-control" id="inlineFormInputGroup" required>
                                                    <option value="">--Select Status--</option>
                                                    <option value="1">PENDING</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-outline-success mb-2">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                            <th>Code</th>
                            <th>Business ID</th>
                            <th>Business Name</th>
                            <th>Telephone</th>
                            <th>Adress</th>
                            <th>Inspector</th>
                            <th>Inspection Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-striped">
                        @foreach ($getInspections->data as $key=>$item)
                            <tr class="gradeX">
                                <td>{{ $item->inspectionCode }}</td>
                                <td>{{ $item->businessID }} </td>
                                <td>{{ $item->businessName }}</td>
                                <td>{{ $item->telephone1 }}</td>
                                <td>{{ $item->physicalAdress }}</td>
                                <td>{{ $item->inspector }}</td>
                                <td>{{ $item->inspectionDate }}</td>
                                <td>
                                    <button class="btn btn-outline-success btnSelect" data-toggle="modal" data-target="#get-id"> <i class="zmdi zmdi-money"></i> Cost</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                            <div class="col-12 p-4 bg-info-yellow text-black mb-4 d-none">
                                <p class=" m-0">Remember to click on <strong>Save Changes</strong> after making your changes on this test.</p>
                            </div>
                            <div class="form-row">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="">
                                            <label>Inspection Code <strong class="text-danger">*</strong></label>
                                            <div class="">
                                                <input type="text" id="inspectionCode" name="inspectionCode" class="form-control the-id0" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="">
                                            <label>costing <strong class="text-danger">*</strong></label>
                                            <div class="select">
                                                <input type="text"  id="costing" name="costing" class="form-control" placeholder="Enter the cost">
                                                <i class="form-group__bar d-none"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="">
                                            <label>approvedBy <strong class="text-danger">*</strong></label>
                                            <div class="select">
                                                <input type="text"  id="approvedBy" name="approvedBy" class="form-control" value="{{ Session::get('resource')[0]['user_full_name'] }}" readonly>
                                                <i class="form-group__bar d-none"></i>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" class="btn btn-secondary" data-dismiss="modal"> <i class="zmdi zmdi-close-circle"></i> Close</button>

                            <span type="submit" class="btn btn-outline-success btn-update-cost">
                        <i class="zmdi zmdi-save"></i> Update Changes</span>
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


                //alert(col1);

                $("#get-id textarea").val(results);
                $("#get-id #labId").val(lab_val);


                $('#get-id .modal-body .the-id0').val(col1);
                $('#get-id .modal-body .the-id1').val(col2);
                $('#get-id .modal-body .the-id2').val(col3);

                $('#testTittle').html('<h4 class"mb-0"><strong>  '+col2+'</strong><hr></h4><span class="thin">Confirm the booking date to corporates.</span><p><strong>Business  Number:'+id_num+'</strong></p>');


            });
        });
    </script>
    <script type="text/javascript">
        //getting selected test name
        // var test_name=$('#testNam').val();
        $('.btn-update-cost').click(function(e){
            e.preventDefault();

            var costing = $('#costing').val();
            var approvedBy = $("#approvedBy").val();
            var inspectionCode = $("#inspectionCode").val();

            if(costing === "" || approvedBy ==="" || inspectionCode === "" ) {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }
            $('#loader14').removeClass('d-none');
            $.ajax({

                url: "update-costing" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {approvedBy:approvedBy, costing:costing, inspectionCode:inspectionCode},

                success:function(data){
                    $("#cform")[0].reset();

                    console.log(data.success.message);
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

