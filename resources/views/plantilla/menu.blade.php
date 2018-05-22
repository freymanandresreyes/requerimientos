<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar menu_ocultar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">



        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-tags "></i><span class="hide-menu">Caja</span></a>
          <ul aria-expanded="true" class="collapse">
            <li><a href="{{ route('caja_registradora') }}">Abrir caja</a></li> 
              <li><a href="{{ route('ver_facturas') }}">Ver facturas</a></li>     
              <li><a href="{{ route('caja_menor') }}">Caja Menor</a>
              <li><a href="{{ route('ver_entradas') }}">Entradas Caja Menor</a></li>
              <li><a href="{{ route('ver_salidas') }}">Salidas Caja Menor</a></li>
            </li>
          </ul>
        </li>
        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-reload "></i><span class="hide-menu">Devoluciones</span></a>
          <ul aria-expanded="true" class="collapse">
            <li><a href="{{ route('crear_devoluciones') }}">crear</a></li>
            <li><a href="{{ route('ver_devolucion') }}">ver</a></li>
          </ul>
        </li>

        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" ti-package"></i><span class="hide-menu">Productos</span></a>
          <ul aria-expanded="true" class="collapse">
            <li><a href="{{ route('crear_productos') }}">Crear productos</a></li>
            <li><a href="{{ route('compras') }}">Compras</a></li>
            <li><a href="{{ route('listarcompras') }}">Aceptar Compras</a></li>
            <li><a href="{{ route('ver_productos') }}">Admin promociones</a></li>
          </ul>
        </li>

        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-truck"></i><span class="hide-menu">Remisiones</span></a>
          <ul aria-expanded="true" class="collapse">
            <li><a href="{{route('crear_remisiones')}}">Crear </a></li>
          </ul>
        </li>

        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-bag"></i><span class="hide-menu">Tiendas</span></a>
          <ul aria-expanded="true" class="collapse">
            <li><a href="{{route('crear_tienda')}}">Tiendas</a></li>
            <li><a href="{{ route('control_cajas') }}">Control Cajas</a></li>
            <li><a href="{{ route('control_tiendas') }}">Control Tiendas</a></li>
          </ul>
        </li>

        <li>
          <a href="{{ route('bonos') }}" class="collapse" href="javascript:void(0)" aria-expanded="true">
                      <i class="ti-gift"></i>
                      <span class="hide-menu">Reg. Bonos</span>
                    </a>
        </li>

        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-chart"></i><span class="hide-menu">Informes</span></a>
          <ul aria-expanded="true" class="collapse">
            {{--
            <li><a href="{{route('informes')}}">freyman</a></li> --}}
            <li><a href="{{ route('info_diario') }}">Inf. Diario</a></li>
            <li><a href="{{ route('info_ventas') }}">inf. ventas</a></li>
            <li><a href="{{ route('info_compras') }}">inf. Compras</a></li>
            {{--
            <li><a href="{{ route('control_tiendas') }}">Control Tiendas</a></li> --}}
          </ul>
        </li>

        <li>
          <a href="{{ route('configuraciones') }}" class="collapse " href="javascript:void(0)" aria-expanded="true">
                      <i class="mdi mdi-wrench"></i>
                      <span class="hide-menu">Configuraciones</span>
                    </a>
        </li>

        <!-- Menú de administracion de usuarios roles y permisos -->
        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-badge "></i><span class="hide-menu">Roles y permisos</span></a>
          <ul aria-expanded="true" class="collapse">
            <li><a href="{{ url('listado_usuarios')}}">Listado Usuarios</a></li>
          </ul>
        </li>
        <!-- Fin menu -->
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->