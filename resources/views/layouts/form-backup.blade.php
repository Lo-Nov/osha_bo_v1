@extends('layouts.app')

@section('content')
<section class="content">
    <div class="content__inner">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form row</h4>
                <h6 class="card-subtitle">You may also swap <code>.row</code> for <code>.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.</h6>

                <form>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First name">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last name">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </form>

                <br>

                <h3 class="card-body__title">Complex layout</h3>
                <p>More complex layouts can also be created with the grid system.</p>

                <br>

                <form>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="First Name">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Last Name">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="About yourself...">
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Address">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address">
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone Number">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="select">
                                    <select class="form-control">
                                        <option selected>Interests</option>
                                        <option>...</option>
                                    </select>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Other">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <input type="checkbox" id="gridCheck">
                            <label class="checkbox__label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create an Account</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
