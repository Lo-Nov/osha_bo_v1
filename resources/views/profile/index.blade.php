@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="content__inner content__inner--sm">
            <header class="content__title">
                <h1>Welcome: {{ \Illuminate\Support\Facades\Session::get('resource')[0]['user_full_name'] }}</h1>
                <small>Nairobi County Health System </small>

                <div class="actions">
                    <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                    <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                    <div class="dropdown actions__item">
                        <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item">Refresh</a>
                            <a href="#" class="dropdown-item">Manage Widgets</a>
                            <a href="#" class="dropdown-item">Settings</a>
                        </div>
                    </div>
                </div>
            </header>

            <div class="card profile">
                <div class="profile__img">
                    <img src="{{ asset('demo/img/profile-pics/2.jpg') }}" alt="">

{{--                    <a href="#" class="zmdi zmdi-camera profile__img__edit"></a>--}}
                </div>

                <div class="profile__info">
                    <p>Welcome back and feel free to use our system to maximize your potentials</p>

                    <ul class="icon-list">
                        <li><i class="zmdi zmdi-phone"></i> {{ Session::get('resource')[0]['email'] }}</li>
                        <li><i class="zmdi zmdi-email"></i> {{ Session::get('resource')[0]['phone_number'] }}</li>
                        <li><i class="zmdi zmdi-twitter"></i>{{ Session::get('resource')[0]['roles'] }} </li>
                    </ul>
                </div>
            </div>

            <div class="">
                <nav class="">
                    <code>Use the form below to change your password, Once changed remember to logout or use your new password in your next login</code>
                </nav>

                <div class="toolbar__search">
                    <input type="text" placeholder="Search...">

                    <i class="toolbar__search__close zmdi zmdi-long-arrow-left" data-ma-action="toolbar-search-close"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-body__title mb-4">Change your password</h4>

                    <p>  </p>
                    @if($errors->any())
                        <p class="alert alert-success">{{$errors->first()}}</p>
                    @endif

                    <form action="{{ route('health-change-password') }}" method="post">
                        @csrf
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" value="{{ Session::get('resource')[0]['user_id'] }}" name="user_id" class="form-control form-control-lg" placeholder="user id">
                                    <input type="text" name="old_password" class="form-control form-control-lg" placeholder="Old Password">
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="new_password" class="form-control" placeholder="New Password">
                                    <i class="form-group__bar"></i>
                                </div>
                                <button type="submit" class="btn btn-success btn--raised float-right">Change Password</button>
                            </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>

    
    </section>

@endsection


