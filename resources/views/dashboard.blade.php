<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   <div class="container mx-auto p-4">
  <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

  <div class="flex flex-col md:flex-row gap-4">

    <div class="bg-white rounded-lg shadow-md p-4 w-full md:w-1/3">
      <div class="flex items-center gap-4">
        <div class="bg-blue-100 text-blue-500 rounded-full p-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3 1.343 3 3v2a3 3 0 01-3 3 3 3 0 01-3-3v-2c0-1.657 1.343-3 3-3z" />
          </svg>
        </div>
        <div>
          <p class="text-gray-500 text-sm font-semibold">Ingreso Diario</p>
          <p class="text-2xl font-bold text-gray-800">50</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-4 w-full md:w-1/3">
      <div class="flex items-center gap-4">
        <div class="bg-green-100 text-green-500 rounded-full p-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 10-8 0 4 4 0 008 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <div>
          <p class="text-gray-500 text-sm font-semibold">Nuevos Usuarios</p>
          <p class="text-2xl font-bold text-gray-800">548</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-4 w-full md:w-1/3">
      <div class="flex items-center gap-4">
        <div class="bg-yellow-100 text-yellow-500 rounded-full p-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2m-4 0V3m0 2v2m0-2h4m-4 0h4m0-2v2m0-2h4m-4 0h4m-4 0h4" />
          </svg>
        </div>
        <div>
          <p class="text-gray-500 text-sm font-semibold">Clientes Registrado en promociones</p>
          <p class="text-2xl font-bold text-gray-800">75</p>
        </div>
      </div>
    </div>

  </div>
</div>


    <div class="container mx-auto p-4 ">
        <h2 class="text-xl font-semibold mb-4">Últimas Actividades</h2>
         
    <div class="flex flex-col md:flex-row gap-4">   

      

     <div class="bg-white rounded-lg shadow-md p-4 w-full md:w-1/3">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Actividades Recientes</h3>
        <ul class="space-y-4 divide-y divide-gray-200">
            <li class="py-3 first:pt-0">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 10-8 0 4 4 0 008 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0 ml-4">
                        <p class="text-gray-700 text-sm">Usuario Juan Pérez se ha registrado.</p>
                        <span class="text-xs text-gray-500">Hace 1 hora</span>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0 ml-4">
                        <p class="text-gray-700 text-sm">La siguiente Clase grupal empezó.</p>
                        <span class="text-xs text-gray-500">Hace 1 hora</span>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 10-8 0 4 4 0 008 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0 ml-4">
                        <p class="text-gray-700 text-sm">El Instructor de planta Carlos ha ingresado</p>
                        <span class="text-xs text-gray-500">Hace 5 horas</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
       
      <div class="bg-white rounded-lg shadow-md p-4 w-full md:w-1/3">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Clientes Ingresados Hoy</h3>
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="bg-green-100 text-green-500 rounded-full p-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 10-8 0 4 4 0 008 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <div>
              <p class="text-2xl font-bold text-gray-800">23</p>
              <p class="text-sm text-gray-500">Activos ahora</p>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-md p-4 w-full md:w-1/3">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Próximas Clases</h3>
        <div class="space-y-3">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-800">Yoga Matutino</p>
              <p class="text-xs text-gray-500">08:00 AM - Sala 1</p>
            </div>
            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">En 30 min</span>
          </div>
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-800">CrossFit</p>
              <p class="text-xs text-gray-500">10:00 AM - Sala 2</p>
            </div>
            <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">En 2h</span>
          </div>
        </div>
      </div>


    </div>
    
   
<div class="container mx-auto p-4">
  <h2 class="text-xl font-semibold mb-4">Instructores Grupales</h2>

  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="px-4 py-3 md:px-6">
              Instructor 
            </th>
            <th scope="col" class="px-4 py-3 md:px-6">
              Jornada
            </th>
            <th scope="col" class="px-4 py-3 md:px-6">
              Horario
            </th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b hover:bg-gray-50">
            <td class="px-4 py-4 md:px-6">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 10-8 0 4 4 0 008 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <div class="min-w-0">
                  <div class="text-sm font-semibold text-gray-900">Carlos Rodríguez</div>
                  <div class="text-xs text-gray-500">Instructor Principal</div>
                </div>
              </div>
            </td>
            <td class="px-4 py-4 md:px-6">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                Mañana
              </span>
            </td>
            <td class="px-4 py-4 md:px-6">
              <div class="flex items-center">
                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2 flex-shrink-0"></div>
                <span class="text-sm text-gray-900">08:00 AM</span>
              </div>
            </td>
          </tr>
          <tr class="bg-white border-b hover:bg-gray-50">
            <td class="px-4 py-4 md:px-6">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 10-8 0 4 4 0 008 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <div class="min-w-0">
                  <div class="text-sm font-semibold text-gray-900">María González</div>
                  <div class="text-xs text-gray-500">Instructora de Yoga</div>
                </div>
              </div>
            </td>
            <td class="px-4 py-4 md:px-6">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                Tarde
              </span>
            </td>
            <td class="px-4 py-4 md:px-6">
              <div class="flex items-center">
                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2 flex-shrink-0"></div>
                <span class="text-sm text-gray-900">02:00 PM</span>
              </div>
            </td>
          </tr>
         
        </tbody>
      </table>
    </div>
  </div>
</div>
    
    
</x-admin-layout>
