
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Tickets</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/cs/addticket')}}">Add Tickets</a></li>
        <li><a href="{{url('/cs/viewticket')}}">View Tickets</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/addproduct')}}">View Users</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Customer Support</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/addcoupon')}}">Open Live Chat</a></li>
        <li><a href="{{url('/admin/viewcoupon')}}">View Knowledge Base</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->