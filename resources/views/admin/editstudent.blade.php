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
                <h3>Student Profile</h3>
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

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Student Records</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
                    <p>Only correct and current information should be entered.</p>
                     <div class="col-md-8 col-md-offset-2 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i>Student Profile Update</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#home" data-toggle="tab">Basic Information</a>
                        </li>
                        <li><a href="#profile" data-toggle="tab">Other Information</a>
                        </li>
                  
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="home">
                               <form  method="post" action="/admin/editstudent/{{$update->id}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                  {{csrf_field()}}
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-xs-12">
                                      <input type="text" id="name" name='name' value="{{$update->name}}" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>

                            
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="regno">Registration Number <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8  col-xs-12">
                                      <input type="text" id="username" name="username"  value="{{$update->username}}"required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Session<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                      <select class="form-control" required="" name="session"  value="{{$update->session}}">
                                        <option  value="{{$update->session}}">{{$update->session}}</option>
                                        @foreach($sessions as $session)
                                        <option value = "{{$session->name}}">{{$session->name}}</option>

                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Level<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                      <select class="form-control" required="" name="level" value="{{$update->level}}" >
                                        <option  value="{{$update->level}}">{{$update->level}}</option>
                                        @foreach($levels as $level)
                                        <option value = "{{$level->name}}">{{$level->name}}</option>

                                        @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                      <select class="form-control" required="" name="klass" value="{{$update->class}}">
                                        <option  value="{{$update->class}}">{{$update->class}}</option>
                                        @foreach($klasses as $klass)
                                        <option value = "{{$klass->name}}">{{$klass->name}}</option>

                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Term<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                      <select class="form-control" required="" name="term" value="{{$update->class}}">
                                        <option  value="{{$update->term}}">{{$update->term}}</option>
                                        @foreach($terms as $term)
                                        <option value = "{{$term->name}}">{{$term->name}}</option>

                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender: {{$update->gender}}</label>
                                    <div class="col-md-8  col-xs-12">
                                      <div id="gender" class="btn-group" data-toggle="buttons" >
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                          <input type="radio" name="gender" required="" value="male"> &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                          <input type="radio" name="gender" required="" value="female"> Female
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                          
                                  <div class="form-group">
                                    <div class="col-md-8  col-xs-12 col-md-offset-3">
                                    <hr>
                                      <button type="submit" class="btn btn-success">Update Records</button>
                                      <button class="btn btn-primary" type="reset">Reset</button>
                                      
                                    </div>
                                  </div>

                                </form>

                            
                            
                             
                        </div>
                        <div class="tab-pane" id="profile">

                            <form  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" id="first-name"  value="{{$student->email}}" required="required" disabled="true" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                               <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Phone <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" id="first-name"  value="{{$student->phone}}" required="required" disabled="true" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                               <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Date of Birth <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" id="first-name"  value="{{$student->date_of_birth}}" required="required" disabled="true" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                               <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Residential Address <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <textarea class="form-control" rows="3"disabled="true" placeholder="{{$student->address}}">{{$student->address}}</textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">LGA of Origin <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" id="first-name"  value="{{$student->lga}}" required="required" disabled="true" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              
                               <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">State <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" id="first-name"  value="{{$student->state}}" required="required" disabled="true" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              
                               <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Country <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" id="first-name"  value="{{$student->country}}" required="required" disabled="true" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              
                              <div class="ln_solid"></div>
                              

                            </form>

                        </div>
                        
                       
                      </div>
                    </div>

                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>
                    <!-- End SmartWizard Content -->
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
    <!-- jQuery Smart Wizard -->
    <script src="{{asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('js/custom.js"></script>
@endsection