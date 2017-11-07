<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Authentication:{{Auth::user()->UserType}}</h3>
                <ul class="nav side-menu">
                  <li><a href="/tutor/dashboard"><i class="fa fa-home"></i> Home</a></li>
                  <li><a><i class="fa fa-user"></i>Profile <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/tutor/profile">View Profile</a></li>
                      <li><a href="/tutor/editprofile">Edit Profile</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-book"></i> My Assigned Subjects <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/tutor/mysubjects">View my Subjects</a></li>
                      <li><a href="/tutor/uploadresults">Upload Results</a></li>
                      <li><a href="/tutor/mysubjectsresult">View my Results</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>My Assigned Class<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/tutor/myclasses">View and Print Classlist</a></li>
                      <li><a href="/tutor/myclassresult">View My Class Results</a></li>
                      <li><a href="/tutor/classposition">Calculate Class Position</a></li>
                       <li><a href="/tutor/showposition">Show Class Position</a></li>
                      <li><a href="/tutor/viewcomment">View $ Comment Result</a></li>
                    </ul>
                  </li>
                  <li><a href="/tutor/generalclasslist"><i class="fa fa-print"></i>Print Class List</a></li>
                </ul>
              </div>
              
                           

            </div>
            <!-- /sidebar menu -->