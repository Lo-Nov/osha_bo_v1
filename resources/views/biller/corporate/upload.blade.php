@extends('layouts.app')
@section('content')


    <!--  pay confirmation pop up-->
    <section id="service-form-section" class="" style="margin-top: 20px">
        <div class="container"  >
            <div class="row ">
                <div class="service-form-container  d-flex flex-column-md animated col-12 p-0">
                    <div class="col-md-5 service-form-img-container" id="health-img">
                        <div class="col-lg-12 col-md-12 position-relative p-5">
                            <h2 class="mb-4 ">Upload staff members</h2>
                            <p class="font-14 mb-3  ">Upload a list of your staff members from your excell sheet</p>
                        </div>
                    </div>
                    <div class="col-lg-7 p-5 position-relative transactions-form-container d-flex">
                        <div class="col-12 p-0 the-transaction-form animated">


                            <div class="d-none">
                                <p class="mb-5 pb-2  "><strong>Correctly fill in the form below to continue</strong></p>
                            </div>


                            <!-- application form-->
                            <div  class="row food-application animated" id="app">

                                <div class="col-12 p-0 the-transaction-form animated">
                                    <div class="mini-nav mb-4 mx-2">
                                        <ul>
                                            <li><a href="">Home</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col p-0 mt-5">
                                    <p class="alert alert-danger d-none" id="msg-danger"></p>
                                    <p class="alert alert-success d-none" id="msg-success"></p>
                                </div>
                                <form class="transaction-form  w-100  mt-5" id="myForm">
                                    <div class="form-group col-md-12 p-0 col-lg-12 mt-2">
                                        <label for="corporateId" class="text-capitalize">Corporate / Business Id <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control " id="corpId" value="{{ Session::get('corporateId') }}" name="corporateId" readonly >
                                    </div>

                                    <div class="col-12 info  form-group mt-2 p-0">
                                        <div class="p-3 bg-light-warning">
                                            <p>
                                                Before you continue, ensure the document you are about to upload is in the required format, if not,
                                                <i class="fa fa-download"></i> <a href="https://test.revenuesure.co.ke/health/api/upload-template.csv" target="_blank" class="text-info">Download</a>
                                                the sample CSV  document below and fill it correctly as indicated.
                                            </p>
                                            <span>
                    {{-- <a href="https://test.revenuesure.co.ke/health/api/upload-template.csv" class="btn btn-dark"><i class="fa fa-download mr-3"></i>Download template</a> --}}
                                                {{-- <strong> - OR - </strong> --}}
                    <label for="file" class="btn btn-success"><i class="fa fa-upload mr-3"></i>Upload staff list</label>
                  </span>
                                        </div>
                                    </div>
                                    <p class="upload-results-file d-none">No file selected</p>
                                    <div class="form-group col-md-12 col-lg-12 mt-2 d-none">
                                        <label for="excel" class="text-capitalize">Choose file <strong class="text-danger">*</strong></label>
                                        <input type="file"  name="file" id="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.xlsx"  class=" w-100 m-2" data-show-loader="true" required @change="uploadFile($event)" />
                                    </div>
                                    <div class="col-sm-12 pt-3">
                <span type="submit" id="create-next" class="btn btn-primary text-white font-12 border-0 text-capitalize btn-confirm d-none"><i class="fa fa-upload"></i>
                    Upload</span>
                                        <div class="col-lg-1 float-right d-none" id="loader14" >
                                            <img src="{{ asset('img/loader/loader.gif') }}" alt="" />
                                        </div>
                                    </div>
                                </form>
                            </div>
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
    <!--upload modal-->

    <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Upload title</h3>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p>Drag or click the file you would like to upload</p>

                    <div class="col-12 p-0 request-container animated fadeIn">

                        <div class="drop-section-container cursor-pointer" action="upload-results.html">
                            <input type="file" form="myForm"  name="file" id="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.xlsx"  class="dropify w-100 m-2" data-show-loader="true" required  @change="uploadFile($event)" />

                            <div class="form-group   p-3  m-0 d-none ">
                                <button class="btn btn-primary text-capitalize w-100 text-center"><i class="zmdi zmdi-upload mr-3"></i>Done</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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

                        //   var fileName = document.getElementById('file');
                        //  alert('The file "' + fileName.value +  '" has been selected.');

                        $('#loader1').show();
                        $('#loader14').removeClass('d-none');

                        this.progress = true;
                        var corpId= $("#corpId").val();
                        $('.upload-results-file').text("File selected");
                        //alert(corpId);
                        this.file = event.target.files[0];
                        const data = new FormData();
                        data.append('function', 'uploadIndividuals');
                        data.append('excel', this.file);
                        data.append('corporateId', corpId);

                        //https://test.revenuesure.co.ke/health/api/index.php
                        //http://10.12.49.47/health/api/index.php
                        axios.post('https://biller.revenuesure.co.ke/afya/',
                            data,
                            {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            }
                        ).then(function(res){
                            $('#loader14').addClass('d-none');
                            //console.log(res.data.message);
                            $('#msg-success').removeClass('d-none');
                            $("#msg-success").html(res.data.message);
                            $("#msg-success").delay(5000).fadeOut('slow');
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
@endsection
