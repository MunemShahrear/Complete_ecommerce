<!-- Page Sidebar Start-->
<header class="main-nav">
    
    <nav>
      <div class="main-navbar">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="mainnav">
          <ul class="nav-menu custom-scrollbar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            
            <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a>
          
            </li>
          
           <!-- Blog Area Start-->
            <li class="dropdown">
                  <a class="nav-link menu-title" href="javascript:void(0)">
                      <i class="fa fa-newspaper-o"></i>
                      <span style="margin-left: 5px;">Manage Blog</span>
                  </a>

                  <ul class="nav-submenu menu-content">
                  <li><a href="{{route('create.category')}}"><i class="fa fa-plus"></i> Add Category</a></li>
                    <li><a href="{{route('create.blog')}}"><i class="fa fa-pencil"></i> Write Blog</a></li>
                    <li><a href="{{route('all.blog')}}"><i class="fa fa-list"></i> All Blog's</a></li>
                  </ul>

            </li>
             <!-- Blog Area Start-->
             
           <!-- Profile Area Start-->
            <li class="dropdown">
                  <a class="nav-link menu-title" href="javascript:void(0)">
                      <i class="fa fa-user"></i>
                      <span style="margin-left: 5px;">Manage Profile</span>
                  </a>

                  <ul class="nav-submenu menu-content">
                    <li><a href="{{route('edit.profile')}}"><i class="fa fa-edit"></i>Edit profile</a></li>
                 
                  </ul>

            </li>
             <!-- Profile Area Start-->

             <!-- Banner Area Start-->
            <li class="dropdown">
                  <a class="nav-link menu-title" href="javascript:void(0)">
                      <i class="fa fa-cog"></i>
                      <span style="margin-left: 5px;">Manage Website</span>
                  </a>

                  <ul class="nav-submenu menu-content">
                    <li><a href="{{route('manage.content')}}"><i class="fa fa-file-text-o"></i> Change Content</a></li>
                  </ul>

            </li>
             <!-- banner Area Start-->
            

           
            
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
    </nav>
</header>
<!-- Page Sidebar Ends-->
