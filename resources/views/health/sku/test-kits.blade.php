@extends('layouts.app')

@section('content')
{{-- main section --}}
<section class="content">
    <header class="content__title px-0 border-0">
           <div class="row">
               <div class="col-md-6">
                <span class="rev-title-container">
                    <h1 class="text-capitalize stream_name m-0">Testing Kits</h1>
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
               <small>Showing revenue collections summary</small>
               </div>

           </div>
    </header>

    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="card by-stream">
                <div class="card-body">
                    <div class="contact-header">
                        <h4 class="text-capitalize">Testing Kits</h4>
                        <p>Bellow is a summary of the available kits</p>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kit</th>
                                <th class="text-right">Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Coming soon</td>
                                <td class="text-right">00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
       </div>

       <div class="col-sm-12 col-md-8">
        <div class="card by-stream calc-29">
            <div class="card-body calc-29">
                <div class="contact-header">
                    <h4 class="text-capitalize">Kits form</h4>
                    <p>Fill in the form bellow to update the kits details</p>
                </div>
                <form class="kit-form" id="cform">
                   <div class="row">
                       <div class="col-sm-12 col-md-4">
                           <div class="form-group">
                               <label>
                                   <strong>Lab</strong>  <strong class="text-danger">*</strong>
                                   <p><small>Select the Lab</small></p>
                               </label>
                               <select class="form-control" id="labId" required  >
                                   <option value="0">-- Select Lab--</option>
                                   @foreach($getLabs->data as $item)
                                       <option value="{{ $item->id }}">{{ $item->clinicName }}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                       <div class="col-sm-12 col-md-4">
                           <div class="form-group">
                               <label>
                                   <strong>The Kit</strong>  <strong class="text-danger">*</strong>
                                   <p><small>Select the kit</small></p>
                               </label>
                               <select class="form-control" id="testKit"  required >
                                   <option value="0">-- Select Kit--</option>
                                   @foreach($getTestKits->data as $item)
                                       <option>{{ $item->testKit }}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                       <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label>
                                    <strong>Movement type</strong>  <strong class="text-danger">*</strong>
                                    <p><small>Select movemenyt type</small></p>
                                </label>
                                    <select class="form-control" id="movementType"  required>
                                        <option value="0">-- Select movement type--</option>
                                        @foreach($getTestKitMovementsType->data as $item)
                                        <option>{{ $item->movementName }}</option>
                                        @endforeach
                                    </select>
                            </div>
                       </div>

                       <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        <strong>Unit</strong>  <strong class="text-danger">*</strong>
                                        <p><small>Select packaging unit</small></p>
                                    </label>
                                        <select class="form-control" id="SKU"  required>
                                            <option value="0">-- Select Unit--</option>
                                            @foreach($getSku->data as $item)
                                            <option>{{ $item->sku }}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>

                   <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>
                                <strong>Number of units</strong>  <strong class="text-danger">*</strong>
                                <p><small>Enter the number of units bellow</small></p>
                            </label>
                                <input type="text" class="form-control" id="quantity" placeholder="Enter number of units">
                                <input type="hidden" class="form-control" id="createdBy" value="{{  Session::get('resource')[0]['username'] }}">
                        </div>
                   </div>

                   <div class="col-12">
                       <button class="btn btn-primary save-kits" type="submit">Submit</button>
                       <span class="d-none" id="loader14" >
                            <img src="{{ asset('img/loader/loader.gif') }}" style="size: 20px" />
                        </span>
                   </div>


                   </div>
                </form>

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
    $('.save-kits').click(function(e){
        e.preventDefault();

        var labId = $('#labId').val();
        var testKit = $("#testKit").val();
        var movementType = $("#movementType").val();
        var SKU = $("#SKU").val();
        var quantity = $("#quantity").val();
        var createdBy = $("#createdBy").val();

alert(labId);
        if(labId === "" || quantity ==="" ) {
            swal({
                title: "Required fields",
                text:"Please Fill All Required Field",
                icon: "danger",
            });
            return false;
        }

        $('#loader14').removeClass('d-none');
        $.ajax({

            url: "save-kits" ,
            type: "POST",
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {labId:labId, testKit:testKit, movementType:movementType, SKU:SKU, quantity:quantity,createdBy:createdBy},

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

