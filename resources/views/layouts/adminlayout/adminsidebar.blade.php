
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/addcategory')}}">Add Category</a></li>
        <li><a href="{{url('/admin/viewcategory')}}">View Categories</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/addproduct')}}">Add Product</a></li>
        <li><a href="{{url('/admin/viewproduct')}}">View Product</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/addcoupon')}}">Add Coupons</a></li>
        <li><a href="{{url('/admin/viewcoupon')}}">View Coupons</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Tickets</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/viewticket')}}">View Tickets</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->