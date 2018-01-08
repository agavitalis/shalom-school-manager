@extends('layouts.main')

@section('header')
@include('partials.teachers.header')
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
              <div class="col-md-12">
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

                    <p>These are your subjects for the term</p>

                    <!-- start project list -->
                    <table class=" table table-striped table-bordered projects table-responsive"   cellspacing="0" width="100%" >
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th>Subject Name</th>
                          <th>Teacher Name</th>
                          <th>Session</th>
                          <th>Level</th>
                          <th>Term</th>
                          <th>Class</th>
                          <th>Are you the Coordinator?</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        
                      @foreach($mysubjects as $mysubject)
                        <tr>
                          <td>#</td>
                          <td>
                            <a>{{$mysubject->name}}</a>
                          </td>
                          <td>
                            <a>{{$mysubject->teacher_name}}</a>
                          </td>
                          <td>
                            <a>{{$mysubject->session}}</a>
                          </td>
                          <td>
                            <a>{{$mysubject->level}}</a>
                          </td>
                           <td>
                            <a>{{$mysubject->term}}</a>
                          </td>
                           <td>
                            <a>{{$mysubject->class}}</a>
                          </td>
                           <td>
                            <a>{{$mysubject->is_coordinator}}</a>
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
  @include('partials.teachers.footer')
@endsection


@section('scripts')
    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../js/nprogress.js"></script>
    <!--smartwizard for forms-->
    <script src="../js/jquery.smartWizard.js"></script>
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHear.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>


  </body>
</html>
@endsection