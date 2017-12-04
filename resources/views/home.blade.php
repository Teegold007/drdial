@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('includes.alert')
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard
                        <span class="text-right"></span>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                    @endif

                    <!-- Main Application (Can be VueJS or other JS framework) -->
                        <div class="app">
                            <ul id="myTab5" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#all-list" data-toggle="tab">
                                        @role('Doctor')
                                            All Patient
                                        @else
                                            All Doctors
                                        @endrole
                                    </a>
                                </li>
                                <li>
                                    <a href="#related-list" data-toggle="tab">
                                        @role('Doctor')
                                            My Patient
                                        @else
                                            My Doctors
                                        @endrole
                                    </a>
                                </li>
                                <li>
                                    <a href="#questions-received" data-toggle="tab">
                                        Inbox Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="#questions-asked" data-toggle="tab">
                                        Sent Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="#block-list" data-toggle="tab">
                                        Block List
                                    </a>
                                </li>
                            </ul>
                            <div id="myTabContent5" class="tab-content">
                                <div class="tab-pane fade active in" id="all-list">
                                    <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            @if($role === "Patient")
                                                <th>Field</th>
                                            @endif
                                            <th>Patients</th>
                                            <th colspan="2" class="text-center">Action</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allLists as $member)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$member->name}}</td>
                                                <td>{{$member->email}}</td>
                                                @if($role === "Patient")
                                                    <td>{{$member->field}}</td>
                                                @endif
                                                <td><a href="{{route('attach',[$member->id])}}" class="btn btn-info">
                                                        @role('Doctor')
                                                            @if(Auth::user()->patients->contains($member))
                                                                Remove From List
                                                            @else
                                                                Add To List
                                                            @endif
                                                        @else
                                                            @if(Auth::user()->doctors->contains($member))
                                                                Remove From List
                                                            @else
                                                                Add To List
                                                            @endif
                                                        @endrole
                                                    </a>
                                                </td>
                                                @if($member->blacklist && $member->blacklist->count())
                                                    <td><a href="{{ route("delete.blacklist", [$member->id]) }}" class="btn btn-warning">Unblock {{$member->roles()->pluck('name')->implode(' ')}}</a></td>
                                                @else
                                                    <td><a href="{{ route("store.blacklist", [$member->id]) }}" class="btn btn-danger">Block {{$member->roles()->pluck('name')->implode(' ')}}</a></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="related-list">
                                    <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            @if($role === "Patient")
                                                <th>Field</th>
                                            @endif
                                            <th colspan="3" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($relatedLists as $related)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$related->name}}</td>
                                                <td>{{$related->email}}</td>
                                                @if($role === "Patient")
                                                    <td>{{$related->field}}</td>
                                                @endif
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#ask-modal{{$related->id}}">Ask {{$related->roles()->pluck('name')->implode(' ')}} A Question</button>
                                                </td>
                                                <td>
                                                    <a href="{{route('attach',[$related->id])}}" class="btn btn-warning">
                                                        Remove {{$related->roles()->pluck('name')->implode(' ')}}
                                                    </a>
                                                </td>
                                                <td><button class="btn btn-danger">Block Users</button></td>
                                            </tr>
                                            <div class="modal fade" id="ask-modal{{$related->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog">
                                                    <form method="post" action="{{route('submit-question',[$related->id,$related->roles()->pluck('name')->implode(' ')])}}" class="form-horizontal">
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                                </button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Ask your question here</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-md-3 control-label">Body</label>
                                                                            <div class="col-md-9">
                                                                                <textarea name="body" class="form-control" rows="4" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success" >Submit</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="questions-received">
                                    <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Fullname</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count(Auth::user()->questions) > 0)
                                            @foreach($inboxMsgs as $inbox)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$inbox->authorName($inbox->author_role)}}</td>
                                                    <td>{{$inbox->body}}</td>
                                                    <td>@if(count($inbox->answers)) Answered @else Not Answered @endif</td>
                                                    <td>
                                                        @if(count($inbox->answers) < 1)
                                                            <button class="btn btn-danger" data-toggle="modal" data-target="#answer-modal{{$inbox->id}}">Answer Question</button>
                                                        @else
                                                            <button class="btn btn-danger" data-toggle="modal" data-target="#view-answer{{$inbox->id}}">View Answer</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="view-answer{{$inbox->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                                </button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Answers that belongs to this question</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group list-unstyled">
                                                                    @foreach($inbox->answers as $answer)
                                                                        <li>{{$answer->body}}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="answer-modal{{$inbox->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="{{route('answer-question',[$inbox->id])}}" class="form-horizontal">
                                                            {{csrf_field()}}
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="mySmallModalLabel">Answer This Question</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <div class="form-group">
                                                                                <label for="name" class="col-md-3 control-label">Body</label>
                                                                                <div class="col-md-9">
                                                                                    <textarea name="body" class="form-control" rows="4"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success" >Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5"> You've not been asked any question</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="questions-asked">
                                    <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Recipient</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sentMsgs as $sentMsg)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$sentMsg->recipientName($role)}}</td>
                                                <td>{{$sentMsg->body}}</td>
                                                <td>{{count($sentMsg->answers)}}</td>
                                                <td>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#answer-modal{{$sentMsg->id}}">View Answer</button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="answer-modal{{$sentMsg->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                            </button>
                                                            <h4 class="modal-title" id="mySmallModalLabel">Answers that belongs to this question</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group list-unstyled">
                                                                @foreach($sentMsg->answers as $answer)
                                                                    <li>{{$answer->body}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="block-list">
                                    <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            @if($role === "Patient")
                                                <th>Field</th>
                                            @endif
                                            <th colspan="3" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($blockLists as $block)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$block->name}}</td>
                                                <td>{{$block->email}}</td>
                                                @if($role === "Patient")
                                                    <td>{{$block->field}}</td>
                                                @endif
                                                <td><a href="{{ route("delete.blacklist", [$block->id]) }}" class="btn btn-danger">Unblock Users</a></td>
                                            </tr>
                                            <div class="modal fade" id="ask-modal{{$block->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog">
                                                    <form method="post" action="{{route('submit-question',[$block->id,$block->roles()->pluck('name')->implode(' ')])}}" class="form-horizontal">
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                                </button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Ask your question here</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-md-3 control-label">Body</label>
                                                                            <div class="col-md-9">
                                                                                <textarea name="body" class="form-control" rows="4"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success" >Submit</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Of Main Application -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
