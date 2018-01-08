<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School Portal |Check Water </title>

     <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
     <link href="{{asset('css/custom.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
     
            <div class="row">
                <!-- Current avatar -->
                <div class="col col-md-12 col-sm-12 col-xs-12">
                <img class="img-responsive login-img " src="../images/picture.jpg" alt="Avatar" title="Change the avatar">
                </div>
            </div>

      <div class="login_wrapper">

        
        <div class="animate form login_form  col-md-12 col-sm-12 col-xs-12">
          <section class="login_content">
            <form class="form-horizontal" method="POST" action="{{ route('studentresults') }}">
                {{ csrf_field() }}
              <h1>Check your Results</h1>
              <div>
                <input id="pin" type="text" placeholder="PIN" class="form-control" name="pin" value="{{ old('pin') }}" required autofocus>

                    @if ($errors->has('pin'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pin') }}</strong>
                        </span>
                    @endif
              </div>
             
               <div>
                    <select class="sel-check form-control" required name="session">
                        <option disabled ="" selected ="">Select Session</option>
                        @foreach($sessions as $session)
                        <option value = "{{$session->name}}">{{$session->name}}</option>

                        @endforeach
                    </select>
              </div>
               <div>
                    <select class="sel-check form-control" required name="term">
                        <option disabled ="" selected ="">Select Term</option>
                        @foreach($terms as $term)
                        <option value = "{{$term->name}}">{{$term->name}}</option>

                        @endforeach
                    </select>
                </div>
                 @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong> {{ Session::get('error') }}</strong>
                    </div>
                @endif
              
                <div>
                                
                    <button type="submit" class="btn btn-primary">
                        Show My Results
                    </button>
                    <a class="reset_pass" href="{{ route('students.dashboard') }}">
                    Back to Home
                    </a>
               </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                 <div>
                  <h1><i class="fa fa-graduation-cap"></i> School Portal</h1>
                  <p>©<?php echo date('Y'); ?> All Rights Reserved. Powered by Oasis Professional Services.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
            <script src="../js/jquery.min.js"></script>
            <!-- Bootstrap -->
            <script src="../js/bootstrap.min.js"></script>
                
      </div>
    </div>
  </body>
</html>
