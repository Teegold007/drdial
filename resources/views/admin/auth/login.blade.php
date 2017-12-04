@extends('admin.layouts.auth')
@section('content')
    <!-- Start .panel -->
    <div class="login-panel panel panel-default plain animated bounceIn">
        <div class="panel-heading">
            <h4 class="panel-title text-center">
                <img id="logo" src="img/logo-dark.png" alt="Dynamic logo">
            </h4>
        </div>
        <div class="panel-body">
           @include('admin.includes.alert')
            {!! Form::open(['url' => 'backend-login', 'method' => 'post','class' => 'form-horizontal']) !!}
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="input-group input-icon">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        {!! Form::email('email',null,array_merge(['required' => true,'placeholder' => 'Email Address','class' =>'form-control'])) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="input-group input-icon">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        {!! Form::password('password',['required' => true,'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group mb0">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                    <div class="checkbox-custom">
                       {!! Form::checkbox('remember',true) !!}
                        <label for="remember">Remember me ?</label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                    <span class="help-block text-right"><a href="#">Forgout password ?</a></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 mb25">
                    <button class="btn btn-success btn-lg pull-right" type="submit">Login</button>
                </div>
            <div class="seperator">
                <strong>or</strong>
                <hr>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="panel-footer gray-lighter-bg bt">
            <h4 class="text-center"><strong>Are you Lost?</strong>
            </h4>
            <p class="text-center"><a href="register.html" class="btn btn-primary">Return Back To Home</a>
            </p>
        </div>
    </div>
    <!-- End .panel -->
@stop