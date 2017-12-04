@extends('admin.layouts.default')
@section('title','Administrators')

@section('content')
    <div class="page-content-inner">
        <!-- Start .page-content-inner -->
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Administrators</h2>
                <span class="txt">Represent big amount of data</span>
            </div>
            <div class="header-stats">
                <div class="spark clearfix">
                    <div class="spark-info"><span class="number">2345</span>Visitors</div>
                    <div id="spark-visitors" class="sparkline"></div>
                </div>
                <div class="spark clearfix">
                    <div class="spark-info"><span class="number">17345</span>Views</div>
                    <div id="spark-templateviews" class="sparkline"></div>
                </div>
                <div class="spark clearfix">
                    <div class="spark-info"><span class="number">3700$</span>Sales</div>
                    <div id="spark-sales" class="sparkline"></div>
                </div>
            </div>
        </div>
        <!-- Start .row -->
        <div class="row">

            <div class="col-lg-12">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading">
                        <h4 class="panel-title">Administrators List</h4>
                    </div>
                    <div class="panel-body">
                        @include('admin.includes.alert')
                        <ul id="myTab5" class="nav nav-tabs">
                            <li class="active">
                                <a href="#admin-list" data-toggle="tab"><i class="fa fa-users"></i> Administrators List</a>
                            </li>
                            <li>
                                <a href="#role-add" data-toggle="tab"><i class="fa fa-user-plus"></i> Add Administrator</a>
                            </li>
                        </ul>
                        <div id="myTabContent5" class="tab-content">
                            <div class="tab-pane fade active in" id="admin-list">
                                <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{title_case($user->roles()->pluck('name')->implode(' ')) }}</td>
                                            <td><button class="btn btn-info">Edit Users</button></td>
                                            <td><button class="btn btn-danger">Delete Users</button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="role-add">
                                {!! Form::open(['route'=>'admin.store','method'=>'post', 'class' => 'form-horizontal group-border stripped']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Fullname', ['class' => 'col-lg-2 col-md-3 control-label']) !!}
                                    <div class="col-lg-10 col-md-9">
                                        {!! Form::text('name',null,array_merge(['required' => true,'class'=>'form-control'])) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email Address', ['class' => 'col-lg-2 col-md-3 control-label']) !!}
                                    <div class="col-lg-10 col-md-9">
                                        {!! Form::email('email',null,array_merge(['required' => true,'class'=>'form-control'])) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password', 'Password', ['class' => 'col-lg-2 col-md-3 control-label']) !!}
                                    <div class="col-lg-10 col-md-9">
                                        {!! Form::password('password',['required' => true,'class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password_confirmation', 'Retype Password', ['class' => 'col-lg-2 col-md-3 control-label']) !!}
                                    <div class="col-lg-10 col-md-9">
                                        {!! Form::password('password_confirmation',['required' => true,'class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('role', 'Assign Role', ['class' => 'col-lg-2 col-md-3 control-label']) !!}
                                    <div class="col-lg-10 col-md-9">
                                        <select id="role" name="role" class="form-control" required>
                                            @foreach($roles as $role)
                                                <option value="{{$role}}">{{$role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m25">
                                    {!! Form::submit('Add User',['class' => 'btn btn-success col-sm-offset-2 col-sm-5']) !!}
                                </div>
                                </div>
                                {!! Form::close(); !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .panel -->
            </div>
            <!-- col-lg-12 end here -->

        </div>
        <!-- End .row -->
    </div>
        @stop