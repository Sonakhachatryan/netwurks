<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ $admin->name }}</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="{{ url('/admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="{{ url('/admin/customers') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Customers</span></a>
            </li>
            <li>
                <a href="{{ url('/admin/associates') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Associates</span></a>
            </li>
            <li>
                <a href="{{ url('/admin/industries') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Industries</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Pages</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('admin/contact-details') }}">Contact Details</a></li>
                </ul>
            </li>

        </ul>

    </div>
</nav>