<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                {{-- {{url().'/images/'}}  {{ auth()->user()->name }} {{ url().auth()->user()->img_dir }} --}}
                <img src="{{ url(session()->get('user')->img_dir) }}" width="48" height="48" alt="User" />

            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ session()->get('user')->Fname . ' ' . session()->get('user')->Lname }}</div>

                <div class="email">{{ session()->get('user')->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ url('profile') }}"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('LogOut') }}"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">

                @if (session()->get('user')->roleID == 1)
                    <li class="header">Admin NAVIGATION</li>
                    <li class="active">
                        <a href="{{ url('/User') }}">
                            <i class="material-icons">supervisor_account</i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/Role') }}">
                            <i class="material-icons">account_box</i>
                            <span>Roles</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/Track') }}">
                            <i class="material-icons">library_books</i>
                            <span>All Tracks</span>
                        </a>
                    </li>
                @elseif(session()->get('user')->roleID == 2)
                    <li class="header">Teacher NAVIGATION</li>
                    <li class="active">
                        <a href="{{ url('/Track/'.session()->get('user')->ID) }}">
                            <i class="material-icons">library_books</i>
                            <span>All Tracks</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/Track/create') }}">
                            <i class="material-icons">library_add</i>
                            <span>Add Track</span>
                        </a>
                    </li>
                @elseif (session()->get('user')->roleID == 3)
                    <li class="header">Student NAVIGATION</li>
                    <li class="active">
                        <a href="{{ url('/Track') }}">
                            <i class="material-icons">library_books</i>
                            <span>All Tracks</span>
                        </a>
                    </li>
                    <li>
                        {{-- some edit her --}}
                        <a href="{{ url('/Track/create') }}">
                            <i class="material-icons">library_books</i>
                            <span>My Tracks</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2021 <a href="javascript:void(0);">BIT by BIT - E-learning</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>
