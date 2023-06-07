<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Books</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Books & All</h6>
                <a class="collapse-item" href="{{route('admin.books')}}"><i class="fas fa-fw fa-arrow-right"></i> Books</a>
                <a class="collapse-item" href="{{route('admin.category')}}"><i class="fas fa-fw fa-arrow-right"></i> Categores</a>
                <a class="collapse-item" href="{{route('admin.authors')}}"><i class="fas fa-fw fa-arrow-right"></i> Authors</a>
                <a class="collapse-item" href="{{route('admin.publishers')}}"><i class="fas fa-fw fa-arrow-right"></i> Publishers</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCat"
           aria-expanded="true" aria-controls="collapseCat">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Category</span>
        </a>
        <div id="collapseCat" class="collapse" aria-labelledby="collapseCat" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage All Category</h6>
                <a class="collapse-item" href="{{route('admin.test.category')}}"><i class="fas fa-fw fa-arrow-right"></i> Add Category</a>
                <a class="collapse-item" href="{{route('admin.test.subcategory')}}"><i class="fas fa-fw fa-arrow-right"></i> Add Sub-Category</a>
                <a class="collapse-item" href="{{route('admin.test.subsubcategory')}}"><i class="fas fa-fw fa-arrow-right"></i> Add Sub-Sub-Category</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand"
           aria-expanded="true" aria-controls="collapseBrand">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Brand</span>
        </a>
        <div id="collapseBrand" class="collapse" aria-labelledby="collapseBrand" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage All Brand</h6>
                <a class="collapse-item" href="{{route('admin.all.brand')}}"><i class="fas fa-fw fa-arrow-right"></i> All Brand</a>
                <a class="collapse-item" href="{{route('admin.add.brand')}}"><i class="fas fa-fw fa-arrow-right"></i> Add Brand</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="#">Colors</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->


