<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FlareDesk Admin</title>


  <meta name="_token" content="{!! csrf_token() !!}"/>
  <!-- faveo favicon -->
  <link rel="shortcut icon" href="{{asset("lb-faveo/media/images/favicon.ico")}}">
  <!-- Bootstrap 3.3.2 -->
  <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">


  <!-- Font Awesome Icons -->
  <link href="{{asset("lb-faveo/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css"/>

  <!-- <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"> -->
  <!---    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->

  <!-- Ionicons -->
        {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <link href="{{asset("lb-faveo/css/ionicons.min.css")}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->


  <!-- Theme style -->
  <link href="{{asset("lb-faveo/css/AdminLTE.css")}}" rel="stylesheet" type="text/css"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="{{asset("lb-faveo/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css"/>

  <!-- iCheck -->
  <link href="{{asset("lb-faveo/plugins/iCheck/flat/blue.css")}}" rel="stylesheet" type="text/css"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <link href="{{asset("lb-faveo/css/tabby.css")}}" type="text/css" rel="stylesheet">
        <link href="{{asset('css/notification-style.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset("lb-faveo/css/jquerysctipttop.css")}}" rel="stylesheet" type="text/css">
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <link  href="{{asset("lb-faveo/css/editor.css")}}" rel="stylesheet" type="text/css">
  <link href="{{asset("lb-faveo/plugins/filebrowser/plugin.js")}}" rel="stylesheet" type="text/css"/>
  <link type="text/css" href="{{asset("lb-faveo/css/jquery.ui.css")}}" rel="stylesheet">

  <link href="{{asset("lb-faveo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}" rel="stylesheet"
        type="text/css"/>
  <link rel="stylesheet" type="text/css" href="{{asset("lb-faveo/css/faveo-css.css")}}">


  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset("lb-faveo/plugins/select2/select2.min.css")}}">


  <link rel="stylesheet" type="text/css" href="{{asset("lb-faveo/css/notification-style.css")}}">

  <link href="{{ URL::asset('css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css">

  <link href='https://fonts.googleapis.com/css?family=Lato:400,700, 300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="{{ URL::asset('js/vue.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.3.min.js') }}"></script>


  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.css') }}">


  <script type="text/javascript" src="{{ URL::asset('js/bootstrap-paginator.js') }}"></script>

  <link href="{{ URL::asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
  <!---   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->
  <link href="{{ URL::asset('css/dropzone.css') }}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{ asset(elixir('css/app.css')) }}">
  <!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script>-->
  <!---  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.min.js"> -->


  <script src="//js.pusher.com/3.0/pusher.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('js/Chart.min.js') }}"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.1.1/Chart.min.js"></script>-->
  <script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.3.min.js') }}"></script>
  @yield('HeadInclude')

</head>
<body class="skin-blue fixed">
        <div class="wrapper">

