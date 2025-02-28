<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="active"> <a href="#"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>

				<li> <a href="{{ route('drivers') }}"><i class="fa fa-building" aria-hidden="true"></i> <span>Filter Drivers</span></a> </li>


				<li class="list-divider"></li>
				<li> <a href="{{ route('customer') }}"><i class="fas fa-edit"></i> <span>Filter Customers</span></a> </li>
				<li> <a href="{{ route('riderequest') }}"><i class="fas fa-laptop"></i> <span>View Ride Requests</span></a> </li>
				<li> <div class="preview-item-content ml-3">
                    <p class="preview-subject mb-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log out</p>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div> </li>
				
			</ul>
		</div>
	</div>
</div>