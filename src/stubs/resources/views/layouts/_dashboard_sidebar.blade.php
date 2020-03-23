  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">PA</span>
        <!-- logo for regular state and mobile devices -->
        <!--<span class="logo-lg"><b>PopArt</b>Studio</span>-->
        <span class="logo-lg"><img src="{{ asset('images/logo.svg') }}" alt="Logo"></span>
        <div class="main-sidebar__user-data">
            <span class="main-sidebar__icon-holder"> 
                <img class="main-sidebar__icon" src="{{ asset('images/user-icon.png') }}" alt="User">
            </span>
            <span class="main-sidebar__name">Admin Administratovic</span>
        </div>
    </a>

    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
                <a href="#" class="sidebar-menu__link">

                    <div class="sidebar-menu__icon-holder">
                        <img src="{{ asset('images/dashboard-fa-icon.svg') }}" class="sidebar-menu__icon" alt="Dashboard">
                    </div>

                    <span class="sidebar-menu__span">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu__link">
                    <div class="sidebar-menu__icon-holder">
                        <img src="{{ asset('images/user-fa-icon.svg') }}" class="sidebar-menu__icon" alt="Users">
                    </div>

                    <span class="sidebar-menu__span">Users</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu__link">
                    <div class="sidebar-menu__icon-holder">

                        <img src="{{ asset('images/pages-fa-icon.svg') }}" class="sidebar-menu__icon" alt="Pages">
                    </div>

                    <span class="sidebar-menu__span">Pages</span>
                </a>
            </li>
            <li class="">
            <a href="#" class="sidebar-menu__link">
                    <div class="sidebar-menu__icon-holder">

                        <img src="{{ asset('images/roles-fa-icon.svg') }}" class="sidebar-menu__icon" alt="Roles">
                    </div>

                    <span class="sidebar-menu__span">Roles & permissions</span>
                </a>
            </li>
 
            <li class="">
                <a class="sidebar-menu__link" href="#">
                    <div class="sidebar-menu__icon-holder">
                        <img src="{{ asset('images/logout-fa-icon.svg') }}" class="sidebar-menu__icon" alt="Logging">
                    </div>

                    <span class="sidebar-menu__span">Logging</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu__link">
                    <div class="sidebar-menu__icon-holder">

                        <img src="{{ asset('images/settings-fa-icon.svg') }}" class="sidebar-menu__icon" alt="General settings">
                    </div>

                    <span class="sidebar-menu__span">General settings</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
