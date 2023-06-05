   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="index3.html" class="brand-link">
           <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
           <span class="brand-text font-weight-light">SYSTEM</span>
       </a>

       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar user panel (optional) -->
           <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                   <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                   <a href="#" class="d-block">Alexander Pierce</a>
               </div>
           </div>

           <!-- SidebarSearch Form -->
           <div class="form-inline">
               <div class="input-group" data-widget="sidebar-search">
                   <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                   <div class="input-group-append">
                       <button class="btn btn-sidebar">
                           <i class="fas fa-search fa-fw"></i>
                       </button>
                   </div>
               </div>
           </div>
           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">
                   <li class="nav-item">
                       <a href="" class="nav-link">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p> Dashboard</p>
                       </a>
                   </li>
                   <li class="nav-item menu-close">
                       <a href="#" class="nav-link ">
                           <i class="nav-icon fa fa-book"></i>
                           <p>
                               Academic Management
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{route('retrievesubject')}}" class="nav-link ">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Add Subjects </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{route('retrievetopic')}}" class="nav-link ">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Add Topics </p>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item">
                       <a href="{{route('workingscheme')}}" class="nav-link">
                           <i class="nav-icon fa fa-calendar"></i>
                           <p> Working Scheme </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="" class="nav-link">
                           <i class="nav-icon fa fa-book-open"></i>
                           <p> Lesson Plan </p>
                       </a>
                   </li>
                   <li class="nav-item menu-close">
                       <a href="#" class="nav-link ">
                           <i class="nav-icon fas fa-users"></i>
                           <p>
                               User Management
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('usermgt') }}" class="nav-link ">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Academic master </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('usermgt') }}" class="nav-link ">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Teachers </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('usermgt') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Admin </p>
                               </a>
                           </li>
                       </ul>
                   </li>

                   <li class="nav-item">
                       <a href="{{ route('profile') }}" class="nav-link">
                           <i class="nav-icon fa fa-user"></i>
                           <p> Profile </p>
                       </a>
                   </li>

               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
