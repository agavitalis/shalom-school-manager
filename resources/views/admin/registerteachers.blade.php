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
                <h3>Register New Teacher(s)</h3>
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

              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Enter Teacher's Details: <small>fill the (current and correct) details to register</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                    <form  method="post" action="/admin/registerteachers" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-xs-12">
                          <input type="text" id="name" name='name' required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="regno">Registration Number <span class="required">*</span>
                        </label>
                        <div class="col-md-8  col-xs-12">
                          <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Session<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <select class="form-control" required="" name="session">
                            <option disabled ="" selected ="">Select session</option>
                            @foreach($sessions as $session)
                            <option value = "{{$session->name}}">{{$session->name}}</option>

                            @endforeach
                          </select>
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-8  col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
              
                      <div class="form-group">
                        <div class="col-md-8  col-xs-12 col-md-offset-3">
                        <hr>
                          <button type="submit" class="btn btn-success">Register Teacher</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          
                        </div>
                      </div>

                    </form>

                  </div>        
                </div>
              </div>


               <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Teacher Details <small>upload students list as an excel file</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                                   
                    <div class="container">   
                      <div class="panel panel-primary">
                        <div class="panel-body">
                           <h3>Download sample Excel file to register teachers:</h3>
                            <div style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 20px;">     
                              <a href="{{ url('downloadTeacher/xls') }}"><button class="btn btn-info ">Download Excel xls</button></a>
                            <a href="{{ url('downloadTeacher/xlsx') }}"><button class="btn btn-info ">Download Excel xlsx</button></a>
                            <a href="{{ url('downloadTeacher/csv') }}"><button class="btn btn-info ">Download CSV</button></a>
                            </div>

                          <h3>Upload Excel File:</h3>
                          <form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 20px;"
                           action="{{ URL::to('importStudent') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <input class= 'btn btn-success'type="file" name="import_file" />
                                
                                  <br/>

                                  <button class="btn btn-primary">Upload Teacher List to Database</button>

                          </form>
                          <br/>

                      
                        </div>
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