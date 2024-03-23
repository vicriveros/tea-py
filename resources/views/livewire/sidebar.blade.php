<aside x-bind:class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
  class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear lg:static lg:translate-x-0"
  x-on:click.outside="sidebarToggle = false"
>
  <!-- SIDEBAR HEADER -->
  <div class="flex items-center px-12 py-2">
    <a href="index.html" class="items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark">
      <img src="https://asoteapy.org.py/wp-content/uploads/2023/08/logo-grande.png" alt="Logo TeaPy">
    </a>
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
              class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark "
              href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" >
              <i class="fa-solid fa-grip fill-current"></i>
              Dashboard
            </a>
          </li>
          <!-- Menu Item Calendar -->

          <!-- Menu Item Profile -->
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark "
              href="profile.html" >
            <i class="fa-solid fa-gear fill-current"></i>
            Item 2
            </a>
          </li>
          <!-- Menu Item Profile -->

          <!-- Menu Item Configuraciones -->
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark "
              href="#"
              x-on:click.prevent="selected = (selected === 'Configuraciones' ? '':'Configuraciones')" >
              <i class="fa-solid fa-gear fill-current"></i>
            Configuraciones
              
              <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 fill-current" 
              x-bind:class="{ 'rotate-180': (selected === 'Dashboard') }"></i>
            </a>

            <!-- Dropdown Menu Start -->
            <div class="translate transform overflow-hidden"  x-bind:class="(selected === 'Configuraciones') ? 'block' :'hidden'">
              <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                  href="#">
                        Grupos de Usuarios
                  </a>
                </li>
              </ul>
            </div>
            <!-- Dropdown Menu End -->
          </li>
          <!-- Menu Item Configuraciones -->

        </ul>
      </div>
    </nav>
    <!-- Sidebar Menu -->

  </div>
</aside>