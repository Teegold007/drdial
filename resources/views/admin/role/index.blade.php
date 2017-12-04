@extends('admin.layouts.default')
@section('title','Roles')

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
                        <h4 class="panel-title">Roles List</h4>
                    </div>
                    <div class="panel-body">
                        @include('admin.includes.alert')
                        <div class="tabs inside-panel">
                            <ul id="myTab5" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#role-list" data-toggle="tab"><i class="fa fa-list-ol"></i> Role List</a>
                                </li>
                                <li >
                                    <a href="#role-add" data-toggle="tab"><i class="fa fa-plus"></i> Add Role</a>
                                </li>
                            </ul>
                            <div id="myTabContent5" class="tab-content">
                                <div class="tab-pane fade active in" id="role-list">
                                    <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Roles Name</th>
                                            <th>Guard</th>
                                            <th>Permissions</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{title_case($role->name)}}</td>
                                                <td>{{title_case($role->guard_name)}}</td>
                                                <td>{{str_replace(array('[',']','"'),'', $role->permissions()->pluck('name'))}}</td>
                                                <td><button class="btn btn-info" data-toggle="modal" data-target="#modal-edit{{$role->id}}">Edit Role</button></td>
                                                <td><button class="btn btn-danger"
                                                            onclick="event.preventDefault(); document.getElementById('deleteRole').submit();">
                                                        Delete Role
                                                    </button>
                                                    {!! Form::model($role, ['route' => ['role.destroy', $role->id],'method' =>'DELETE', 'id' => 'deleteRole']) !!}
                                                    {!! Form::close(); !!}
                                                </td>
                                            </tr>
                                            <!--Edit Modal -->
                                            <div class="modal fade modal-style6" id="modal-edit{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                            </button>
                                                            <h4 class="modal-title" id="mySmallModalLabel">Edit Role</h4>
                                                        </div>
                                                        {!! Form::model($role, ['route' => ['role.update', $role],'method' => 'PUT','class' => 'form-horizontal','role' =>'form']) !!}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                {!! Form::label('name','Permission Name',['class' =>'sr-only']) !!}
                                                                {!! Form::text('name',$role->name, array('required' => true ,'class' =>'form-control','placeholder' => 'Role Name')) !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <ul class="list-group-item list-unstyled list-inline">
                                                                    <h5><strong>Assign Permissions</strong></h5>
                                                                    @foreach ($permissions as $permission)
                                                                       <li>
                                                                           <div class="toggle-custom">
                                                                               <label class="toggle" data-on="ON" data-off="OFF">
                                                                                {!! Form::checkbox('permissions[]', $permission->id, $role->$permission,['id' => 'checkbox-toggle']) !!}
                                                                                   <span class="button-checkbox"></span>
                                                                               </label>
                                                                               <label for="checkbox-toggle">{{$permission->name}}</label>
                                                                           </div>
                                                                       </li>
                                                                    @endforeach
                                                                </ul>
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
                                <div class="tab-pane fade" id="role-add">
                                    {!! Form::open(['route'=>'role.store','method'=>'post', 'class' => 'form-horizontal group-border stripped']) !!}
                                         <div class="form-group">
                                             {!! Form::label('name', 'Role Name', ['class' => 'col-lg-2 col-md-3 control-label']) !!}
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
                                    <div class='form-group'>
                                        {!! Form::label('permission', 'Assign Permissions', ['class' => 'col-lg-2 col-md-3 control-label']) !!}
                                            <div class="col-lg-10 col-md-9">
                                                <ul class="list-group-item list-unstyled list-inline">
                                                @foreach ($permissions as $permission)
                                                        <li>
                                                            <div class="toggle-custom">
                                                                <label class="toggle" data-on="ON" data-off="OFF">
                                                                    {!! Form::checkbox('permissions[]', $permission->id,['id' => 'checkbox-toggle']) !!}
                                                                    <span class="button-checkbox"></span>
                                                                </label>
                                                                <label for="checkbox-toggle">{{$permission->name}}</label>
                                                            </div>
                                                        </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                    </div>
                                        <div class="form-group">
                                            {!! Form::submit('Add Role',['class' => 'btn btn-success col-sm-offset-2 col-sm-5']) !!}

                                        </div>
                                    {!! Form::close(); !!}
                                </div>
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
@stop