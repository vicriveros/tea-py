<div>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <h1 class="text-title-lg font-bold text-black text-center my-3">
                Bienvenido a la aplicación TEA PY.
            </h1>
            <p class="text-blueGray-500 text-lg text-center my-3 mb-4">
                Estas son las citas confirmadas:
            </p>

    <div x-data="{ activeTab: 1 }" class="max-w-3xl mx-auto">
        <!-- Tabs -->
        <div class="flex space-x-4 mx-3">
            <button 
                @click="activeTab = 1"
                :class="{'bg-primary text-white': activeTab === 1, 'bg-gray-200 text-black': activeTab !== 1}"
                class="px-4 py-2 rounded-lg focus:outline-none transition-colors duration-300">
                Hoy
            </button>
            <button 
                @click="activeTab = 2"
                :class="{'bg-primary text-white': activeTab === 2, 'bg-gray-200 text-black': activeTab !== 2}"
                class="px-4 py-2 rounded-lg focus:outline-none transition-colors duration-300">
                Mañana
            </button>
            <button 
                @click="activeTab = 3"
                :class="{'bg-primary text-white': activeTab === 3, 'bg-gray-200 text-black': activeTab !== 3}"
                class="px-4 py-2 rounded-lg focus:outline-none transition-colors duration-300">
                Siguentes 7 dias
            </button>
        </div>

        <!-- Tab Content -->
        <div class="mt-6 mx-3">
            <!-- Tab 1 Content -->
            <div x-show="activeTab === 1" class="p-6 bg-white rounded-lg  border border-strokedark mb-4">
                <h3 class="text-xl text-black font-bold my-5 pb-2 border-b border-strokedark"> {{ date('d-m-Y', strtotime($hoy)) }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($agendamientos as $cita)
                        <span><i class="fa-solid fa-user text-primary"></i> {{ $cita->paciente_nombre }} - {{ $cita->hora_desde }}. {{ $cita->obs }}</span>
                    @endforeach
                </div>
            </div>

            <!-- Tab 2 Content -->
            <div x-show="activeTab === 2" class="p-6 bg-white rounded-lg  border border-strokedark mb-4">
                <h3 class="text-xl text-black font-bold my-5 pb-2 border-b border-strokedark"> {{ date('d-m-Y', strtotime($manana)) }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($agendamientos as $cita)
                        @if($cita->fecha == $manana)
                            <span><i class="fa-solid fa-user text-primary"></i> {{ $cita->paciente_nombre }} - {{ $cita->hora_desde }}. {{ $cita->obs }}</span>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Tab 3 Content -->
            <div x-show="activeTab === 3" class="p-6 bg-white rounded-lg  border border-strokedark mb-4">
            @php $previousDate = null; @endphp

            @foreach ($agendamientos as $cita)
                @if ($previousDate !== $cita->fecha)
                    @if ($previousDate !== null)
                        </div> 
                    @endif

                    <h3 class="text-xl text-black font-bold my-5 pb-2 border-b border-strokedark">{{ date('d-m-Y', strtotime($cita->fecha)) }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @endif

                <span><i class="fa-solid fa-user text-primary"></i> {{ $cita->paciente_nombre }} - {{ $cita->hora_desde }}. {{ $cita->obs }}</span>

                @php $previousDate = $cita->fecha; @endphp
            @endforeach

            @if ($previousDate !== null)
                </div>
            @endif

        </div>
    </div>




    </div>
</div>
</div>
