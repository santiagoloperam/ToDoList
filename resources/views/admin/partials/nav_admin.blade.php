<ul class="sidebar-menu" data-widget="tree">
        <li class="header"><h5><b>MENÚ DE TAREAS</b></h5></li>
        

           
             

             <li {{ request()->is('admin.categorias.index') ? 'class=active' : ''}}><a href="{{ route('admin.categorias.index') }}"><i class="fa fa-tag"></i>Categorias</a></li>

            <li {{ request()->is('admin.actividades.index') ? 'class=active' : ''}}><a href="{{ route('admin.actividades.index') }}"><i class="fa fa-list"></i>Actividades</a></li>

            
        
        <li {{ request()->is('admin') ? 'class=active' : ''}}>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-sign-out">
            </i> <span>Salir</span>
          </a>         
   
          <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
  </ul>
    