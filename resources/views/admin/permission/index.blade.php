@extends('admin.layouts.default')
@section('title','Permissions')

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
                        <h4 class="panel-title">Permission List</h4>
                    </div>
                    <div class="panel-body">
                        @include('admin.includes.alert')
                        <div class="tabs inside-panel">
                            <ul id="myTab5" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#permission-list" data-toggle="tab"><i class="fa fa-chain-broken"></i>Permission List</a>
                                </li>
                                <li >
                                    <a href="#permission-add" data-toggle="tab"><i class="fa fa-plus"></i> Add Permission</a>
                                </li>
                            </ul>
                            <div id="myTabContent5" class="tab-content">
                                <div class="tab-pane fade active in" id="permission-list">
                                    <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Permission Name</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td>{{$permission->name}}</td>
                                                <td>
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#modal-edit{{$permission->id}}">Edit Permission</button>
                                                </td>
                                                <td><button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{$permission->id}}">Delete Permission</button>

                                                </td>
                                            </tr>
                                            <!--Delete Modal -->
                                            <div class="modal fade modal-style6" id="modal-delete{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                            </button>
                                                            <h4 class="modal-title" id="mySmallModalLabel">Delete Permission</h4>
                                                        </div>
                                                        {!! Form::model($permission, ['route' => ['permission.destroy', $permission],'method' => 'DELETE','class' => 'form-inline','role' =>'form']) !!}
                                                        <div class="modal-body">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            {!! Form::submit('Yes, Delete It.',['class' => 'btn btn-danger']) !!}
                                                        </div>
                                                        {!! Form::close(); !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->
                                            <!--Edit Modal -->
                                            <div class="modal fade modal-style6" id="modal-edit{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                            </button>
                                                            <h4 class="modal-title" id="mySmallModalLabel">Edit Permission</h4>
                                                        </div>
                                                        {!! Form::model($permission, ['route' => ['permission.update', $permission],'method' => 'PUT','class' => 'form-inline','role' =>'form']) !!}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                {!! Form::label('name','Permission Name',['class' =>'sr-only']) !!}
                                                                {!! Form::text('name',$permission->name, array('required' => true ,'class' =>'form-control','placeholder' => 'Permission Name')) !!}
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                           {!! Form::submit('Save Changes',['class' => 'btn btn-info']) !!}
                                                        </div>
                                                        {!! Form::close(); !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane fade" id="permission-add">
                                    {!! Form::open(['route'=>'permission.store','method'=>'post', 'class' => 'form-horizontal group-border stripped']) !!}
                                         <div class="form-group">
                                             {!! Form::label('name', 'Permission Name', ['class' => 'col-lg-2 col-md-3 control-label']) !!}
                                             <div class="col-lg-10 col-md-9">
                                                 {!! Form::text('name',null,array_merge(['required' => true,'class'=>'form-control'])) !!}
                                             </div>
                                         </div>
                                    <div class="form-group">
                                        {!! Form::label('name', 'Guard', ['class' => 'col-lg-2 col-md-3 control-label']) !!}
                                        <div class="col-lg-10 col-md-9">
                                            {!! Form::select('guard',['admin' => 'Admin Guard', 'web' => 'Web Guard'],'admin',['required' => true,'class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-5 col-md-5">
                                            @if(!$roles->isEmpty())
                                            <h4>Assign Permission to Roles (Administrator)</h4>
                                            @foreach ($roles as $role)
                                                    @if($role->guard_name == 'admin')
                                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                                    @endif
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-lg-5 col-md-4">
                                            @if(!$roles->isEmpty())
                                                <h4>Assign Permission to Roles (Users)</h4>
                                                @foreach ($roles as $role)
                                                    @if($role->guard_name == 'web')
                                                    {{ Form::checkbox('roles[]',  $role->id ) }}
                                                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('Add Permission',['class' => 'btn btn-success col-sm-offset-2 col-sm-5']) !!}
                                        </div>

                                    {!! Form::close(); !!}
                                </div>
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
    </div>
@stop