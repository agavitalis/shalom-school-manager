@extends('layouts.main')

@section('header')
@include('partials.students.header')
@endsection


@section('body')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Your Subjects</h3>
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
              <div class="col col-md-8 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Yours Subjects</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>These are your subjects for the session</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 30%">Subject Name</th>
                          <th style="width: 20%">Level</th>
                          <th style="width: 20%">Approved</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($mysubjects as $mysubject )   
                       <tr>
                          <td>#</td>
                          <td>
                            <a>{{$mysubject->name}}</a>
                          </td>
                           <td>
                            <a>{{$mysubject->level}}</a>
                          </td>
                          
                          <td>
                            <i class="fa fa-check-square-o "></i>
                          </td>
                      
                        </tr>
                      @endforeach 
                       
                       
                        
                       
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

      @endsection


@section('footer')
  @include("partials.students.footer") 
@endsection