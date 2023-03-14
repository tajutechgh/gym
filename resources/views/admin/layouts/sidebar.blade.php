<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav" style="font-size: x-large;">
        <ul id="sidebarnav">
            <li class="user-profile">
                <a class="waves-effect waves-dark active" href="{{ route('admin.home') }}" aria-expanded="false"><img src="{{Storage::disk('local')->url(Auth::user()->image)}}" alt="user" /><span class="hide-menu">{{ Auth::user()->name }}</span>
                </a>
            </li>
            <li class="nav-devider"></li>
            @can('user.dashboard', Auth::user())
            <li> 
                <a class="active" href="{{ route('admin.home') }}" aria-expanded="false"><i class="fa fa-dashboard"></i>
                <span class="hide-menu">Dashboard</span>
            </li>
            @endcan
            @can('user.members', Auth::user())
            <li> 
                <a class="active" href="{{ route('member.index') }}" aria-expanded="false"><i class="fa fa-users"></i>
                <span class="hide-menu">Members</span>
            </li>
            @endcan
            @can('user.classes', Auth::user())
            <li> 
                <a class="active" href="{{ route('class.index') }}" aria-expanded="false"><i class="fa fa-institution"></i>
                <span class="hide-menu">Classes</span>
            </li>
            @endcan
            @can('user.groups', Auth::user())
            <li> 
                <a class="active" href="{{ route('group.index') }}" aria-expanded="false"><i class="fa fa-share-alt"></i>
                <span class="hide-menu">Groups</span>
            </li>
            @endcan
            @can('user.attendance', Auth::user())
            <li> 
                <a class="active" href="{{ route('attendance.index') }}" aria-expanded="false"><i class="fa fa-calendar"></i>
                <span class="hide-menu">Attendance</span>
            </li>
            @endcan
            @can('user.message', Auth::user())
            <li> 
                <a class="active" href="{{ route('message.index') }}" aria-expanded="false"><i class="fa fa-envelope"></i>
                <span class="hide-menu">Message</span>
            </li>
            @endcan
            <li> 
                <a class="active" href="{{ route('changepass') }}" aria-expanded="false"><i class="fa fa-key"></i>
                <span class="hide-menu">Change Password</span>
            </li>
            <li> 
                <a class="active" href="{{ route('gallery.index') }}" aria-expanded="false"><i class="fa fa-photo"></i>
                <span class="hide-menu">Gallery</span>
            </li>
            <li> 
                <a class="active" href="{{ route('notice.index') }}" aria-expanded="false"><i class="fa fa-info-circle"></i>
                <span class="hide-menu">Notice</span>
            </li>
            <li> 
                <a class="active" href="{{ route('profile',Auth::user()->name) }}" aria-expanded="false"><i class="fa fa-user">
                </i><span class="hide-menu">Profile</span>
            </li>
            @can('user.report', Auth::user())
            <li> 
                <a class="active has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-database">
                </i><span class="hide-menu">Report</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a class="active" href="{{ route('billingreport') }}">Billing Report</a></li>
                    <li><a class="active" href="{{ route('expensesreport') }}">Expenses Report</a></li>
                </ul>
            </li>
            @endcan
            @can('user.manage', Auth::user())
            <li> 
                <a class="active has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-cog">
                </i><span class="hide-menu">Manage</span></a>
                <ul aria-expanded="false" class="collapse">
                    @can('user.staffs', Auth::user())
                        <li><a class="active" href="{{ route('user.index') }}">Staffs</a></li>
                    @endcan
                    @can('user.memberships', Auth::user())
                        <li><a class="active" href="{{ route('membership.index') }}">Membership</a></li>
                    @endcan
                    @can('user.products', Auth::user())
                        <li><a class="active" href="{{ route('product.index') }}">Products</a></li>
                    @endcan
                    @can('user.equipments', Auth::user())
                        <li><a class="active" href="{{ route('equipment.index') }}">Equipments</a></li>
                    @endcan
                    @can('user.event', Auth::user())
                        <li><a class="active" href="{{ route('event.create') }}">Add Event</a></li>
                    @endcan
                    @can('user.expenses', Auth::user())
                        <li><a class="active" href="{{ route('expense.index') }}">Expenses</a></li>
                    @endcan
                    @can('user.roles', Auth::user())
                        <li><a class="active" href="{{ route('role.index') }}">Roles</a></li>
                    @endcan
                    @can('user.permissions', Auth::user())
                        <li><a class="active" href="{{ route('permission.index') }}">Permissions</a></li>
                    @endcan
                </ul>
            </li>
            @endcan

            <li>
                <a class="active" href="{{ route('logout') }}" aria-expanded="false"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                    <span class="hide-menu">Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->