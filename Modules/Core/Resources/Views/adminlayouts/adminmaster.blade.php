<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Flarepoint CRM</title>

  <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ URL::asset('css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css">

  <link href='https://fonts.googleapis.com/css?family=Lato:400,700, 300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="{{ URL::asset('js/vue.min.js') }}"></script>
  <!--- <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.min.js"></script> -->
  <script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.3.min.js') }}"></script>


  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.css') }}">

  <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!---    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->

  <script type="text/javascript" src="{{ URL::asset('js/bootstrap-paginator.js') }}"></script>

  <link href="{{ URL::asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
  <!---   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->
  <link href="{{ URL::asset('css/dropzone.css') }}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{ asset(elixir('css/app.css')) }}">
  <!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script>-->
  <!---  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.min.js"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <script src="//js.pusher.com/3.0/pusher.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('js/Chart.min.js') }}"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.1.1/Chart.min.js"></script>-->
  <script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.3.min.js') }}"></script>


</head>
<body>
<div id="wrapper">
  <div class="navbar navbar-default navbar-top">
    <!--NOTIFICATIONS START-->
    <div class="dropdown">
      <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
        <i class="glyphicon glyphicon-bell"><span id="notifycount"></span></i>
      </a>

      <ul class="dropdown-menu notify-drop  notifications" role="menu" aria-labelledby="dLabel">

        <div class="notification-heading"><h4 class="menu-title">Notifications</h4><h4 class="menu-title pull-right"><a
              href="notifications/markall">Mark all as read</a><i class="glyphicon glyphicon-circle-arrow-right"></i>
          </h4>
        </div>
        <li class="divider"></li>
        <div class="notifications-wrapper">

          <span id="notification-item"></span>

          <script>
            function postRead(id) {

              $.ajax({
                type: 'post',
                url: 'notifications/markread',
                data: {Id: id}
              });


            }
            $(function () {


              $.get('{{url('/notifications/getall')}}', function (notifications) {
                var obj = $.parseJSON(notifications);
                var notifyItem = document.getElementById('notification-item');
                var bell = document.getElementById('notifycount');
                var msg = "";
                var count = 0;
                $.each(obj, function (index, notification) {
                  count++;
                  var id = notification['id'];
                  var url = notification['url'];

                  msg += `<div>
        <a class="content" onclick="postRead(` + id + `)" href="` + url + `">
        `
                    + notification['text'] +
                    ` </a></div>
        <hr class="notify-line"/>`;
                  notifyItem.innerHTML = msg;
                });
                bell.innerHTML = count;
              })

            });


          </script>

        </div>

      </ul>
      </a>
    </div>
    <!--NOTIFICATIONS END-->
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- /#sidebar-wrapper
      <!-- Sidebar menu -->

  <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">

    <div class="list-group panel">

      <p class=" list-group-item" title=""><img src="{{url('images/flarepoint_logo.png')}}" alt=""></p>


      <a href="{{route('dashboard', \Auth::id())}}" class=" list-group-item" data-parent="#MainMenu"><i
          class="glyphicon glyphicon-dashboard"></i> Dashboard </a>
      <a href="{{route('staff.show', \Auth::id())}}" class=" list-group-item" data-parent="#MainMenu"><i
          class="glyphicon glyphicon-user"></i> Profile </a>


      <a href="#relations" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
          class="glyphicon glyphicon-tag"></i> Relations </a>
      <div class="collapse" id="relations">

        <a href="{{ route('admin.relations.relations.index')}}" class="list-group-item childlist">All Relations</a>
        @if(Entrust::can('relation-create'))
          <a href="{{ route('relations.create')}}" class="list-group-item childlist">New Relation</a>
        @endif
      </div>

      <a href="#tickets" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
          class="glyphicon glyphicon-tickets"></i> Tickets </a>
      <div class="collapse" id="tickets">
        <a href="{{ route('tickets.index')}}" class="list-group-item childlist">All Tickets</a>
        @if(Entrust::can('ticket-create'))
          <a href="{{ route('tickets.create')}}" class="list-group-item childlist">New Ticket</a>
        @endif
      </div>

      <a href="#user" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
          class="fa fa-users"></i> Users </a>
      <div class="collapse" id="user">
        <a href="{{ route('users.index')}}" class="list-group-item childlist">All Users</a>
        @if(Entrust::can('user-create'))
          <a href="{{ route('users.create')}}" class="list-group-item childlist">New User</a>
        @endif
      </div>

      <a href="#leads" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
          class="glyphicon glyphicon-hourglass"></i> Leads </a>
      <div class="collapse" id="leads">
        <a href="adminpanel/leads" class="list-group-item childlist">All Leads</a>
        @if(Entrust::can('lead-create'))
          <a href="adminpanel/lead/create" class="list-group-item childlist">New Lead</a>
        @endif
      </div>
      <a href="#departments" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
          class="fa fa-object-group"></i> Departments</a>
      <div class="collapse" id="departments">
        <a href="{{ route('departments.index')}}" class="list-group-item childlist">All Departments</a>
        @if(Entrust::hasRole('administrator'))
          <a href="{{ route('departments.create')}}" class="list-group-item childlist">New Department</a>
        @endif
      </div>

      @if(Entrust::hasRole('administrator'))
        <a href="#settings" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
            class="glyphicon glyphicon-cog"></i> Settings </a>
        <div class="collapse" id="settings">
          <a href="#" class="list-group-item childlist">Overall Settings</a>

          <a href="#" class="list-group-item childlist">Role Managment</a>
          <a href="#" class="list-group-item childlist">Integrations</a>
        </div>


      @endif
      <a href="{{ url('/auth/logout') }}" class=" list-group-item impmenu" data-parent="#MainMenu"><i
          class="glyphicon glyphicon-log-out"></i> Sign out </a>

    </div>


  </nav>


  <!-- Page Content -->
  <div id="page-content-wrapper">



    @if($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>

    @endif
    @if(Session::has('flash_message_warning'))
      <div class="notification-warning navbar-fixed-bottom ">
        <div class="notification-icon ion-close-circled"></div>
        <div class="notification-text">
          <span>{{ Session::get('flash_message_warning') }} </span></div>
      </div>
    @endif
    @if(Session::has('flash_message'))
      <div class="notification-success navbar-fixed-bottom ">
        <div class="notification-icon ion-checkmark-round"></div>
        <div class="notification-text">
          <span>{{ Session::get('flash_message') }} </span></div>
      </div>
    @endif






    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1>@yield('heading')</h1>
          @yield('content')


        </div>

      </div>
    </div>
  </div>
</div>

<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap Core JavaScript -->


<script type="text/javascript" src="{{ URL::asset('js/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('js/semantic.min.js') }}"></script>


<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/sorttable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jasny-bootstrap.min.js') }}"></script>

@stack('scripts')
</body>

</html>
  