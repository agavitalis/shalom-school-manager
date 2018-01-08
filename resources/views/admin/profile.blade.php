@extends('layouts.main')

@section('header')
@include('partials.admin.header')
@endsection


@section('body')
<!--Body goes here-->
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Admin Profile</h3>
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




            
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Your Profile </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                      <div class="col-md-4" >
                     
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="../images/picture.jpg" alt="Avatar" title="Change the avatar">
                        </div>
                        
                      </div>

                      <div class="col-md-4 text-center">
                            <div class="media-body profile-detail">
                             
                              <p><strong>Name:&nbsp&nbsp</strong>{{Auth::user()->name}} </p>
                              <p><strong>Registration Number:&nbsp&nbsp</strong>{{Auth::user()->username}} </p>
                              <p><strong>Email Addres:&nbsp&nbsp</strong>{{Auth::user()->email}} </p>
                              <p><strong>Phone Number:&nbsp&nbsp</strong>{{Auth::user()->phone}} </p>
                              <p><strong>Gender:&nbsp&nbsp</strong>{{Auth::user()->gender}} </p>
                              
                            </div>
   
                      </div>

                      <div class="col-md-4">
                        
                        <div id="crop-avatar" class="pull-right">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="../images/picture.jpg" alt="Avatar" title="Profile Picture">
                        </div>
                        
                        
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Background <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                       
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-calendar"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Date of Birth:</a>
                        <p>{{Auth::user()->dateofbirth}}</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-globe"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Nationality:</a>
                        <p>{{Auth::user()->country}}</p>
                      </div>
                    </article>
                   <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-bullseye"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">State of Origin:</a>
                        <p>{{Auth::user()->state}}</p>
                      </div>
                    </article>
                   <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-fax"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Local Government:</a>
                        <p>{{Auth::user()->lga}}</p>
                      </div>
                    </article>
                   <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-home"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Residential Address:</a>
                        <p>{{Auth::user()->address}}</p>
                      </div>
                    </article>
                   
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Academic <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                       
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-pencil-square"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Year of Registration:</a>
                        <p>{{Auth::user()->created_at}}</p>
                      </div>
                    </article>
                   <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-database"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Current Session</a>
                        <p>{{Auth::user()->session}}</p>
                      </div>
                    </article>
                   <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-signal"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Current Level</a>
                        <p>{{Auth::user()->level}}</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-retweet"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Current Class</a>
                        <p>{{Auth::user()->class}}</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-flash"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Current Term</a>
                        <p>{{Auth::user()->term}}</p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Other  <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                       
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-gears"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#"> My Skills:</a>
                        <p>{{Auth::user()->skills}}</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-star"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Areas of Interest:</a>
                        <p>{{Auth::user()->intrest}}</p>
                      </div>
                    </article>
                   <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-thumbs-up"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Best Quotes:</a>
                        <p>{{Auth::user()->quotes}}</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="day"><i class="fa fa-suitcase"></i></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Positions Held:</a>
                        <p>{{Auth::user()->postsheld}}</p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>



            
          </div>
        </div>
        <!-- /page content -->
        
@endsection


@section('footer')
  @include("partials.admin.footer") 
@endsection