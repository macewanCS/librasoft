<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EPL Management System</title>

    <!-- JQuery -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- Twitter bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    <!-- /Twitter bootstrap -->

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- local styles -->
    <link href="/css/app.css" rel="stylesheet">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
            <!-- Add jQuery library -->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/sorttable.js') }}"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/popUpWindow.js')}}"></script>

    <!-- Add x-editable -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <!-- Select 2 -->
    <link href="http://fk.github.io/select2-bootstrap-css/css/select2-bootstrap.css" rel="stylesheet"/>
    <link href="http://select2.github.io/select2/select2-3.5.2/select2.css" rel="stylesheet"/>
    <link href="http://fk.github.io/select2-bootstrap-css/css/bootstrap.min.css"/>
    <script src="http://select2.github.io/select2/select2-3.4.2/select2.js"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    

    <style>
        body {
            font-family: 'Lato';
            background: lightgray;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <div class="non-footer-wrapper">
        <nav class="navbar navbar-default layout-navbar">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset("/img/DesktopLogo_190x70.png")}}" alt="EPL Logo">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-listing">
                        <li class="navbar-item navbar-spacing"><a @if($_SERVER['REQUEST_URI'] == "/") class="active-navbar-element" @endif href="{{ url('/') }}">Dashboard</a></li>
                        <li class="navbar-item"><a @if($_SERVER['REQUEST_URI'] == "/plan") class="active-navbar-element" @endif  href="{{ url('/plan') }}">Plan</a></li>
                        @permission('view.mywork')<li class="navbar-item"><a @if($_SERVER['REQUEST_URI'] == "/mywork") class="active-navbar-element" @endif href="{{ url('/mywork') }}">My Work</a></li>@endpermission
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right navbar-listing">
                        <!-- Search -->
                        <li class="search-bar">
                            <form method="POST" action="/search">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="term">
                                    <span class="input-group-btn">
                                        <button id="search-go" type="submit" class="btn btn-default" href="/search">Go</button>
                                    </span>
                                </div>
                            </form>
                        </li>

                        @permission('view.mywork')<li><a href="{{ url('/register') }}">Add User</a></li>@endpermission
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>

                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a role="button" onclick="showDetails()"><i class="fa fa-btn"></i>My Info</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>



        @yield('content')
        @yield('scripts')

        <div class="push"></div>
    </div>

    <!--user popup -->
    <div class="hide fade">
        <div id="user"  title="My Information" class="panel panel-primary">
            <div class="panel-body overflow-y: scroll" >
                @if(Auth::guest())

                @else
                <?php
                    $id = Auth::user();
                ?>
                <section class="mw-section">
                    <div class="mw-div-one">
                        <img src="{{asset("/img/defaultUser.png")}}" alt="User Pic">
                    </div>
                    <div class="mw-div-two">
                        <h3>{{$id->name}}</h3>
                        Email: {{$id->email}} <br> Department: {{$id->department}} <br> Permission: {{$id->permission}}
                    </div>
                </section>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="well well-sm footer">
        <ul id="footer-list" class="list-inline">
            <li><a href="http://www.epl.ca/">Edmonton Public Library</a></li>
            <li><a href="https://epl.bibliocommons.com/info/terms">Terms of Use</a></li>
            <li><a href="https://epl.bibliocommons.com/info/privacy">Privacy Statement</a></li>
            <li>&copy; 2016 Edmonton Public Library</li>
        </ul>
    </div>
</body>
</html>


