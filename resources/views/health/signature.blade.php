@extends('layouts.app')
@section('content')
    <!--  pay confirmation pop up-->
    <section class="content">


        <div class="content__inner" id="app">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Upload Signature</h4>
                    <h6>The uploaded signature will appreare on the certificates you approve, so make sure it is you right signature</h6>
                    <p class="text-danger bg-danger-light p-3 d-none">
                        <span>The uploaded signature will appreare on the certificates you approve, so make sure it is your right signature.</span>
                    </p>
                    <p  class="alert alert-success" id="msg" style="display:none">Saved</p>
                    @if($errors->any())
                        <p class="alert alert-danger">{{$errors->first()}}</p>
                    @endif
                    <div class="col-12 p-0 request-container animated fadeIn mt-3">
                        <div class="drop-section-container cursor-pointer">
                            <input type="text" class="form-control input-mask d-none" name="approvedBy" id="approvedBy" readonly required value="{{ Session::get('resource')[0]['user_full_name'] }}" >

                            <div class="col-sm-12 col-md-6 d-none">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control input-mask d-none" name="approvedBy" id="approvedBy" readonly required value="{{ Session::get('resource')[0]['user_full_name'] }}" >
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                                <input type="file"  name="file" id="file" class="dropify w-100 m-2" data-show-loader="true" required @change="uploadFile($event)" />

                            <div class="" id="loader1" style="display: none" ><br>
                                <img src='{{ asset('img/loader/loader-pay.gif') }}' width="80" height="80" alt="loader"/>Loading...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content__inner d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upload staff members</h4>
                    <h6 class="card-subtitle mb-1 pb-0">Upload a list of your staff members from your excell sheet</h6>
                    <p class="text-danger bg-danger-light p-3">
                        <span>The uploaded signature will appreare on the certificates you approve, so make sure it is you right signature.</span>
                    </p>
                    <a href="https://test.revenuesure.co.ke/health/api/upload-template.csv" class="text-info mb-3"> Download the document template <i class="ti-download ml-1"></i></a>
                    <div class="col-12 p-0 request-container animated fadeIn mt-3">

                        <div class="drop-section-container cursor-pointer" action="upload-results.html">
                            <input type="file" form="myForm"  name="file" id="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.xlsx"  class="dropify w-100 m-2" data-show-loader="true" required/>

                            <div class="form-group   p-3  m-0 d-none ">
                                <button class="btn btn-primary text-capitalize w-100 text-center"><i class="zmdi zmdi-upload mr-3"></i>Done</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/vuex"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            const vueApp = new Vue({
                el: '#app',
                data: {
                    gggg:'jkjkjhkjhkh'
                },
                methods:{
                    uploadFile: function (event) {
                        if (confirm('Please Confirm to upload')) {
                            $('#loader1').show();
                            this.progress = true;
                            var approvedBy= $("#approvedBy").val();

                            //alert(username);

                            this.file = event.target.files[0];
                            const data = new FormData();
                            data.append('function', 'uploadSignature');
                            data.append('approvedBy', approvedBy);
                            data.append('fileToUpload', this.file);


                            axios.post( 'https://biller.revenuesure.co.ke/afya/',
                           //axios.post( 'http://10.12.49.47/health/api/index.php',
                                data, {
                                    headers: {
                                        'Content-Type': 'multipart/form-data'
                                    }
                                }
                            ).then(function(res){
                                $('#loader1').hide();
                                //$("#res-table").load(window.location + " #res-table");
                                $('#msg').html(res.data.message).fadeIn('slow');
                                //$('#msg').html("data insert successfully").fadeIn('slow') //also show a success message
                                $('#msg').delay(20000).fadeOut('slow');
                            })
                                .catch(function(){
                                    console.log('FAILURE!!');
                                });


                        } else {
                            txt = 'You pressed Cancel!';
                        }

                    }
                }
            })
        </script>



        <script type="text/javascript">
            $(function() {
                $(".delbutton").click(function(){
                    alert('Yes its working');

                });
            });
        </script>
    </section>
    @endsection


