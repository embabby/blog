<header class="main-header">
  <a href="{{route('admin.dashboard')}}" class="logo">
    <span class="logo-lg"><b>Admin Dashboard</b></span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only"> </span>
    </a>
  </nav>
</header>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
      </div>
      <div class="pull-left info">
      </div>
    </div>
    
    <ul class="sidebar-menu">
      

       <!--Categories-->
      <li class="treeview {{(Route::current()->getName() == 'category.index' || Route::current()->getName() =='category.create') ? 'active' : '' }}" >
    
        <a href="#">
          <i class="fa fa-dashboard"></i> <span> Categories </span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">

          <li class="{{(Route::current()->getName() == 'category.index') ? 'active' : ''}}"><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> all </a></li>

          <li class="{{(Route::current()->getName() == 'category.create') ? 'active' : ''}}"><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i> create </a></li>

        </ul>
      </li>
      <!--END Categories-->


      <!--Posts-->
      <li class="treeview {{(Route::current()->getName() == 'post.index' || Route::current()->getName() =='category.post') ? 'active' : '' }}" >
    
        <a href="#">
          <i class="fa fa-dashboard"></i> <span> Posts </span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">

          <li class="{{(Route::current()->getName() == 'post.index') ? 'active' : ''}}"><a href="{{route('post.index')}}"><i class="fa fa-circle-o"></i> all </a></li>

          <li class="{{(Route::current()->getName() == 'post.create') ? 'active' : ''}}"><a href="{{route('post.create')}}"><i class="fa fa-circle-o"></i> create </a></li>

        </ul>
      </li>
      <!--END Posts-->


      <li>
          <li><a href="{{route('admin.logout')}}"><i class="fa fa-circle-o"></i>logout</a></li>
      </li>

      </ul>

  </section>

</aside>
