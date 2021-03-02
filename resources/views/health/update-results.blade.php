@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="content__inner">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Result Form</h4>
                    <h6 class="card-subtitle">The doctor <code>.update</code> the <code>.patient results</code>, here </h6>

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @elseif(\Session::has('error'))

                        <div class="alert alert-danger">
                            <ul>
                                <li>{!! \Session::get('error') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form class="row" action="{{ route('save-updates') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <h3 class="card-body__title">Floating label examples</h3>

                            <div class="form-group form-group--float">
                                <input type="text" name="id" class="form-control" value="{{ $id }}" readonly>
                                <label>ID</label>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group form-group--float">
                                <input type="text" name="testName" value="{{ $testName }}" class="form-control" readonly>
                                <label>Test Name</label>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group form-group--float">
                                <input type="text" name="testTypeId" value="{{ $testTypeId }}" class="form-control" readonly>
                                <label>Test Type ID</label>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h3 class="card-body__title">Floating label examples</h3>
                            <div class="form-group mb-0">
                                <label>Lab Tech ID</label>
                                <div class="select">
                                    <select  id="subcounty" name="labId" class="form-control">
                                        <option>-- select lad Id --</option>
                                        @foreach($labs->data as $item)
                                            <option value="{{$item->id}}">{{$item->clinicName}}</option>
                                        @endforeach
                                    </select>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label>Lab Tech ID</label>
                                <div class="select">
                                    <select  id="subcounty" name="labTechName" class="form-control">
                                        <option>-- select facility name --</option>
                                        @foreach($labs->data as $item)
                                            <option value="{{$item->clinicName}}">{{$item->clinicName}}</option>
                                        @endforeach
                                    </select>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label>Lab Tech ID</label>
                                <div class="select">
                                    <select  id="subcounty" name="labTechId" class="form-control">
                                        <option>-- select lab tech id --</option>
                                        @foreach($labs->data as $item)
                                            <option value="{{$item->id}}">{{$item->clinicName}}</option>
                                        @endforeach
                                    </select>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group form-group--float">
                                <textarea type="text" name="labResult"  rows="5" class="form-control"></textarea>
                                <label>Results</label>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group form-group--float">
                                <button type="submit" class="btn btn-primary">Save Records</button>

                                <label>Test Type ID</label>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
