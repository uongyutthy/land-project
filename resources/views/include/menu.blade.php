{{  \App\Helpers\Menu\MenuHealper::render() }}

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="index.php">
          <i class="fa fa-home"></i> <span>Home</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cart-plus"></i>
          <span>Projects</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('project') }}"><i class="fa fa-angle-double-right"></i> New Projects</a></li>
          <li><a href="/delivery_term"><i class="fa fa-angle-double-right"></i> View Projects List</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cart-plus"></i>
          <span>Delivery Term</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-angle-double-right"></i> New Delivery Term</a></li>
          <li><a href="/delivery_term"><i class="fa fa-angle-double-right"></i> View Delivery Term List</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>