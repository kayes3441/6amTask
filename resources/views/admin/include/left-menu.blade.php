<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span>Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.index')}}">Add Product</a></li>
                        <li><a href="{{route('product.manage')}}">Manage Product</a></li>
                    </ul>

                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-envelope"></i>
                        <span>Task</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('task.index')}}">Add Task</a></li>
                        <li><a href="{{route('task.manage')}}">Manage Task</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
