<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ trans('message.admin') }} </div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>{{ trans('message.dashboard') }}</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        {{ trans('message.interface') }}
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>{{ trans('message.category') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('message.category') }}:</h6>
                <a class="collapse-item" href="{{ route('category-list') }}">{{ trans('message.list') }}</a>
                <a class="collapse-item" href="{{ route('category-create') }}">{{ trans('message.add') }}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-cog"></i>
        <span>{{ trans('message.product') }}</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('message.category') }}:</h6>
                <a class="collapse-item" href="{{ route('product-list') }}">{{ trans('message.list') }}</a>
                <a class="collapse-item" href="{{ route('product-create') }}">{{ trans('message.add') }}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
