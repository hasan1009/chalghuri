<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li style="background: #E34724">
            <a style="font-size:20px; text-align:center; font-weight:bold" href="{{ url('backend/dashboard') }}">CHAL
                GHURI</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{ url('public/assets/images/users/avatar.jpg') }}" alt="John Doe" />
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTL9m3D4iSe0EuKKAka-30sKeiLl2S_3-lc4A&s') }}"
                        alt="John Doe" />
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">Chal Ghuri</div>
                    <div class="profile-data-title">Travel Company</div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">Administration</li>
        <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ url('backend/dashboard') }}"><span class="fa fa-desktop"></span> <span
                    class="xn-text">Dashboard</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Admins</span></a>
            <ul>
                <li><a href="{{ url('admins/add') }}"><span class="fa fa-plus"></span> Add Admin</a></li>
                <li><a href="{{ url('admins/list') }}"><span class="fa fa-bars"></span> Admin List</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Employee</span></a>
            <ul>
                <li><a href="{{ url('employee/add') }}"><span class="fa fa-plus"></span> Add Employee</a></li>
                <li><a href="{{ url('employee/list') }}"><span class="fa fa-bars"></span> Employee List</a></li>
            </ul>
        </li>

        <li class="xn-openable">
            <a href="#"><span class="fa fa-gift"></span> <span class="xn-text">Assets</span></a>
            <ul>
                <li><a href="{{ url('asset/add') }}"><span class="fa fa-plus"></span> Add Asset</a></li>
                <li><a href="{{ url('asset/list') }}"><span class="fa fa-bars"></span> Asset List</a></li>
            </ul>
        </li>
        <li class="xn-title">Business</li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-plane"></span> <span class="xn-text">Tours</span></a>
            <ul>
                <li><a href="{{ url('tour/add') }}"><span class="fa fa-plus"></span> Add Tour</a></li>
                <li><a href="{{ url('tour/list') }}"><span class="fa fa-bars"></span> Tour List</a></li>
            </ul>
        </li>


    </ul>
</div>
