<li class="header">MAIN NAVIGATION</li>
            <li class="active">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
             
            </li>
            <li>
              <a href="{{ route ('orders.list') }}">
                <i class="fa fa-calendar"></i> <span>Orders</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
           
            <li class="treeview {{ (Route::currentRouteName() == 'services.list' || Route::currentRouteName() == 'services.create') ? 'active' : '' }}">
              <a href="#">
              <i class="fa fa-envelope"></i> <span>Services</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ (Route::currentRouteName() == 'services.list') ? 'active' : '' }}">
                  <a href="{{ route ('services.list') }}"><i class="fa fa-circle-o"></i>Services List</a>
                </li>
                <li class="{{ (Route::currentRouteName() == 'services.create') ? 'active' : '' }}">
                  <a href="{{ route ('services.create')  }}"><i class="fa fa-circle-o"></i>Add  Service</a>
                </li>
              </ul>
            </li>
      
            <li class="{{ (Route::currentRouteName() == 'reports') ? 'active' : '' }}">
              <a href="{{ route ('report')  }}">
                <i class="fa  fa-folder"></i> <span>Reports</span>
              </a>
            </li>