<header class="main-header">
                <a href="http://www.faveohelpdesk.com" class="logo"><img src="{{ asset('lb-faveo/media/images/logo.png') }}" width="100px"></a>

    <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="tabs tabs-horizontal nav navbar-nav navbar-left">
        <li @yield('settings')><a href="{!! url('admin') !!}">{!! Lang::get('lang.home') !!}</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

          <li><a href="{{url('staffpanel')}}">staff panel</a></li>

            <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="myFunction()">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="count">count $notifications</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have count($notifications) notifications</li>
              <li>

                <ul class="menu">
                  {{--@foreach($notifications as $notification)
                    @if($notification->type == 'registration')
                      <li>
                        <a href="{!! route('user.show', $notification->model_id) !!}"
                           id="{{$notification->notification_id}}" class='noti_User'>
                          <i class="{!! $notification->icon_class !!}"></i> {!! $notification->message !!}
                        </a>
                      </li>
                    @else
                      <li>
                        <a href="{!! route('ticket.thread', $notification->model_id) !!}"
                           id='{{ $notification->notification_id}}' class='noti_User'>
                          <i class="{!! $notification->icon_class !!}"></i> {!! $notification->message !!}
                        </a>
                      </li>
                    @endif
                  @endforeach--}}

                </ul>
              </li>
              <li class="footer"><a href="/notifications-list">View all</a>
              </li>

            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <img src="#" class="user-image" alt="User Image"/>

                <span class="hidden-xs">first_name last_name</span>

            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background-color:#343F44;">

                <img src="#" class="img-circle" alt="User Image"/>

                <p>
                  first_name last_name - role
                  <small></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer" style="background-color:#1a2226;">
                <div class="pull-left">
                  <a href="/staff-profile" class="btn btn-info btn-sm"><b>{!! Lang::get('lang.profile') !!}</b></a>
                </div>
                <div class="pull-right">
                  <a href="/auth/logout/" class="btn btn-danger btn-sm"><b>{!! Lang::get('lang.sign_out') !!}</b></a>
                </div>
              </li>
            </ul>
          </li>
      </ul>
    </div>

  </nav>
                            </header>
                            <!-- Left side column. contains the logo and sidebar -->
                            <aside class="main-sidebar">
                                <!-- sidebar: style can be found in sidebar.less -->
                                <section class="sidebar">
                                    <div class="user-panel">
                                    <div class = "row">
                                        <div class="col-xs-3"></div>
                                        <div class="col-xs-2" style="width:50%;">
                                        <a href="{!! url('profile') !!}">
                                            <img src="#" class="img-circle" alt="User Image" />
                                        </a>
                                        </div>
                                    </div>
                                        <div class="info" style="text-align:center;">
                                            @if(Auth::user())
                                                <p>{!! Auth::user()->first_name !!}{!! " ". Auth::user()->last_name !!}</p>
                                            @endif
                                            @if(Auth::user() && Auth::user()->active==1)
                                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                            @else
                                                <a href="#"><i class="fa fa-circle"></i> Offline</a>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- search form -->
                                    {{-- <form action="#" method="get" class="sidebar-form"> --}}
                                        {{-- <div class="input-group"> --}}
                                            {{-- <input type="text" name="q" class="form-control" placeholder="Search..."/> --}}
                                            {{-- <span class="input-group-btn"> --}}
                                                {{-- <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button> --}}
                                            {{-- </span> --}}
                                        {{-- </div> --}}
                                    {{-- </form> --}}
                                    <!-- /.search form -->
                                    <!-- sidebar menu: : style can be found in sidebar.less -->
                                    <ul class="sidebar-menu">
                                                            <li class="header">{!! Lang::get('lang.settings-2') !!}</li>
        <li class="treeview @yield('Staffs')">
            <a  href="#">
                <i class="fa fa-users"></i> <span>{!! Lang::get('lang.staffs') !!}</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li @yield('agents')><a href="{{ url('agents') }}"><i class="fa fa-user "></i>{!! Lang::get('lang.agents') !!}</a></li>
                <li @yield('departments')><a href="{{ url('departments') }}"><i class="fa fa-sitemap"></i>{!! Lang::get('lang.departments') !!}</a></li>
                <li @yield('teams')><a href="{{ url('teams') }}"><i class="fa fa-users"></i>{!! Lang::get('lang.teams') !!}</a></li>
                <li @yield('groups')><a href="{{ url('groups') }}"><i class="fa fa-users"></i>{!! Lang::get('lang.groups') !!}</a></li>
            </ul>
        </li>
      
       <li class="treeview @yield('Emails')">
            <a href="#">
                <i class="fa fa-envelope-o"></i>
                <span>{!! Lang::get('lang.email') !!}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li @yield('emails')><a href="{{ url('emails') }}"><i class="fa fa-envelope"></i>{!! Lang::get('lang.emails') !!}</a></li>
                <li @yield('ban')><a href="{{ url('banlist') }}"><i class="fa fa-ban"></i>{!! Lang::get('lang.ban_lists') !!}</a></li>
                 <li @yield('template')><a href="{{ url('list-directories') }}"><i class="fa fa-mail-forward"></i>{!! Lang::get('lang.templates') !!}</a></li>
                <li @yield('diagnostics')><a href="{{ url('getdiagno') }}"><i class="fa fa-plus"></i>{!! Lang::get('lang.diagnostics') !!}</a></li>
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Auto Response</a></li> -->
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Rules/a></li> -->
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Breaklines</a></li> -->
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Log</a></li> -->
            </ul>
        </li>
        
        <li class="treeview @yield('Manage')">
            <a href="#">
                <i class="fa  fa-cubes"></i>
                <span>{!! Lang::get('lang.manage') !!}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li @yield('help')><a href="{{url('helptopic')}}"><i class="fa fa-file-text-o"></i>{!! Lang::get('lang.help_topics') !!}</a></li>
                <li @yield('sla')><a href="{{url('sla')}}"><i class="fa fa-clock-o"></i>{!! Lang::get('lang.sla_plans') !!}</a></li>
                <li @yield('forms')><a href="{{url('forms')}}"><i class="fa fa-file-text"></i>{!! Lang::get('lang.forms') !!}</a></li>
                <li @yield('workflow')><a href="{{url('workflow')}}"><i class="fa fa-sitemap"></i>{!! Lang::get('lang.workflow') !!}</a></li>
            </ul>
        </li>
        
        <li class="treeview @yield('Settings')">
            <a href="#">
                <i class="fa fa-cog"></i>
                <span>{!! Lang::get('lang.system-settings') !!}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li @yield('company')><a href="{{url('getcompany')}}"><i class="fa fa-building"></i>{!! Lang::get('lang.company') !!}</a></li>
                <li @yield('system')><a href="{{url('getsystem')}}"><i class="fa fa-laptop"></i>{!! Lang::get('lang.system') !!}</a></li>
                <li @yield('email')><a href="{{url('getemail')}}"><i class="fa fa-at"></i>{!! Lang::get('lang.email') !!}</a></li>
                <li @yield('tickets')><a href="{{url('getticket')}}"><i class="fa fa-file-text"></i>{!! Lang::get('lang.ticket') !!}</a></li>
                <li @yield('auto-response')><a href="{{url('getresponder')}}"><i class="fa fa-reply-all"></i>{!! Lang::get('lang.auto_response') !!}</a></li>
                <li @yield('alert')><a href="{{url('getalert')}}"><i class="fa fa-bell"></i>{!! Lang::get('lang.alert_notices') !!}</a></li>
                <li @yield('languages')><a href="{{url('languages')}}"><i class="fa fa-language"></i>{!! Lang::get('lang.language') !!}</a></li>
                <li @yield('cron')><a href="{{url('job-scheduler')}}"><i class="fa fa-hourglass"></i>{!! Lang::get('lang.cron') !!}</a></li>
            </ul>
        </li>
        <li class="treeview @yield('Themes')">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>{!! Lang::get('lang.widgets') !!}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li @yield('widget')><a href="{{ url('widgets') }}"><i class="fa fa-list-alt"></i> {!! Lang::get('lang.widgets') !!}</a></li>
                <li @yield('socail')><a href="{{ url('social-buttons') }}"><i class="fa fa-cubes"></i> {!! Lang::get('lang.social') !!}</a></li>
              
            
           
            </ul>
        </li>
        <li class="treeview @yield('Plugins')">
            <a href="{{ url('plugins') }}">
                <i class="fa fa-plug"></i>
                <span>{!! Lang::get('lang.plugin') !!}</span>
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </a>
            <!-- <ul class="treeview-menu">
                <li @yield('plugin')><a href="{{ url('plugins') }}"><i class="fa fa-circle-o"></i>{!! Lang::get('lang.view-all')!!}</a></li>
                <li @yield('a')><a href="#"><i class="fa fa-circle-o"></i>{!! Lang::get('lang.add-new')!!}</a></li>
            
            
           
            </ul> -->
        </li>
        </ul>
    </section>
                                <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="tab-content" style="background-color: white;padding: 0 20px 0 20px">
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <div class="tabs-content">
        <div class="tabs-pane @yield('dashboard-bar')" id="tabA">
          <ul class="nav navbar-nav">
            <li id="bar" @yield(
            'dashboard') ><a href="{{url('dashboard')}}">{!! Lang::get('lang.dashboard') !!}</a></li>
            <li id="bar" @yield(
            'profile') ><a href="{{url('profile')}}">{!! Lang::get('lang.profile') !!}</a></li>
          </ul>
        </div>
        <div class="tabs-pane @yield('user-bar')" id="tabB">
          <ul class="nav navbar-nav">
            <li id="bar" @yield(
            'user')><a href="{{ url('user') }}">{!! Lang::get('lang.user_directory') !!}</a></li></a></li>
            <li id="bar" @yield(
            'organizations')><a href="{{ url('organizations') }}">{!! Lang::get('lang.organizations')
              !!}</a></li></a></li>
          </ul>
        </div>
        <div class="tabs-pane @yield('ticket-bar')" id="tabC">
          <ul class="nav navbar-nav">
            <li id="bar" @yield(
            'open')><a href="{{ url('/ticket/open') }}" id="load-open">{!! Lang::get('lang.open') !!}</a></li>
            <li id="bar" @yield(
            'answered')><a href="{{ url('/ticket/answered') }}" id="load-answered">{!! Lang::get('lang.answered')
              !!}</a></li>
            <li id="bar" @yield(
            'myticket')><a href="{{ url('/ticket/myticket') }}">{!! Lang::get('lang.my_tickets') !!}</a></li>
            {{--
            <li id="bar" @yield(
            'ticket')><a href="{{ url('ticket') }}">Ticket</a></li> --}}
            {{--
            <li id="bar" @yield(
            'overdue')><a href="{{ url('/ticket/overdue') }}">Overdue</a></li> --}}
            <li id="bar" @yield(
            'assigned')><a href="{{ url('/ticket/assigned') }}" id="load-assigned">{!! Lang::get('lang.assigned')
              !!}</a></li>
            <li id="bar" @yield(
            'closed')><a href="{{ url('/ticket/closed') }}">{!! Lang::get('lang.closed') !!}</a></li>
            <?php //if ($group->can_create_ticket == 1) {?>
            <li id="bar" @yield('newticket')><a
                href="{{ url('/newticket') }}">{!! Lang::get('lang.create_ticket') !!}</a></li>
            <?php //} ?>
          </ul>
        </div>
        <div class="tabs-pane @yield('tools-bar')" id="tabD">
          <ul class="nav navbar-nav">
            <li id="bar" @yield('tools')><a
                href="{{ url('/canned/list') }}">{!! Lang::get('lang.canned_response') !!}</a></li>
            <li id="bar" @yield('kb')><a href="{{ url('/comment') }}">{!! Lang::get('lang.knowledge_base') !!}</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <section class="content-header">
    @yield('PageHeader')
    @yield('breadcrumbs')
  </section>
  <!-- Main content -->
  <section class="content">
    @yield('content')
  </section><!-- /.content -->
                                <!-- /.content-wrapper -->
