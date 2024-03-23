<x-guest-layout>

<!-- ====== Forms Section Start -->
            <div class="rounded-sm border border-stroke bg-white shadow-default m-20" >
              <div class="flex flex-wrap items-center">
                <div class="hidden w-full xl:block xl:w-1/2">
                  <div class="px-26 py-17.5 text-center">
                    
                    <span class="mt-15 inline-block">
                      <img src="https://asoteapy.org.py/wp-content/uploads/2023/12/Corazon-Autismo-300x253.png" alt="illustration" />
                    </span>
                  </div>
                </div>
                <div class="w-full border-stroke xl:w-1/2 xl:border-l-2" >
                  <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
                    <h2 class="mb-9 text-2xl font-bold text-black sm:text-title-xl2" >
                      Inicia Sesión en TEA PY App
                    </h2>
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('login') }}">
                        @csrf
                      <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black ">E-mail</label >
                        <div class="relative">
                          <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none"/>

                          <span class="absolute right-4 top-4">
                            <i class="fa-regular fa-envelope fill-current"></i>
                          </span>
                        </div>
                      </div>

                      <div class="mb-6">
                        <label class="mb-2.5 block font-medium text-black " >Contraseña</label>
                        <div class="relative">
                          <input id="password" type="password" name="password" required autocomplete="current-password"
                            type="password" class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none" />

                          <span class="absolute right-4 top-4">
                            <i class="fa-solid fa-lock"></i>
                          </span>
                        </div>
                      </div>

                      <div class="mb-5">
                        <input type="submit" value="Iniciar Sesión" class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90" />
                      </div>

                      <div class="mt-6 text-center">
                        <p class="font-medium">
                            No tenes cuenta?
                            <a href="{{ route('register') }}" class="text-primary">Click aqui.</a>
                        </p>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- ====== Forms Section End -->

</x-guest-layout>
