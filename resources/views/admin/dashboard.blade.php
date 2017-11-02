@extends('layouts.main')

@section('header')
@include('partials.admin.header')
@endsection

@section('body')
<!--Body goes here-->
      
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-group"></i></div>
                  <div class="count">{{$students}}</div>
                  <h3>My Students</h3>
                  <p>Number of Students registered on board.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                  <div class="count">{{$teachers}}</div>
                  <h3>My Teachers</h3>
                  <p>No of teachers registered on board.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-pencil-square"></i></div>
                  <div class="count">{{$subjects}}</div>
                  <h3>Our Subjects</h3>
                  <p>Total Number of subject we teach.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-home"></i></div>
                  <div class="count">{{$classes}}</div>
                  <h3>Classes</h3>
                  <p>Total Number of Classes registered.</p>
                </div>
              </div>
            </div>




        <div class="row">
             <!--welcome message starts -->
          <div class="col-md-8 col-md-offset-2 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                 <!-- <h2>Daily active users <small>Sessions</small></h2>-->
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron welcome">
                      <h1>Hello, {{Auth::user()->name}}!</h1>
                      <p>Welcome to your School Portal,We are glad to have you back.</p>
                    </div>
                  </div>

                </div>

              </div>
            </div>   
          </div>


          </div>
        </div>






        <!-- /page content -->

     

@endsection


@section('footer')
  @include('partials.admin.footer')
@endsection



@section('scripts')
<!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>
@endsection