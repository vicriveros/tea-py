<header class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1" >
  <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11" >
   
    <div class=" sm:block"> </div>

    <div class="flex items-center gap-3 2xsm:gap-7">
     

      <!-- User Area -->
      <div
        class="relative"
        x-data="{ dropdownOpen: false }"
        @click.outside="dropdownOpen = false"
      >
        <a
          class="flex items-center gap-4"
          href="#"
          @click.prevent="dropdownOpen = ! dropdownOpen"
        >
          <span class="text-right lg:block">
            <span class="block text-sm font-medium text-black "
              >{{ Auth::user()->name }}</span
            >
            <span class="block text-xs font-medium">{{ Auth::user()->roles->pluck('name')[0] ?? '' }}</span>
          </span>
          <i class="fa-solid fa-chevron-down fill-current sm:block" 
              x-bind:class="dropdownOpen && 'rotate-180'"></i>
        </a>

        <!-- Dropdown Start -->
        <div
          x-show="dropdownOpen"
          class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-default ">

            <ul class="flex flex-col gap-5 border-b border-stroke px-6 py-7.5 " >
                <li>
                <a href="{{ route('profile.show') }}"
                    class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                    <i class="fa-regular fa-user fill-current"></i>
                    Perfil
                </a>
                </li>
            
            </ul>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a href="{{ route('logout') }}" 
                @click.prevent="$root.submit();"
                class="flex items-center gap-3.5 px-6 py-4 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                <i class="fa-solid fa-right-from-bracket fill-current"></i>
                Cerrar Sesion
                </a>
            </form>
        </div>
        <!-- Dropdown End -->
      </div>
      <!-- User Area -->
    </div>
  </div>
</header>
