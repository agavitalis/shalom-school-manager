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
                    <h3>Create Fees</h3>
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

                <div class="col-md-2">
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create <small>fees here</small></h2>
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
                            <form class="form-horizontal form-label-left input_mask" action="/admin/class" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="action" value="register">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Fee Name<span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input class="date-picker form-control col-md-7 col-xs-12" required="required"
                                            type="text" name="feeName" placeholder="Whats the name of this Fee">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount<span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input class="date-picker form-control col-md-7 col-xs-12" required="required"
                                            type="number" name="amount" placeholder="Amount">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Session<span
                                            class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <select class="form-control" required="" name="session">
                                            <option disabled="" selected="">Select Session</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->name }}">{{ $session->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Level<span
                                            class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <select class="form-control" required="" name="session">
                                            <option disabled="" selected="">Select Level</option>
                                            <option value="all">All Levels</option>
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->name }}">{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Term<span
                                          class="required">*</span></label>
                                  <div class="col-md-9 col-sm-6 col-xs-12">
                                      <select class="form-control" required="" name="session">
                                          <option disabled="" selected="">Select Term</option>
                                          <option value="all">All Terms</option>
                                          <option value="1">First Terms</option>
                                          <option value="2">Second Terms</option>
                                          <option value="3">Third Terms</option>
                                
                                      </select>
                                  </div>
                              </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Classes<span
                                            class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <select class="form-control" required="" name="session">
                                            <option disabled="" selected="">Select Class</option>
                                            <option value="all">All Classes</option>
                                            @foreach ($klasses as $class)
                                                <option value="{{ $class->name }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Register Fee</button>
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
