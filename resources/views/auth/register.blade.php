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
                      Crea tu cuenta en TEA PY App
                    </h2>
                    <x-validation-errors class="mb-4" />

                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4.5">
                            <x-label for="name" value="{{ __('Nombre') }}" />
                            <x-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mb-4.5">
                            <x-label for="email" value="{{ __('E-mail') }}" />
                            <x-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="mb-4.5">
                            <x-label for="password" value="{{ __('Contraseña') }}" />
                            <x-input id="password" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mb-4.5">
                            <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                            <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                      

                      <div class="mb-5">
                        <input type="submit" value="Crear Cuenta" class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90" />
                      </div>

                      <div class="mt-6 text-center">
                        <p class="font-medium">
                            @if (Route::has('password.request'))
                                Ya tenes cuenta?
                            <a href="{{ route('login') }}" class="text-primary">Iniciar Sesión.</a>
                            @endif
                        </p>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- ====== Forms Section End -->

</x-guest-layout>
