@if ( ! Request::ajax())<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>USM / @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Purwandi">

    @section('metadata')
        {{ HTML::style('css/bootstrap.css') }}
        {{-- HTML::style('css/bootstrap-responsive.css') --}}
        {{ HTML::style('css/datepicker.css') }}
        {{ HTML::style('css/global.css') }}

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    @yield_section
    

    <script>
        var URL = '{{ URL::base() }}',
            CSRF_TOKEN = '{{ Session::token() }}';
    </script>
</head>
<body>
    @include('layouts.header')

    <div class="container">

        @if(isset($error))
            <div class="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                @if(is_array($error))
                    @foreach($error as $e)
                        {{ $e  }} <br />
                    @endforeach
                @else
                    {{ $error }}
                @endif
                
            </div>
        @elseif(isset($success))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ $success }}
            </div>
        @endif

        @yield('content')

        @include('layouts.footer')

    </div>
    
    @section('js')
        {{ HTML::script('js/jquery.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/bootstrap-datepicker.js') }}
        <script>
            $(document).ready(function(){
                $('input[type=date]').datepicker({
                    format: 'yyyy-mm-dd'
                });
            })
        </script>
    @yield_section

</body>
</html>
@else
    @yield('content')
@endif