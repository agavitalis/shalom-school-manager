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
           <h3>Upload your result</h3>
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
                 <h2>Results sheet sample </h2>
                 <ul class="nav navbar-right panel_toolbox">
                   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                   </li>
                   
                   <li><a class="close-link"><i class="fa fa-close"></i></a>
                   </li>
                 </ul>
                 <div class="clearfix"></div>
               </div>
               <div class="x_content">             
                  <hr>                 
                  <div class="container">   
                  <div class="panel panel-primary">
                  <div class="panel-body">

                      @if ($message = Session::get('success'))
                      <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                      </div>
                    @endif

                    @if ($message = Session::get('error'))
                      <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                      </div>
                    @endif

            

                      
                      <h3>Download a result sheet sample:</h3>
                      <div style="border: 1px solid #a1a1a1;margin-top: 15px;padding: 20px; text-align:center">     
                        <a href="{{ url('resultsheet/xls') }}"><button class="btn btn-success btn-lg">Download Excel xls</button></a>
                      <a href="{{ url('resultsheet/xlsx') }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>
                      <a href="{{ url('resultsheet/csv') }}"><button class="btn btn-success btn-lg">Download CSV</button></a>
                      </div>

                  </div>
                  </div>
                  </div>

                </div>
              </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
             <div class="x_panel">
               <div class="x_title">
                  <h2>Only Subject coordinators can upload Results</h2>
                   <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                   </ul>
                  <div class="clearfix"></div>
               </div>
                  <div class="x_content">             
                  <hr>                 
                  <div class="container">   
                  <div class="panel panel-primary">
                  <div class="panel-body">

                      @if ($message = Session::get('success'))
                      <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                      </div>
                    @endif

                    @if ($message = Session::get('error'))
                      <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                      </div>
                    @endif

                    <h3>Upload Compiled Results</h3>
                    <form style="border: 1px solid #a1a1a1;margin-top: 15px;padding: 20px; text-align:center"
                    action="{{ URL::to('tutor/uploadresults') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

                            
                            {{ csrf_field() }}
                            <br/>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select File<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                               <input type="file" name="import_file" />
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Subject<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="subject">
                                <option disabled ="" selected ="">Select Subject</option>
                                @foreach($subjects as $subject)
                                <option value = "{{$subject->name}}">{{$subject->name ." ".$subject->level }}</option>

                                @endforeach
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Class<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="klass">
                                <option disabled ="" selected ="">Select Class</option>
                                @foreach($klasses as $klass)
                                <option value = "{{$klass->name}}">{{$klass->name}}</option>

                                @endforeach
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Term<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="term">
                                <option disabled ="" selected ="">Select Term</option>
                                @foreach($terms as $term)
                                <option value = "{{$term->name}}">{{$term->name}}</option>

                                @endforeach
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Session<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="session">
                                <option disabled ="" selected ="">Select Session</option>
                                @foreach($sessions as $session)
                                <option value = "{{$session->name}}">{{$session->name}}</option>

                                @endforeach
                            </select>
                            </div>
                            </div>

                            <button class="btn btn-primary">Upload Results to Database</button>

                        </div>
                           

                    </form>
                    

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