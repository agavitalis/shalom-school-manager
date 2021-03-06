@extends('layouts.main')

@section('header')
@include('partials.admin.header')
@endsection


@section('body')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View and Print Students List here</h3>
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
              
            
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Complete list of all your students</h2>
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
                    <p class="text-muted font-13 m-b-30">
                      Here are Student registered on this system.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered  dt-responsive nowrap" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                        <th>Student Name</th> 
                        <th>Reg No</th>
                        <th>Current Level</th> 
                        <th>Current Class</th>
                         <th>Current Session</th> 
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($users as $user )   
                       <tr>
                         <td>
                           <a>{{$user->name}}</a>
                          </td>
                          <td>
                           <a>{{$user->username}}</a>
                          </td>
                          <td>
                           <a>{{$user->level}}</a>
                          </td>
                          <td>
                           <a>{{$user->class}}</a>
                          </td>
                          <td>
                           <a>{{$user->session}}</a>
                          </td>
                           
                         
                          
                        </tr> 
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

               <div class="col-md-4 col-xs-12">


                    <div class="x_panel">
                    <div class="x_title">
                        <h2>Show <small>Students based on Level</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                       
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left input_mask" action="/admin/printstudents" method="post">
                            {{csrf_field()}}
                        <input type="hidden" name="action" value="level">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Level<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="level">
                                <option disabled ="" selected ="">Select level</option>
                                @foreach($levels as $level)
                                <option value = "{{$level->name}}">{{$level->name}}</option>

                                @endforeach
                            </select>
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Show Students</button>
                            </div>
                        </div>

                        </form>
                    </div>
                    </div>

                    <div class="x_panel">
                    <div class="x_title">
                        <h2>Select <small>Class to View Student in that class</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                       
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left input_mask" action="/admin/printstudents" method="post">
                            {{csrf_field()}}
                        <input type="hidden" name="action" value="klass">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Class<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="klass">
                                <option disabled ="" selected ="">Select Class</option>
                                @foreach($klasses as $klass)
                                <option value = "{{$klass->name}}">{{$klass->name}}</option>

                                @endforeach
                            </select>
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Show Students</button>
                            </div>
                        </div>

                        </form>
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
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHear.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('js/custom.js')}}"></script>

  </body>
</html>
@endsection