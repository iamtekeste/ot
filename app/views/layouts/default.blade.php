<html>

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
  {{ HTML::script('js/jquery.min.js') }}
  {{ HTML::style('css/bootstrap.min.css') }}
  {{ HTML::style('css/bootstrap-timepicker.min.css') }}
  {{ HTML::style('css/signin.css') }}
  {{ HTML::style('css/bootstrap-theme.min.css') }}
  {{ HTML::script('js/bootstrap.min.js') }}
  {{ HTML::script('js/bootstrap-timepicker.min.js') }}

  <title>Ot Keeper!</title>
</head>
    <body>
        @if(Session::get('flash_msg'))

          <div class="flash">
            {{Session::get('flash_msg')}}
          </div>

        @endif
        <div class="container">
            @yield('content')
        </div>
<script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
    </body>
</html>