 @inject('request', 'Illuminate\Http\Request')
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="{{ $request->segment(1) == 'admin' ? 'header' : '' }}">
                <a href="{{ url('/admin') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.home')</span>
                </a>
		</li>

		
		
	
		@can('user_management_access')
            <li class="treeview {{ $request->segment(2) == 'users' ? 'active active-sub' : '' }} {{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
		@endcan
		
		@can('skill_access')
            <li class="{{ $request->segment(2) == 'skills' ? 'active' : '' }}">
                <a href="{{ route('admin.skills.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.skills.title')</span>
                </a>
            </li>
		@endcan
		
		@can('project_access')
            <li class="{{ $request->segment(2) == 'projects' ? 'active' : '' }}">
                <a href="{{ route('admin.projects.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.projects.title')</span>
                </a>
            </li>
		@endcan
		
		
		<li class="treeview"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i><span>@lang('quickadmin.logout')</span></a></li>			 
		  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
		  </form>
      </ul>
	 
    </section>
    <!-- /.sidebar -->
  </aside>                                     