<!-- .page-sidebar -->
<aside id="sidebar" class="page-sidebar hidden-md hidden-sm hidden-xs">
    <!-- Start .sidebar-inner -->
    <div class="sidebar-inner">
        <!-- Start .sidebar-scrollarea -->
        <div class="sidebar-scrollarea">
            <!--  .sidebar-panel -->
            <div class="sidebar-panel">
                <h5 class="sidebar-panel-title">Profile</h5>
            </div>
            <!-- / .sidebar-panel -->
            <div class="user-info clearfix">
                <img src="{{url('administrator/dynamic/img/avatars/128.jpg')}}" alt="avatar">
                <span class="name">{{  Auth::user()->name}}</span>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs"><i class="l-basic-gear"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">settings <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu right" role="menu">
                        <li><a href="javascript:void(0);"><i class="fa fa-edit"></i>Edit profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{route('backend.logout')}}"><i class="fa fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--  .sidebar-panel -->
            <div class="sidebar-panel">
                <h5 class="sidebar-panel-title">Navigation</h5>
            </div>
            <!-- / .sidebar-panel -->
            <!-- .side-nav -->
            <div class="side-nav">
                <ul class="nav">
                    <li class="active">
                        <a href="{{route('dashboard')}}"><i class="l-basic-laptop"></i><span class="txt">Dashboard</span></a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin.index')}}"><i class="fa fa-user fa-2x"></i><span class="txt">Administrators</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="l-basic-lock"></i> <span class="txt">Privileges</span></a>
                        <ul class="sub">
                            <li><a href="{{route('role.index')}}"><span class="txt">Roles</span></a>
                            </li>
                            <li><a href="{{route('permission.index')}}"><span class="txt">Permission</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- / side-nav -->
            <!--  .sidebar-panel -->
            <div class="sidebar-panel">
                <h5 class="sidebar-panel-title">Server stats</h5>
                <div class="sidebar-panel-content">
                    <div class="sidebar-stat mb10">
                        <p class="color-white mb5 mt5"><i class="fa fa-hdd-o mr5"></i> Disk Space <span class="pull-right small">30%</span>
                        </p>
                        <div class="progress flat transparent progress-bar-xs">
                            <div class="progress-bar progress-bar-white" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                        </div>
                        <span class="dib s12 mt5 per100 text-center">3001.56 / 10000 MB</span>
                    </div>
                    <div class="sidebar-stat">
                        <p class="color-white mb5 mt5"><i class="glyphicon glyphicon-transfer mr5"></i> Bandwidth Transfer <span class="pull-right small">78%</span>
                        </p>
                        <div class="progress flat transparent progress-bar-xs">
                            <div class="progress-bar progress-bar-white" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                        </div>
                        <span class="dib s12 mb10 mt5 per100 text-center">87565.12 / 120000 MB</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .sidebar-scrollarea -->
    </div>
    <!-- End .sidebar-inner -->
