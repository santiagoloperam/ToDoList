<ul class="sidebar-menu" data-widget="tree">
        <li class="header"><h5><b>MENÚ SUPERADMIN</b></h5></li>
                  
            <li {{ request()->is('super_admin.users.index') ? 'class=active' : ''}}><a href="{{ route('super_admin.users.index') }}"><i class="fa fa-users"></i>Usuarios</a></li>            

  
        
        <li {{ request()->is('super_admin') ? 'class=active' : ''}}>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-sign-out">
            </i> <span>Salir</span>
          </a>         
   
          <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
  </ul>
    