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
                    <h3>Manage Fees Here</h3>
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
                            <h2>Students Fees Management </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <form action="/admin/givestudentsclasses" method="post">
                            {{ csrf_field() }}
                            <div class="x_content">

                                <p>Allocate new classes to these students</p>

                                <!-- start project list -->
                                <table id="datatable" class="table table-striped table-bordered  dt-responsive nowrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Fee Name</th>
                                            <th>Amount</th>
                                            <th>Session</th>
                                            <th>Level</th>
                                            <th>Term</th>
                                            <th>Classes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($fees as $fee)
                                            <tr>
                                                <td>
                                                    <a>{{ $user->name }}</a>
                                                </td>
                                                <td>
                                                    <a>{{ $user->username }}</a>
                                                </td>
                                                <td>
                                                    <a>{{ $user->level }}</a>
                                                </td>
                                                <td>
                                                    <a>{{ $user->class }}</a>
                                                </td>
                                               
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                                <!-- end project list -->
                               
                            </div>
                        </form>
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
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHear.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.js') }}"></script>

    </body>

    </html>
@endsection