</div>
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> {!! Config::get('app.version') !!}
  </div>
  <strong>{!! Lang::get('lang.copyright') !!} &copy; {!! date('Y') !!} <a href="#" target="_blank">company_name</a>.</strong> {!! Lang::get('lang.all_rights_reserved') !!}
  . {!! Lang::get('lang.powered_by') !!} <a href="http://www.faveohelpdesk.com/" target="_blank">Faveo</a>
</footer>
</div><!-- ./wrapper -->
{{-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<!-- jQuery 2.1.3 -->
<script src="{{asset("lb-faveo/js/ajax-jquery.min.js")}}"></script>

{{-- // <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> --}}

<script src="{{asset("lb-faveo/js/bootstrap-datetimepicker4.7.14.min.js")}}" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{asset("lb-faveo/js/bootstrap.min.js")}}" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="{{asset("lb-faveo/plugins/slimScroll/jquery.slimscroll.min.js")}}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{asset("lb-faveo/plugins/fastclick/fastclick.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("lb-faveo/js/app.min.js")}}" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
{{-- // <script src="{{asset("dist/js/demo.js")}}" type="text/javascript"></script> --}}
  <!-- iCheck -->
<script src="{{asset("lb-faveo/plugins/iCheck/icheck.min.js")}}" type="text/javascript"></script>
{{-- maskinput --}}
{{-- // <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script> --}}
{{-- jquery ui --}}
<script src="{{asset("lb-faveo/js/jquery.ui.js")}}" type="text/javascript"></script>
<script src="{{asset("lb-faveo/plugins/datatables/dataTables.bootstrap.js")}}" type="text/javascript"></script>
<script src="{{asset("lb-faveo/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<!-- Page Script -->
<script src="{{asset("lb-faveo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}" type="text/javascript"></script>
{{-- // <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script> --}}
<script src="{{asset("lb-faveo/js/jquery.dataTables1.10.10.min.js")}}" type="text/javascript"></script>

<script src="{{asset("lb-faveo/plugins/datatables/dataTables.bootstrap.js")}}" type="text/javascript"></script>
<script src="{{asset("lb-faveo/js/jquery.rating.pack.js")}}" type="text/javascript"></script>

<script src="{{asset("lb-faveo/plugins/select2/select2.full.min.js")}}"></script>
<script src="{{asset("lb-faveo/plugins/moment/moment.js")}}"></script>
<script>
  function myFunction() {

    document.getElementById("count").innerHTML = "0";

  }
</script>
<script>
  $(document).ready(function () {

    $('.noti_User').click(function () {
      var id = this.id;
      var dataString = 'id=' + id;
      $.ajax
      ({
        type: "POST",
        url: "{{url('mark-read')}}" + "/" + id,
        data: dataString,
        cache: false,
        success: function (html) {
//$(".city").html(html);
        }
      });
    });

  });
</script>
<script>
  $(function () {
    // Enable iCheck plugin for checkboxes
    // iCheck for checkbox and radio inputs
    // $('input[type="checkbox"]').iCheck({
    // checkboxClass: 'icheckbox_flat-blue',
    // radioClass: 'iradio_flat-blue'
    // });
    // Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $("input[type='checkbox']", ".mailbox-messages").iCheck("uncheck");
      } else {
        //Check all checkboxes
        $("input[type='checkbox']", ".mailbox-messages").iCheck("check");
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");
      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }
      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
<script type="text/javascript">
  //     $(document).ready(function() {
  //         $("#content").Editor();
  //     });
  // </script>
<!-- // <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script> -->
<script src="{{asset("lb-faveo/js/tabby.js")}}"></script>
<!-- // <script src="{{asset("dist/js/editor.js")}}"></script> -->
<!-- CK Editor -->
<!-- // <script src="{{asset("//cdn.ckeditor.com/4.4.3/standard/ckeditor.js")}}"></script> -->
{{-- // <script src="{{asset("lb-faveo/downloads/CKEditor.js")}}"></script> --}}
<script src="{{asset("lb-faveo/plugins/filebrowser/plugin.js")}}"></script>
<script src="{{asset("lb-faveo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"
        type="text/javascript"></script>
<script>
  // $(function () {
  // //Add text editor
  // $("textarea").wysihtml5();
  // });
</script>
<script type="text/javascript">
  $.ajaxSetup({
    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
  });
</script>
@yield('FooterInclude')
</body>
</html>