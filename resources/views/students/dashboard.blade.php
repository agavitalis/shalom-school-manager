@extends('layouts.main')

@section('header')
@include('partials.students.header')
@endsection

@section('body')
<!--Body goes here-->
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Student's Dashboard</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
					<div class="clearfix"></div>
          	</div>
     
<!--welcome message starts -->
        <div class="row">
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
                    <div class="jumbotron">
                      <h1>Hello, Vitalis!</h1>
                      <p>Good evening, Welcome to the University of Nigeria Portal,How was your Day.</p>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
 
         </div>
        <div class="clearfix"></div>

        <!-- /page content -->
@endsection

@section('footer')
  @include("partials.students.footer") 
@endsection