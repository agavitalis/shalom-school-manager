<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Authentication:{{Auth::user()->UserType}}</h3>
                <ul class="nav side-menu">
                  <li><a href="/admin/dashboard"><i class="fa fa-home"></i> Home</a></li>
                  <li><a><i class="fa fa-user"></i>Profile <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/profile">View Profile</a></li>
                      <li><a href="/admin/editprofile">Edit Profile</a></li>
                    </ul>
                  </li>
                 
                  <li><a><i class="fa fa-book"></i> My Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/mystudents">View all Students</a></li>
                       <li><a href="/admin/managestudents">Manage my Students</a></li>
                      <li><a href="/admin/registerstudents">Register new Student(s)</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-book"></i>My Teachers<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/myteachers">View all My Teachers</a></li>
                       <li><a href="/admin/manageteachers">Manage My Teachers</a></li>
                      <li><a href="/admin/registerteachers">Register new Teacher(s)</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-clone"></i>Student's Results<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/viewresults">View all Student Results</a></li>
                       <li><a href="/admin/approveresult">Approve Student Results</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Study Materials<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/announcements">View All Study Materials</a></li>
                      <li><a href="/admin/uploadannouncement">Upload an announcements</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Scheme of Work<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/announcements">View all Scheme of Work</a></li>
                      <li><a href="/admin/uploadannouncement">Upload an Scheme of Work</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Announcements<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/announcements">View Announcements</a></li>
                      <li><a href="/admin/myannouncements">View all my announcements</a></li>
                      <li><a href="/admin/uploadannouncement">Upload an announcements</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              
                           

            </div>
            <!-- /sidebar menu -->