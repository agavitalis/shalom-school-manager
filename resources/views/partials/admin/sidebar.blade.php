<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Authentication:{{Auth::user()->UserType}}</h3>
                <ul class="nav side-menu">
                  <li><a href="/admin/dashboard"><i class="fa fa-home"></i> Home</a></li>

                  <li><a href="/admin/session"><i class="fa fa-dashboard"></i> Manage Session</a></li>
                   <li><a href="/admin/level"><i class="fa fa-bar-chart"></i> Manage Level</a></li>

                  <li><a href="/admin/class"><i class="fa fa-cogs"></i> Manage Classes </a></li>
                  <li><a href="/admin/subject"><i class="fa fa-calendar"></i> Manage Subjects</a></li>
                 
                  
                 

                  <li><a><i class="fa fa-graduation-cap"></i>My Teachers<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/registerteachers">Register New Teacher(s)</a></li>
                       <li><a href="/admin/manageteachers">Manage My Teachers</a></li>  
                    </ul>
                  </li>
                   <li><a><i class="fa fa-pencil-square-o"></i> Teachers Duties <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="/admin/assignsubject">Manage Teacher Subjects</a></li>
                       <li><a href="/admin/assignclass">Manage Form/Head Teachers</a></li>
                     
                    </ul>
                  </li>
                   <li><a><i class="fa fa-group"></i> My Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="/admin/registerstudents">Register new Student(s)</a></li>
                       <li><a href="/admin/managestudents">Manage my Students</a></li>
                      <li><a href="/admin/printstudents">View and Print Students</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-share"></i>Assign Classes/Levels <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="/admin/givestudentsclasses">Assign Student(s) Class(es)</a></li>
                       <li><a href="/admin/givestudentslevel">Assign Student(s) Level(es)</a></li>
                     
                    </ul>
                  </li>
                   <li><a><i class="fa fa-clone"></i>Student's Results<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/viewresults">View all Student Results</a></li>
                       <li><a href="/admin/approveresult">Approve Student Results</a></li>
                    </ul>
                  </li>
                  
                   <li><a><i class="fa fa-user"></i>Profile <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/profile">View Profile</a></li>
                      <li><a href="/admin/editprofile">Edit Profile</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              
                           

            </div>
            <!-- /sidebar menu -->