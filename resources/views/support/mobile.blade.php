@extends('layouts.app')

@section('content')
{{-- main section --}}
<section class="content">
    <header class="content__title px-0 border-0">
           <div class="row">
               <div class="col-md-6">
                <span class="rev-title-container">
                    <h1 class="text-capitalize stream_name m-0">Update corporate phone numbers</h1>
                    <div class="actions text-black d-none">
                   <a href="#" class="actions__item zmdi zmdi-trending-up d-none"></a>
                   <a href="#" class="actions__item zmdi zmdi-check-all d-none"></a>

                   <div class="dropdown actions__item" title="choose another revenue stream d-none">
                       <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                       <div class="dropdown-menu dropdown-menu-right">
                           <a href="#" class="dropdown-item">Ngaira</a>
                           <a href="#" class="dropdown-item">Lady North</a>
                           <a href="#" class="dropdown-item">Westlands</a>
                       </div>
                   </div>
                  </div>

               </span>
               <small>Enter the required fileds</small>
               </div>

           </div>
    </header>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card by-stream">
                <div class="card-body">

                    <form class="kit-form" id="cform">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        <strong>Corporate Id</strong>  <strong class="text-danger">*</strong>
                                    </label>
                                        <input type="text" class="form-control" id="corporateId" placeholder="Enter Business Id">
                                </div>
                           </div>
                           <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    <strong>Telephone 1</strong>  <strong class="text-danger">*</strong>
                                </label>
                                    <input type="text" class="form-control" id="telephone1" placeholder="Enter Telephone 1">
                            </div>
                       </div>

                       <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>
                                <strong>Telephone 2</strong>  <strong class="text-danger">*</strong>
                            </label>
                                <input type="text" class="form-control" id="telephone2" placeholder="Enter Telephone 2">
                        </div>
                   </div>

                        <div class="col-12">
                            <button class="btn btn-primary save-mobile" type="submit">Save </button>
                            <span class="d-none" id="loader14" >
                                 <img src="{{ asset('img/loader/loader.gif') }}" style="size: 20px" />
                             </span>
                        </div>


                        </div>
                     </form>
                </div>
            </div>
       </div>

       <div class="col-sm-12 col-md-6">
        <div class="card by-stream calc-29">
            <div class="card-body calc-29">
                <div class="contact-header">
                    <h4 class="text-capitalize"></h4>
                    <p></p>
                </div>


            </div>
        </div>
       </div>
   </div>

</section>
<script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    //getting selected test name



    // var test_name=$('#testNam').val();
    $('.save-mobile').click(function(e){
        e.preventDefault();

        var corporateId = $('#corporateId').val();
        var telephone1 = $("#telephone1").val();
        var telephone2 = $("#telephone2").val();

//alert(telephone2);
        if(corporateId === "" || telephone1 ===""  ||   telephone2 ==="") {
            swal({
                title: "Required fields",
                text:"Please Fill All Required Field",
                icon: "danger",
            });
            return false;
        }

        $('#loader14').removeClass('d-none');
        $.ajax({

            url: "save-mobile" ,
            type: "POST",
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {corporateId:corporateId, telephone1:telephone1, telephone2:telephone2},

            success:function(data){
                $("#cform")[0].reset();

                console.log(data.success.message);
                $('#loader14').addClass('d-none');

                //$("#res-table").load(window.location + " #res-table");
                swal({
                    title: data.success.message,
                    text:data.success.message,
                    icon: "success",
                });
            } ,
            error: function(data) {

                console.log(data.success.message);
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

