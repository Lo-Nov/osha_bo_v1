@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="col-12 p-0">
            <div class="card-demo">
                <div class="card card-primary card--inverse bg-blue  pb-0" id="bg-doc">

                    <div class="card-body pb-0">
                        <center class="search-bill pb-0">
                            <h4 class="card-title">Approve or decline food handler application</h4>
                            <h6 class="card-subtitle">Use both the Patient's bill and their ID/PPT number to continue</h6>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form  action="{{ route('post-bill-tests') }}"  method="post" class="form-inline">
                                    @csrf
                                    <div class="form-group mx-sm-3 mb-2 col-8 p-0">
                                        <label for="inputPassword2" class="sr-only d-none">Password</label>
                                        <input name="billId"   type="text" class="form-control w-100 flex-grow-1" placeholder="Input format -Bill Num, Id Num" title="Input in the correct format Ie Bill Num,ID Numm (or Bill number alone )"  autofocus>
                                    </div>
                                    <button type="submit" class="btn btn-warning text-white mb-2 ml-0 text-black"><i class="zmdi zmdi-search"></i> Search</button>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Eg MS2020-12345,1234567 (Bill Number, ID/PPT Num) or Bill number alone for few staffs</p>
                                        </div>
                                    </div>
                            </form>
                            <img src="{{ asset('img/docs.svg') }}">
                        </center>
                    </div>

                </div>
            </div>
         </div>

        <div class="content__inner d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="zmdi zmdi-book"></i>  Get bill details for approvals</h4>
                    <br>
                    <br><br>
                    <br><br>
                    <br>
                    <br>
                    <br>
                    <h6 class="card-subtitle"></h6>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('post-bill-tests') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" name="billId" class="form-control" placeholder="Enter bill number eg MS20xxxxxxxxxxxxx">
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"> <i class="zmdi zmdi-check-all"></i> Get bill details</button>
                                    <i class="form-group__bar"></i>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    </section>
@endsection
