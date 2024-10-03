<aside x-bind:class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
  class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear lg:static lg:translate-x-0"
  x-on:click.outside="sidebarToggle = false"
>
  <!-- SIDEBAR HEADER -->
  <div class="flex items-center px-12 py-2">
    <a href="{{ route('dashboard') }}" class="items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark">
      <img src="https://asoteapy.org.py/wp-content/uploads/2023/08/logo-grande.png" alt="Logo TeaPy">
    </a>

    <button
      class="block lg:hidden"
      @click.stop="sidebarToggle = !sidebarToggle"
    >
      <i class="fa-solid fa-arrow-left-long fill-current text-xl text-bodydark1"></i>
      
    </button>
  </div>
  <!-- SIDEBAR HEADER -->

  <div
    class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear"
  >
    <!-- Sidebar Menu -->
    <nav
      class="mt-5 px-4 py-4 lg:px-6"
      x-data="{selected: $persist('Dashboard')}"
    >
      <!-- Menu Group -->
      <div>
        <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</h3>

        <ul class="mb-6 flex flex-col gap-1.5">

          <!-- Menu Item Calendar -->
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark {{ Request::routeIs('dashboard') ? 'bg-graydark' : '' }}"
              href="{{ route('dashboard') }}" >
              <i class="fa-solid fa-grip fill-current"></i>
              Dashboard
            </a>
          </li>
          <!-- Menu Item Calendar -->

          <!-- Menu Item Profile -->
          @can('listar paciente')
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark {{ Request::routeIs('personas') ? 'bg-graydark' : '' }}"
              href="{{ route('pacientes') }}" >
              <i class="fa-solid fa-people-line fill-current"></i>
              Pacientes
            </a>
          </li>
          @endcan
          <!-- Menu Item Profile -->

          <!-- Menu Item Agendamiento -->
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark "
              href="#"
              x-on:click.prevent="selected = (selected === 'Agendamiento' ? '':'Agendamiento')" >
              <i class="fa-regular fa-calendar-days fill-current"></i>
              Agendamiento
              
              <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 fill-current" 
              x-bind:class="{ 'rotate-180': (selected === 'Agendamiento') }"></i>
            </a>

            <!-- Dropdown Menu Start -->
            <div class="translate transform overflow-hidden"  x-bind:class="(selected === 'Agendamiento') ? 'block' :'hidden'">
              <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
              @can('agendar paciente')
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ Request::routeIs('agendamiento.consultorios') ? 'bg-graydark' : '' }}"
                  href="{{ route('agendamiento.consultorios') }}">
                        Calendario x Dia
                  </a>
                </li>
              @endcan
              </ul>
            </div>
            <!-- Dropdown Menu End -->
          </li>
          <!-- Menu Item Agendamiento -->

          <!-- Menu Item Configuraciones -->
          @can('manejar configuraciones')
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark "
              href="#"
              x-on:click.prevent="selected = (selected === 'Configuraciones' ? '':'Configuraciones')" >
              <i class="fa-solid fa-gear fill-current"></i>
            Configuraciones
              
              <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 fill-current" 
              x-bind:class="{ 'rotate-180': (selected === 'Configuraciones') }"></i>
            </a>

            <!-- Dropdown Menu Start -->
            <div class="translate transform overflow-hidden"  x-bind:class="(selected === 'Configuraciones') ? 'block' :'hidden'">
              <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                @can('manejar usuarios')
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ Request::routeIs('usuarios') ? 'bg-graydark' : '' }}"
                  href="{{ route('usuarios') }}">
                        Usuarios
                  </a>
                </li>
                @endcan
                @can('manejar enfermedades')
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ Request::routeIs('enfermedades') ? 'bg-graydark' : '' }}"
                  href="{{ route('enfermedades') }}">
                        Enfermedades
                  </a>
                </li>
                @endcan
                @can('manejar tratamientos')
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ Request::routeIs('tratamientos') ? 'bg-graydark' : '' }}"
                  href="{{ route('tratamientos') }}">
                        Tratamientos
                  </a>
                </li>
                @endcan
                @can('manejar aspectos')
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ Request::routeIs('aspectos') ? 'bg-graydark' : '' }}"
                  href="{{ route('aspectos') }}">
                        Aspectos
                  </a>
                </li>
                @endcan
                @can('manejar conductas')
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ Request::routeIs('conductas') ? 'bg-graydark' : '' }}"
                  href="{{ route('conductas') }}">
                        Conductas
                  </a>
                </li>
                @endcan
                @can('manejar consultorios')
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ Request::routeIs('consultorios') ? 'bg-graydark' : '' }}"
                  href="{{ route('consultorios') }}">
                        Consultorios
                  </a>
                </li>
                @endcan
                @can('manejar especialidades')
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ Request::routeIs('especialidades') ? 'bg-graydark' : '' }}"
                  href="{{ route('especialidades') }}">
                        Especialidades
                  </a>
                </li>
                @endcan
                @can('listar medico')
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white {{ Request::routeIs('profesionales') ? 'bg-graydark' : '' }}"
                  href="{{ route('profesionales') }}">
                        Profesionales
                  </a>
                </li>
                @endcan

              </ul>
            </div>
            <!-- Dropdown Menu End -->
          </li>
          @endcan
          <!-- Menu Item Configuraciones -->

        </ul>
      </div>
    </nav>
    <!-- Sidebar Menu -->

  </div>
</aside>