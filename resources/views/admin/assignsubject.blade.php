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
                <h3>Assign Subjects</h3>
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
                    <h2>These teachers where assigned these subjects</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Teachers and Subjects assigned (a subject can be assigned to many teachers)</p>

                    <!-- start project list -->
                    <table class=" table table-striped table-bordered projects dt-responsive nowrap"   cellspacing="0" width="100%" >
                      <thead>
                        <tr>
                          <th>Session</th>
                          <th>Level</th>
                          <th>Term</th>
                          <th>Class</th>
                           
                        <th>Teacher's Name</th>
                        
                        <th>Subject Assigned</th>
                        <th>Is Coordinator</th>
                         <th>Delete and Unassign</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($assignedsubjects as $assignedsubject )   
                       <tr>
                         <td>
                           <a>{{$assignedsubject->session}}</a>
                         </td>
                         <td>
                           <a>{{$assignedsubject->level}}</a>
                         </td>
                         <td>
                           <a>{{$assignedsubject->term}}</a>
                         </td>
                         <td>
                           <a>{{$assignedsubject->class}}</a>
                         </td>
                         <td>
                           <a>{{$assignedsubject->teacher_name}}</a>
                         </td>
                        
                         <td>
                           <a>{{$assignedsubject->name}}</a>
                         </td>
                          <td>
                           <a>{{$assignedsubject->is_coordinator}}</a>
                         </td>
                         <td>
                              <form  action="/admin/assignsubject" method="post">
                                   {{csrf_field()}}
                                  <input type="hidden" name="action" value="delete">
                                  <input type="hidden" name="id" value ="{{$assignedsubject->id}}">
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

               <div class="col-md-8 col-xs-12 col-md-offset-2">
                 

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Assign Subjects <small>(only coordinators can upload results)</small></h2>
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
                        <form class="form-horizontal form-label-left input_mask" action="/admin/assignsubject" method="post">
                            {{csrf_field()}}
                        <input type="hidden" name="action" value="assign">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Teacher<span class="required">*</span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="teacher">
                              <option disabled ="" selected ="">Select Teacher</option>
                              @foreach($teachers as $teacher)
                              <option value = "{{$teacher->name}}">{{$teacher->name}}</option>

                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Session<span class="required">*</span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required name="session">
                              <option disabled ="" selected ="">Select Session</option>
                              @foreach($sessions as $session)
                              <option value = "{{$session->name}}">{{$session->name}}</option>

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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Level<span class="required">*</span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="level">
                              <option disabled ="" selected ="">Select Level</option>
                              @foreach($levels as $level)
                              <option value = "{{$level->name}}">{{$level->name}}</option>

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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Subject to assign<span class="required">*</span></label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="subject">
                              <option disabled ="" selected ="">Select Subject</option>
                              @foreach($subjects as $subject)
                              <option value = "{{$subject->name}}">{{$subject->name}}</option>

                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Make Coordinator?<span class="required">*</span></label>
                           <div class="col-md-8 col-sm-6 col-xs-12">
                            <p>
                                Yes:
                                <input type="radio" class="flat" name="coordinator" id="genderM" value="1"  required />
                                No:
                                <input type="radio" class="flat" name="coordinator" id="genderF" value="0" checked="" required />
                            </p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Assign Subject</button>
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