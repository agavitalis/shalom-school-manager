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
                <h3>Subject taught in the school</h3>
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
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Some registered subject in the school </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>These are the registered subjects</p>

                    <!-- start project list -->
                    <table class=" table table-striped table-bordered projects dt-responsive nowrap"   cellspacing="0" width="100%" >
                      <thead>
                        <tr>
                        <th>Subject</th> 
                        <th>Subject Abbreviation</th>
                          <th style="width: 20%">#Delete</th>  
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($subjects as $subject )   
                       <tr>
                         <td>
                           <a>{{$subject->name}}</a>
                          </td>
                          <td>
                           <a>{{$subject->abbreviation}}</a>
                          </td>
                      
                            <td>
                              <form  action="/admin/subject" method="post">
                                   {{csrf_field()}}
                                  <input type="hidden" name="action" value="delete">
                                  <input type="hidden" name="id" value ="{{$subject->id}}">
                                  <input type="submit" class="btn btn-danger btn-xs" value="Delete ">
                               </form>
                           
                          </td>
                         
                          
                        </tr> 
                        @endforeach
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>

               <div class="col-md-6 col-xs-12">
                    <div class="x_panel">
                    <div class="x_title">
                        <h2>Register <small>new subject here(Eg:Mathematics)</small></h2>
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
                        <form class="form-horizontal form-label-left input_mask" action="/admin/subject" method="post">
                            {{csrf_field()}}
                        <input type="hidden" name="action" value="register">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Register a new Subject <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="subject" placeholder="Eg: English Language">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject Abbreviation <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="abb" placeholder="Eg: ENG">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Register Subject</button>
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