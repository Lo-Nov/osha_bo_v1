@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="content__inner">
            <h4 class="card-title">User Module</h4>

            <div class="card">



                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="float-right btn btn-outline-success" onclick="myFunction()"> <i class="zmdi zmdi-account-add"></i> Add User</button>

                            <div id="myDIV" style="display: none">
                                <form id="cform">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInput">Name</label>
                                            <input type="text" name="name"  class="form-control mb-2" id="name" placeholder="Enter name">
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">@</div>
                                                    </div>
                                                    <input type="text" name="phoneNumber"  class="form-control" id="phoneNumber" placeholder="Phone Number">
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <select type="text" class="form-control" name="role" id="role">
                                                    <option value=""> --Select Role-- </option>
                                                    <option value="DIRECTOR">DIRECTOR</option>
                                                    <option value="TESTER">TESTER</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                              <span type="submit" class="btn btn-outline-success btn-save-user">
                                                <i class="zmdi zmdi-save"></i> Save</span>
                                                <span class="d-none" id="loader14" >
                                                    <img src="{{ asset('img/loader/loader.gif') }}" style="size: 20px" />
                                                </span>
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
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phoneNumber</th>
                            <th>role</th>
                            <th>createdDate</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-striped">
                        @foreach ($getUsers->data as $key=>$item)
                            <tr class="gradeX">
                                <td>{{ $item->id }} </td>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->email }} </td>
                                <td>{{ $item->phoneNumber }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->createdDate }}</td>
                                <td>
                                    <button class="btn btn-outline-danger btnSelect" data-toggle="modal" data-target="#get-id"> <i class="zmdi zmdi-check"></i> Delete</button>
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
                            <div class="form-row">
                                <div class="row">
                                    <div class="col-md-12 d-none">
                                        <div class="">
                                            <label>ID <strong class="text-danger">*</strong></label>
                                            <div class="">
                                                <input type="text" id="id" name="id" class="form-control the-id0" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal"> <i class="zmdi zmdi-close-circle"></i> Close</button>
                            <span type="submit" class="btn btn-outline-danger btn-confirm-delete">
                        <i class="zmdi zmdi-delete"></i> Delete</span>
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

                $('#testTittle').html('<h4 class"mb-0"><strong>'+col2+'</strong><hr></h4><span class="thin"></span><p><strong>Delete:'+id_num+'</strong></p>');


            });
        });
    </script>
    <script type="text/javascript">
        //getting selected test name
        // var test_name=$('#testNam').val();
        $('.btn-save-user').click(function(e){
            e.preventDefault();

            var name = $('#name').val();
            var email = $("#email").val();
            var phoneNumber = $("#phoneNumber").val();
            var role = $("#role").val();

            if(role === "" || phoneNumber ==="" || email === "" || name==="" ) {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }

            $('#loader14').removeClass('d-none');
            $.ajax({

                url: "save-user" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {role:role, phoneNumber:phoneNumber, email:email, name:name},

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

    <script type="text/javascript">
        //getting selected test name
        // var test_name=$('#testNam').val();
        $('.btn-confirm-delete').click(function(e){
            e.preventDefault();

            var id = $('#id').val();

            if(id === "") {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }

            $('#loader14').removeClass('d-none');
            $.ajax({

                url: "delete-user" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {id:id},

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

