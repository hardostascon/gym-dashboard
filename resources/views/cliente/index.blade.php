<x-admin-layout>
   

<div class="w-full">
  <div class="relative overflow-x-auto bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
    <form action="{{ route('cliente') }}" method="GET" class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between p-4">
      <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative flex-1">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
        </div>
        <input
          type="search"
          id="search"
          name="search"
          value="{{ request('search') }}"
          class="block w-full p-3.9 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Buscar"
          required
        />
      </div>
      <button
        type="submit"
        class="w-full sm:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Buscar
      </button>
    </form>
    <div class="flex flex-col sm:flex-row gap-2 px-6 py-3">
      @include('cliente.create')
    </div>
  </div>
</div>
<div class="overflow-x-auto">
  <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-4 py-3.5">
          Cliente 
        </th>
        <th scope="col" class="px-5 py-3">
          Fecha de Ingreso
        </th>
        <th scope="col" class="px-5 py-3">
          Edad
        </th>
        <th scope="col" class="px-5 py-3">
          Sexo
        </th>
        <th scope="col" class="px-5 py-3">
          Estado 
        </th>
        <th scope="col" class="px-6 py-3">
          
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cliente as $clientes)
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
        <th scope="row" class="flex items-center px-3.5 py-4 text-gray-900 whitespace-nowrap dark:text-white">
          <img class="w-6 h-6 rounded-full" src="{{ $clientes->cliente_foto }}" alt="{{ $clientes->cliente_nombre }}">
          <div class="ps-3">
            <div class="text-base font-semibold">{{ $clientes->cliente_nombre }} - {{$clientes->cliente_apellido }}</div>
            <div class="font-normal text-gray-500">{{ $clientes->cliente_email }}</div>
          </div>  
        </th>
        <td class="px-5 py-3">
           {{ $clientes->cliente_registro }}
        </td>
        <td class="px-5 py-3">
          @php
            $fechaNacimiento = new DateTime($clientes->cliente_fechanacimiento);
            $hoy = new DateTime();
            $edad = $hoy->diff($fechaNacimiento)->y;
          @endphp
          {{ $edad }}
        </td>
        <td class="px-5 py-3">
           {{ $clientes->cliente_genero }}
        </td>
        <td class="px-5 py-3">
           {{ $clientes->cliente_estado }}
        </td>
        <td class="flex flex-col sm:flex-row gap-2 px-6 py-3">
          @include('cliente.update',['id' => $clientes->id])
          
        </td>
        <td class="flex flex-col sm:flex-row gap-2 px-6 py-3"> 
          @include('cliente.delete',['id' => $clientes->id])
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
  <div class="flex flex-1 justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
    <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
  </div>
  <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Mostrando
        <span class="font-medium">{{ $cliente->firstItem() }}</span>
        to
        <span class="font-medium">{{ $cliente->lastItem() }}</span>
        of
        <span class="font-medium">{{ $cliente->total() }}</span>
        resultados
      </p>
    </div>
    <div>
      @if ($cliente->hasPages())

       <nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-md shadow-xs">  
          @if ($cliente->onFirstPage()) 
            <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
           <span class="sr-only">Previous</span>
           <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5">
            <path d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" fill-rule="evenodd" />
           </svg>
         </a>
          @else
              <a href="{{ $cliente->previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
           <span class="sr-only">Previous</span>
           <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5">
            <path d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" fill-rule="evenodd" />
           </svg>
         </a>
          @endif


           @php
            $start = max(1, $cliente->currentPage() - 2);
            $end = min($cliente->lastPage(), $cliente->currentPage() + 2);
          @endphp
         @if ($cliente->hasPages())
          @for ($i = $start; $i <= $end; $i++)
             @if ($i == $cliente->currentPage())
  
            <a href="{{ $cliente->url($i) }}" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ $i }}</a>
            @else
           <a href="{{ $cliente->url($i) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">{{ $i }}</a>
          @endif
        @endfor
          
        @endif

           @if ($cliente->hasMorePages())
              <a href="{{ $cliente->nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
          <span class="sr-only">Next</span>
          <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5">
            <path d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
          </svg>
        </a>
           @endif 
       
       </nav>
      @endif
     
      
      
        
        <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
      <!---  <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
        <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
        <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 inset-ring inset-ring-gray-300 focus:outline-offset-0">...</span>
        <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
       
      </nav> -->
    </div>
  </div>
</div>


</x-admin-layout>