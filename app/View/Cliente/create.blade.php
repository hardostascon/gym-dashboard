<div x-data="{ open: false }">
    <!-- Botón para abrir modal -->
    <button 
        @click="open = true" 
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Abrir Modal
    </button>

    <!-- Modal -->
    <div 
        x-show="open" 
        x-transition 
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
            <h2 class="text-xl font-bold mb-4">Título del Modal</h2>
            <p class="mb-4">Este es un modal básico con Alpine y Tailwind.</p>

            <div class="flex justify-end space-x-2">
                <button 
                    @click="open = false" 
                    class="bg-gray-300 px-3 py-1 rounded hover:bg-gray-400">
                    Cancelar
                </button>
                <button 
                    @click="open = false" 
                    class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>