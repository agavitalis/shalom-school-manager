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
                <h3>Result</h3>
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
                  <div class="x_title hide">
                    <h2>Your Results</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header text-center">
                          <h1>
                             Shalom Academy
                          </h1>
                          <h5>
                             Prime College of Immaculata
                          </h5>
                          <h6>
                             Prime College of Immaculata
                             Prime College of Immaculata
                             Prime College of Immaculata
                          </h6>
                        </div>
                        <!-- /.col -->
                      </div>
                      <hr  class="zero-margin" >
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-2 col-xs-2 invoice-col">
                          <div class="pull-right">
                            <!-- Current avatar -->
                            <img class="img-responsive result-img" src="../images/picture.jpg" alt="Avatar" title="Change the avatar">
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-8 col-xs-8 invoice-col">
                          
                          <address>

                              <div class="col-md-12  col-sm-12 col-xs-12 invoice-col text-center">
                                <p> <strong>Name: {{Auth::user()->name}}</strong> </p>
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-sm-6 col-xs-6 text-right">
                               
                                <p><strong>Gender:</strong> {{Auth::user()->gender}}
                                <br><strong>Registration No:</strong> {{Auth::user()->username}}
                                <br><strong>Email:</strong> {{Auth::user()->email}}
                                <br><strong>Phone:</strong> {{Auth::user()->phone}}</p>
                              </div>
                              
                              <div class="col-sm-6 col-xs-6 pull-right">
                                <p><strong>Session:</strong> {{$positions->session}}
                                <br><strong>Level:</strong> {{$positions->level}}
                                <br><strong>Class:</strong> {{$positions->class}}
                                <br><strong>Term:</strong> {{$positions->term}}</p>
                              </div>
          
                              
                          </address>
                        
                        </div>
                        
                        <!-- /.col -->
                        <div class="col-sm-2 col-xs-2 invoice-col pull-right">
                          <div class="pull-left">
                            <!-- Current avatar -->
                            <img class="img-responsive result-img" src="../images/picture.jpg" alt="Avatar" title="Change the avatar">
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <div class="clearfix"></div>
                      <hr class="zero-margin">
                      <div class="row margin-b">
                        <div class="col-xs-12  margin-b">
                              <div class="col-sm-4 col-xs-4 text-right ">
                                <p><strong>Total Score:&nbsp</strong>{{$positions->total_score}}
                                <br><strong>Class Average:&nbsp</strong>{{$positions->average}}
                                </p>
                              </div>

                               <div class="col-sm-4 col-xs-4 text-center ">
                                <p><strong>No of Subjects:&nbsp</strong>{{$positions->total_no_of_subjects}}
                                <br><strong>Average:&nbsp</strong>{{$positions->average}}
                                </p>
                              </div>

                               <div class="col-sm-4 col-xs-4 ">
                                <p><strong>No in Class:&nbsp</strong>50
                                <br><strong>Position in Class:&nbsp</strong>{{$positions->position}}
                                </p>
                              </div>
                        </div>
                      </div> 
                      <hr class="zero-margin" >
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12">
                          <table class="table result-print table-striped">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Subject</th>
                                <th>CA</th>
                                <th>Test</th>
                                <th>Exam</th>
                                <th>Total</th>
                                
                                <th>Grade</th>
                                <th>Position</th>
                                <th>Remark</th>
                                <th>Teacher</th>

                              </tr>
                            </thead>
                            <tbody>
                              @foreach($results as $result)
                              <tr>
                                <td>#</td>
                                <td style="width:20%;">{{$result->subject}}</td>
                                <td>{{$result->continous_accessment}}</td>
                                <td>{{$result->test}}</td>
                                <td>{{$result->exam}}</td>
                                <td>{{$result->total}}</td>
                                <td>{{$result->grade}}</td>
                                <td>{{$result->subject_position}}</td>
                                
                               
                                <td>Distinction</td>
                               <td>{{$result->subject_teacher}}</td>
                              </tr>
                             @endforeach
                               
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-4">
                         <p><h2>Codes</h2></p>
                          <table class=" result-print table-striped" style="margin-left:2em;margin-top:1em;">
                            <tbody>
                              <tr>
                                <th>Destinction (A):</th>
                                <td style="padding-top:.2em;">  70-100%</td>
                              </tr> 
                             <tr>
                                <th>Very Good (B): </th>
                                <td style="padding-top:.2em;">  60-69%</td>
                              </tr>
                              <tr>
                                <th>Credit  (C):</th>
                                <td style="padding-top:.2em;">  46-59%</td>
                              </tr>
                              <tr>
                                <th>Pass  (D):</th>
                                <td style="padding-top:.2em;">  40-45%</td>
                              </tr>
                               <tr>
                                <th>Fail  (F):</th>
                                <td style="padding-top:.2em;">  0-39%</td>
                              </tr>
                               
                            </tbody>   
                          </table> 
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-8">
                          <p><h2>Comments</h2></p>
                          <div class="table-responsive table-boarded">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th>Form Teacher:</th>
                                  <td style="padding-left:8em;">Signature:</td>
                                </tr>
                                <tr>
                                  <th>Comments:</th>
                                  <td>{{$positions->teacher_comment}}</td>
                                </tr>
                                <tr>
                                  <th>Principlal:</th>
                                  <td style="padding-left:8em;">Signature:</td>
                                </tr>
                                <tr>
                                  <th>Comments:</th>
                                  <td></td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <td></td>
                                </tr>
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button class="btn btn-default pull-right" onclick="printthis()"><i class="fa fa-print"></i> Print</button>
                          </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script>
            function printthis() {
               $(".nav.toggle").hide();
               $(".page-title").hide();
               $(".no-print").hide();
               $(".navbar-nav").hide();
              window.print();
            }
          </script>
        </div>
        <!-- /page content -->


      @endsection


@section('footer')
  @include("partials.students.footer") 
@endsection