</aside>
<!-- / page-sidebar -->
<!-- Start #right-sidebar -->
<aside id="right-sidebar" class="right-sidebar hidden-md hidden-sm hidden-xs">
    <!-- Start .sidebar-inner -->
    <div class="sidebar-inner">
        <!-- Start .sidebar-scrollarea -->
        <div class="sidebar-scrollarea">
            <div class="tabs">
                <!-- Start .rs tabs -->
                <ul id="rstab" class="nav nav-tabs nav-justified">
                    <li class="active">
                        <a href="#activity" data-toggle="tab"><i class="glyphicon glyphicon-bullhorn"></i> </a>
                    </li>
                    <li>
                        <a href="#users" data-toggle="tab"><i class="fa fa-comments"></i> </a>
                    </li>
                </ul>
                <div id="rstab-content" class="tab-content">
                    <div class="tab-pane fade active in" id="activity">
                        <ul class="timeline timeline-icons timeline-sm">
                            <li>
                                <p>
                                    <a href="#">Jonh Doe</a> attached new <a href="#">file</a>
                                    <span class="timeline-icon"><i class="fa fa-file-text-o"></i></span>
                                    <span class="timeline-date">Dec 10, 22:00</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">Admin</a> approved <a href="#">3 new comments</a>
                                    <span class="timeline-icon"><i class="fa fa-comment"></i></span>
                                    <span class="timeline-date">Dec 8, 13:35</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">Jonh Smith</a> deposit 300$
                                    <span class="timeline-icon"><i class="fa fa-money color-green"></i></span>
                                    <span class="timeline-date">Dec 6, 10:17</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">Serena Williams</a> purchase <a href="#">3 items</a>
                                    <span class="timeline-icon"><i class="fa fa-shopping-cart color-red"></i></span>
                                    <span class="timeline-date">Dec 5, 04:36</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">1 support </a> request is received from <a href="#">Klaudia Chambers</a>
                                    <span class="timeline-icon"><i class="fa fa-life-ring color-gray-light"></i></span>
                                    <span class="timeline-date">Dec 4, 18:40</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    You received 136 new likes for <a href="#">your page</a>
                                    <span class="timeline-icon"><i class="glyphicon glyphicon-thumbs-up"></i></span>
                                    <span class="timeline-date">Dec 4, 12:00</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">12 settings </a> are changed from <a href="#">Master Admin</a>
                                    <span class="timeline-icon"><i class="glyphicon glyphicon-cog"></i></span>
                                    <span class="timeline-date">Dec 3, 23:17</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">Klaudia Chambers</a> change your photo
                                    <span class="timeline-icon"><i class="l-basic-photo"></i></span>
                                    <span class="timeline-date">Dec 2, 05:17</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">Master server </a> is down for 10 min.
                                    <span class="timeline-icon"><i class="l-basic-server2"></i></span>
                                    <span class="timeline-date">Dec 2, 04:56</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">12 links </a> are broken
                                    <span class="timeline-icon"><i class="fa fa-unlink"></i></span>
                                    <span class="timeline-date">Dec 1, 22:13</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">Last backup </a> is restored by <a href="#">Master admin</a>
                                    <span class="timeline-icon"><i class="fa fa-undo color-red"></i></span>
                                    <span class="timeline-date">Dec 1, 17:42</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="users">
                        <div class="chat-user-list">
                            <form class="form-vertical chat-search" role="form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="Search ...">
                                        <span class="input-group-btn">
                                        <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                    </div>
                                </div>
                                <!-- End .form-group  -->
                            </form>
                            <ul class="user-list list-group">
                                <li class="list-group-item clearfix">
                                    <a href="#">
                                        <img src="dynamic/img/avatars/2.jpg" alt="avatar" class="avatar">
                                        <span class="name">Dean Huges</span>
                                        <span class="status status-online">online</span>
                                    </a>
                                    <div class="chat-messages">
                                        <ul>
                                            <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                            </li>
                                            <li>
                                                <div class="avatar">
                                                    <img src="dynamic/img/avatars/2.jpg" alt="@chadengle">
                                                </div>
                                                <p class="chat-name">Dean Huges <span class="chat-time">15 sec ago</span>
                                                </p>
                                                <div class="message">
                                                    <p class="chat-txt">We need to meet today. I have some things to show you.</p>
                                                </div>
                                            </li>
                                            <li class="chat-me">
                                                <div class="avatar">
                                                    <img src="dynamic/img/avatars/1.jpg" alt="@jonhdoe">
                                                </div>
                                                <p class="chat-name">SuggeElson <span class="chat-time">10 sec ago</span>
                                                </p>
                                                <div class="message message-info">
                                                    <p class="chat-txt">I have tons of work today maybe tomorrow will be fine</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="avatar">
                                                    <img src="dynamic/img/avatars/2.jpg" alt="@chadengle">
                                                </div>
                                                <p class="chat-name">Dean Huges <span class="chat-time">just now</span>
                                                </p>
                                                <div class="message">
                                                    <p class="chat-txt">Okay i will wait..</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item clearfix">
                                    <a href="#">
                                        <img src="dynamic/img/avatars/4.jpg" alt="avatar" class="avatar">
                                        <span class="name">Selena Jones</span>
                                        <span class="status status-offline">offline from 1 Dec</span>
                                    </a>
                                    <div class="chat-messages">
                                        <ul>
                                            <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                            </li>
                                            <li class="no-messages">
                                                <p class="text-center color-red">No messages are found</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item clearfix">
                                    <a href="#">
                                        <img src="dynamic/img/avatars/5.jpg" alt="avatar" class="avatar">
                                        <span class="name">Mike Tomas</span>
                                        <span class="status status-online">online</span>
                                    </a>
                                    <div class="chat-messages">
                                        <ul>
                                            <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                            </li>
                                            <li class="no-messages">
                                                <p class="text-center color-red">No messages are found</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item clearfix">
                                    <a href="#">
                                        <img src="dynamic/img/avatars/6.jpg" alt="avatar" class="avatar">
                                        <span class="name">Jim Kerry</span>
                                        <span class="status status-online">online</span>
                                    </a>
                                    <div class="chat-messages">
                                        <ul>
                                            <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                            </li>
                                            <li class="no-messages">
                                                <p class="text-center color-red">No messages are found</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item clearfix">
                                    <a href="#">
                                        <img src="dynamic/img/avatars/7.jpg" alt="avatar" class="avatar">
                                        <span class="name">Little Jonh</span>
                                        <span class="status status-online">online</span>
                                    </a>
                                    <div class="chat-messages">
                                        <ul>
                                            <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                            </li>
                                            <li class="no-messages">
                                                <p class="text-center color-red">No messages are found</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item clearfix">
                                    <a href="#">
                                        <img src="dynamic/img/avatars/8.jpg" alt="avatar" class="avatar">
                                        <span class="name">Keith Smith</span>
                                        <span class="status status-online">online</span>
                                    </a>
                                    <div class="chat-messages">
                                        <ul>
                                            <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                            </li>
                                            <li class="no-messages">
                                                <p class="text-center color-red">No messages are found</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item clearfix">
                                    <a href="#">
                                        <img src="dynamic/img/avatars/9.jpg" alt="avatar" class="avatar">
                                        <span class="name">Tracy Miller</span>
                                        <span class="status status-online">online</span>
                                    </a>
                                    <div class="chat-messages">
                                        <ul>
                                            <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                            </li>
                                            <li class="no-messages">
                                                <p class="text-center color-red">No messages are found</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item clearfix">
                                    <a href="#">
                                        <img src="dynamic/img/avatars/10.jpg" alt="avatar" class="avatar">
                                        <span class="name">Peter Petrovski</span>
                                        <span class="status status-online">online</span>
                                    </a>
                                    <div class="chat-messages">
                                        <ul>
                                            <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                            </li>
                                            <li class="no-messages">
                                                <p class="text-center color-red">No messages are found</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item clearfix">
                                    <a href="#">
                                        <img src="dynamic/img/avatars/11.jpg" alt="avatar" class="avatar">
                                        <span class="name">Kim Lee</span>
                                        <span class="status status-online">online</span>
                                    </a>
                                    <div class="chat-messages">
                                        <ul>
                                            <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                            </li>
                                            <li class="no-messages">
                                                <p class="text-center color-red">No messages are found</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div id="chat-write">
                                <form id="chat-write-form" class="form-vertical" role="form">
                                    <div class="form-group mb5">
                                        <textarea name="writetext" id="chatwritearea" rows="3" class="form-control" placeholder="Type message ..."></textarea>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group mb0">
                                        <a href="#" class="btn btn-link btn-sm p0 mr5 color-gray"><i class="fa fa-picture-o"></i> </a>
                                        <a href="#" class="btn btn-link btn-sm p0 color-gray"><i class="fa fa-file"></i> </a>
                                        <a href="#" class="btn btn-default btn-sm pull-right">Send</a>
                                    </div>
                                    <!-- End .form-group  -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .rs tabs -->
        </div>
        <!-- End .sidebar-scrollarea -->
    </div>
    <!-- End .sidebar-inner -->
</aside>
<!-- End #right-sidebar -->