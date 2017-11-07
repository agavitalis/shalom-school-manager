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
                <h3>View Students Results and Comment</h3>
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
                    <h2>{{$result->name}} results for {{$result->session}} session {{$result->class}}, {{$result->term}} term. </h2>
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
                     This is your student result, comment as form/head teacher.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered  dt-responsive nowrap" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                        <th>Student Name</th> 
                        <th>Reg No</th>
                        <th>Subject</th>  
                        <th>CA</th>   
                        <th>Test</th>
                        <th>Exam</th>
                        <th>Grade</th>
                        <th>Position</th>
                        <th>Teacher</th>                          
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($results as $result )   
                       <tr>
                          <td>
                           <a>{{$result->name}}</a>
                          </td>
                          <td>
                           <a>{{$result->username}}</a>
                          </td>
                          <td>
                           <a>{{$result->subject}}</a>
                          </td>
                          <td>
                           <a>{{$result->continous_accessment}}</a>
                          </td>
                          <td>
                           <a>{{$result->test}}</a>
                          </td>
                          <td>
                           <a>{{$result->exam}}</a>
                          </td>
                           <td>
                           <a>{{$result->grade}}</a>
                          </td>
                          <td>
                           <a>{{$result->subject_position}}</a>
                          </td>
                          <td>
                           <a>{{$result->subject_teacher}}</a>
                          </td>
                                                 
                        </tr> 
                        @endforeach
                      </tbody>
                    </table>
                   
                    <div class="x_content">
                    
                        <br />
                        <form class="form-horizontal form-label-left input_mask">
                            {{csrf_field()}}
                        <input type="hidden" id="ownername" value="{{$result->name}}">
                        <input type="hidden" id="ownerusername" value="{{$result->username}}">
                        <input type="hidden" id="ownerlevel" value="{{$result->level}}">
                        <input type="hidden" id="ownerclass" value="{{$result->class}}">
                        <input type="hidden" id="ownerterm" value="{{$result->term}}">
                        <input type="hidden" id="ownersession" value="{{$result->session}}">
                       
                                                

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Your Comment<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                  <textarea class="form-control" rows="3"  id="yourcomment"   placeholder='{{Auth::user()->address}}'></textarea>
                            </div>
                        </div>
                        
                        
                       
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            
                            <button  class="btn btn-success" id="comment">Comment</button>
                            </div>
                        </div>
                         <div class="ln_solid"></div>
                        </form>
                    </div>
                    <div class="col-md-6 col-md-offset-3" id="outcome"><div>
                  </div>
                </div>
              </div>
               


               <div class="col-md-6 col-md-offset-3 col-xs-12">


                    <div class="x_panel">
                    <div class="x_title">
                        <h2>Select <small>another student to comment result</small></h2>
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
                        <form class="form-horizontal form-label-left input_mask" action="/tutor/viewcomment" method="post">
                            {{csrf_field()}}
                        <input type="hidden" name="action" value="position">

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Session<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="session"  id="session">
                                <option disabled ="" selected ="">Select Session</option>
                                @foreach($sessions as $session)
                                <option value = "{{$session->name}}">{{$session->name}}</option>

                                @endforeach
                            </select>
                            </div>
                        </div>
                                                

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Your Class(es)<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="klass" id="klass">
                                <option disabled ="" selected ="" value='0'>Select Class</option>
                                @foreach($klasses as $klass)
                                <option value = "{{$klass->name}}">{{$klass->name}}</option>

                                @endforeach
                            </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Term<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="term"  id="term">
                                <option disabled ="" selected ="" value='0'>Select Term</option>
                                @foreach($terms as $term)
                                <option value = "{{$term->name}}">{{$term->name}}</option>

                                @endforeach
                            </select>
                            </div>
                        </div>
                    
                         
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Student<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <select class="form-control" required="" name="username"  id="student">
                                <option disabled ="" selected ="">Select Student</option>
                               
                            </select>
                            </div>
                        </div>
                        
                        
                        <div id="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            
                            <button type="submit" class="btn btn-success">Show Students Results</button>
                          
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
  @include('partials.teachers.footer')
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

<script>



 $(document).ready(function(){

    $("#comment").click(function(e){
        e.preventDefault();

         var ownerusername =$("#ownerusername").val();
         var ownerlevel =$("#ownerlevel").val();
         var ownerclass =$("#ownerclass").val();
         var ownerterm =$("#ownerterm").val();
         var ownername =$("#ownername").val();
        var ownersession =$("#ownersession").val();
        var yourcomment =$("#yourcomment").val();
// alert(yourcomment);
        if(yourcomment == '' || yourcomment == null){
            $("#outcome").fadeIn(3000, function(){						
           
          var content='';
          content+='<div class="alert alert-info alert-dismissible fade in" role="alert">';
          content+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
          content+='<strong>You cant leave the comment box empty</strong>';
          content+='</div>';
            
          $('#outcome').html(content);
            });	
        }
        else{
            $.ajax({
                type:'POST',
                url:'/positioncomment',
                data:{ _token:'<?php echo csrf_token() ?>',username:ownerusername,klass:ownerclass,term:ownerterm,session:ownersession,yourcomment:yourcomment},
                
                success:function(data){
                    if(data == 'none'){

                         $("#outcome").fadeIn(3000, function(){						
           
                        var content='';
                        content+='<div class="alert alert-info alert-dismissible fade in" role="alert">';
                        content+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                        content+='<strong>Calculate class position first before commenting on this result</strong>';
                        content+='</div>';
                            
                        $('#outcome').html(content);
                         });	
                    }
                    if(data == 'done'){
                         $("#outcome").fadeIn(3000, function(){						
           
                        var content='';
                        content+='<div class="alert alert-success alert-dismissible fade in" role="alert">';
                        content+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                        content+='<strong>You have successfully commented on this result</strong>';
                        content+='</div>';
                            
                        $('#outcome').html(content);
                         });	
                    }
                   
                }
            });
        }
    });
 });


$(document).ready(function(){

    $("#term").change(function(e){

        //prevent default behaviour
        e.preventDefault();

        //catches the students details from the form
        var klass = $("#klass").val();
        var term = $("#term").val();
        var session = $("#session").val();
    

    
            $.ajax({ 
                
            type:'POST', 
            url:'/getclass', 
            data:{ _token:'<?php echo csrf_token() ?>',klass:klass,term:term,session:session}, 
                success:function(data){ 
                var content =" ";
                $.each(data, function(){
                    
                content='<option value = "'+this.username+'"> '+this.name+'</option>';
                    // console.log(this.name);
                });
                    
            
                // Inject the whole select string into our existing HTML select tag
                $('#student').html(content);
            } 
            }); 
                    
                    

        
    });    
});

</script>

  </body>
</html>
@endsection