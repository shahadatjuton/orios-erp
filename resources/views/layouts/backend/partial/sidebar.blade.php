<nav id="sidebar">
    <div class="p-4 pt-5">
        <div class="img logo rounded-circle mb-5" style="background-image: url({{asset('assets/backend/images/'.Auth::user()->image)}});"></div>
        <h4 class="text-center" style="color: white;">{{Auth::user()->name}}</h4>
        <ul class="list-unstyled components mb-5">

            <!-- ===================Start Super-Admin Side bar ============================  -->

            @if(Request::is('superadmin*'))

                <li class="{{ Request::is('superadmin/dashboard') ? 'active' : '' }}">
                    <a href="{{route('superadmin.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="staffing">
                    <a href="#staffingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Job</a>
                    <ul class="collapse list-unstyled" id="staffingSubmenu">
                        <li>
                            <a href="{{route('superadmin.jobCircular')}}">Job Applications</a>
                        </li>
                        <li>
                            <a href="{{route('superadmin.application.index')}}">CV Bank</a>
                        </li>
                        <li>
                            <a href="">Assessment</a>
                        </li>
                    </ul>
                </li>
                <li class="staffing">
                    <a href="#assessmentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Assessment</a>
                    <ul class="collapse list-unstyled" id="assessmentSubmenu">
                        <li>
                            <a href="{{route('superadmin.assessment.employees')}}">Invite for Assessment</a>
                        </li>
                        <li>
                            <a href="{{route('superadmin.assessment.applications')}}">Invite for Interview</a>
                        </li>
                        <li>
                            <a href="{{route('superadmin.assessment.result')}}">Assessment Result</a>
                        </li>
                    </ul>
                </li>
                <li class="staffing">
                    <a href="#leaveSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Leave</a>
                    <ul class="collapse list-unstyled" id="leaveSubmenu">
                        <li>
                            <a href="{{route('superadmin.leaveApplication.index')}}">Leave Applications</a>
                        </li>
                        <li>
                            <a href="{{route('superadmin.attendance.report')}}">Own Attendance Report</a>
                        </li>
                        <li>
                            <a href="{{route('superadmin.attendance.sheet')}}">Employees Attendance Sheet</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            @endif

        <!-- ================End Super-Admin Side bar ============================  -->

            <!-- ===================Start Admin Side bar ============================  -->

            @if(Request::is('admin*'))

                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="staffing">
                    <a href="#staffingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Staffing</a>
                    <ul class="collapse list-unstyled" id="staffingSubmenu">
                        <li>
                            <a href="{{route('admin.job.create')}}">Job Requisition</a>
                        </li>
                        <li>
                            <a href="{{route('admin.job.index')}}">CV Bank</a>
                        </li>
                        <li>
                            <a href="">Assessment</a>
                        </li>
                    </ul>
                </li>

                <li class="leave">
                    <a href="#leaveSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Leave</a>
                    <ul class="collapse list-unstyled" id="leaveSubmenu">
                        <li>
                            <a href="{{route('admin.application.index')}}">Application List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.leave.index')}}">Own Application</a>
                        </li>
                        <li>
                            <a href="{{route('admin.leave.create')}}">Leave Application </a>
                        </li>
                    </ul>
                </li>
                <li class="leave">
                    <a href="#attendanceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attendance</a>
                    <ul class="collapse list-unstyled" id="attendanceSubmenu">
                        <li>
                            <a href="">Attendance</a>
                        </li>
                        <li>
                            <a href="{{route('admin.attendance.report')}}">Own Attendance Report</a>
                        </li>
                    </ul>
                </li>
                <li class="leave-type">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Leave Type</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{route('admin.leaveType.index')}}">Leave Type List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.leaveType.create')}}">Create Leave Type</a>
                        </li>

                    </ul>
                </li>
                <li class="leave-type">
                    <a href="#depSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Department</a>
                    <ul class="collapse list-unstyled" id="depSubmenu">
                        <li>
                            <a href="{{route('admin.department.index')}}">Department List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.department.create')}}">Create Department</a>
                        </li>

                    </ul>
                </li>

                <li data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

        @endif

        <!-- ================End Admin Side bar ============================  -->

            <!-- ===================Start User Side bar ============================  -->

            @if(Request::is('user*'))

                <li class="{{ Request::is('user/dashboard') ? 'active' : '' }}">
                    <a href="{{route('user.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Leave</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{route('user.leave.index')}}">Own Application</a>
                        </li>
                        <li>
                            <a href="{{route('user.leave.create')}}">Leave Application </a>
                        </li>
                        <li>
                            <a href="{{route('user.attendance.report')}}">Own Attendance Report </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#assessSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Assessment</a>
                    <ul class="collapse list-unstyled" id="assessSubmenu">
                        <li>
                            <a href="{{route('user.assessment.index')}}">Invited Applicants</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

        @endif

        <!-- ================End User Side bar ============================  -->
            <!-- ===================Start Applicant Side bar ============================  -->

            @if(Request::is('applicant*'))

                <li class="{{ Request::is('applicant/dashboard') ? 'active' : '' }}">
                    <a href="{{route('applicant.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

        @endif

        <!-- ================End Applicant Side bar ============================  -->

        </ul>

        <div class="footer" style="margin-top:auto;">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>

    </div>
</nav>
