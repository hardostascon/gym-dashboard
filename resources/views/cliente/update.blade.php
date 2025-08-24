<div x-data="{ open: false }">
    <!-- Botón para abrir modal -->
  
     <span class="w-8 h-8 cursor-pointer hover:opacity-80" @click="open = true">
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>
</span>

   
     
     @if(isset($id))
      @php
        $cliente = App\Models\cliente::find($id);
        $noLineBreaks = str_replace(["\r\n", "\n", "\r"], ' ', $cliente->cliente_direccion);
      @endphp
      @endif

   
     <div x-data="{
                apellidos: '{{$cliente->cliente_apellido }}',
                email: '{{$cliente->cliente_email }}',
                nombres: '{{$cliente->cliente_nombre }}',
                cedula: '{{$cliente->cliente_cedula }}',
                fechanacimiento: '{{$cliente->cliente_fechanacimiento}}',
                sexo: '{{$cliente->cliente_genero}}',
                direccion: '{{ $noLineBreaks }}',
                observacionm: '{{$cliente->cliente_observacionmedica}}',
                contacto: '{{$cliente->cliente_contactoemer}}',  
                telefono:'{{$cliente->cliente_telefono}}',
                archivoup: null,
                archivodb: '{{$cliente->cliente_foto}}',
                errores: {},
                handleFile(event) {
                   
                    this.archivoup = event.target.files[0] || null;
                   
                },
               async enviarFormulario() {
                    this.errores = {}; // resetear errores
                    let formData = new FormData();
                    if (this.fechanacimiento === '') {
                        this.errores.fechanacimiento = 'La fecha es obligatoria.';
                    } else if (new Date(this.fechanacimiento) > new Date()) {
                        this.errores.fechanacimiento = 'La fecha no puede ser en el futuro.';
                    }
                    if (this.cedula.trim() === '') {
                        this.errores.cedula = 'La cedula es obligatoria.';
                    }

                    if (this.telefono.trim() === '') {
                        this.errores.telefono = 'El telefono es obligatorio.';
                    }
                    if (this.apellidos.trim() === '') {
                        this.errores.apellidos = 'El Apellido es obligatorio.';
                    }
            
                    if (this.direccion.trim() === '') {
                        this.errores.direccion = 'La direccion es obligatoria.';
                    }
            
                    if (this.contacto.trim() === '') {
                        this.errores.contacto = 'El contacto es obligatoria.';
                    }
            
                    if (this.observacionm.trim() === '') {
                        this.errores.observacionm = 'La observacion medica es obligatoria.';
                    }
            
                    if (this.nombres.trim() === '') {
                        this.errores.nombres = 'El nombre es obligatorio.';
                    }
                    if (this.email.trim() === '') {
                        this.errores.email = 'El email es obligatorio.';
                    } else if (!this.email.includes('@')) {
                        this.errores.email = 'Email no válido.';
                    }
                    if (this.sexo === '') {
                        this.errores.sexo = 'Debes seleccionar un sexo.';
                    }
            
                   /* if (!this.archivoup) {
                        this.errores.archivo = 'Debes seleccionar un archivo.';
                    } else*/
                    if (this.archivoup && !['image/jpeg', 'image/png'].includes(this.archivoup.type)) {
                        this.errores.archivoup = 'Solo se permiten JPG, PNG .';
                    } else if (this.archivoup && this.archivoup.size > 2 * 1024 * 1024) {
                        this.errores.archivoup= 'El archivo no puede superar los 2MB.';
                    }

                    formData.append('cliente_nombre', this.nombres);
                    formData.append('cliente_apellido', this.apellidos);
                    formData.append('cliente_cedula', this.cedula);
                    formData.append('cliente_telefono', this.telefono);
                    formData.append('cliente_email', this.email);
                    formData.append('cliente_direccion', this.direccion);
                    formData.append('cliente_genero', this.sexo);
                    formData.append('cliente_fechanacimiento', this.fechanacimiento);
                    formData.append('cliente_contactoemer', this.contacto);
                    formData.append('cliente_observacionmedica', this.observacionm);
                    

                    cliente_registro = new Date().toISOString().split('T')[0];
                    formData.append('cliente_registro', cliente_registro);
                    
                    formData.append('cliente_estado', 'AC');

                    formData.append('archivo', this.archivoup);
                    formData.append('archivodb', this.archivodb);
            
                    if (Object.keys(this.errores).length === 0) {
                        try {
                            let response = await fetch('{{ route('cliente.update',$id) }}', {
                            method: 'POST',
                            headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                          },
                           body: formData
                      });

                      if (!response.ok) throw await response.json();
                            console.log(response);
                            alert('Formulario enviado con éxito ✅'); 
                            this.open = false; // Cerrar modal
                        }catch(error){
                           alert('Error al enviar el formulario:' + error.message);
                        }
                        
                    }
                }
            }">

    <!-- Modal -->
    <div 
        x-show="open" 
        x-transition 
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

        <div class="bg-white rounded-lg shadow-lg w-[730px] p-6">
            <h2 class="text-xl font-bold mb-4">Actualizar Cliente</h2>

           
           
              <form @submit.prevent="enviarFormulario" action="{{ route('cliente.update',$id) }}" class="space-y-6"
                        method="POST" enctype="multipart/form-data">
                         @csrf
                        <div class="sm:col-span-4">
                            <label for="cedula" class="block text-sm/6 font-medium text-gray-900">Cedula</label>
                            <div class="mt-2">
                                <input id="text" type="text" x-model="cedula" name="cedula"
                                    autocomplete="cedula"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                <p x-text="errores.cedula" class="text-red-500" x-text="error"></p>
                            </div>
                        </div>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-2">
                                <label for="Nombres" class="block text-sm/6 font-medium text-gray-900">Nombres</label>
                                <div class="mt-2">
                                    <input id="nombres" type="text" name="nombres" autocomplete="given-name" value="{{$cliente->cliente_nombre }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        x-model="nombres" />
                                    <p x-text="errores.nombres" class="text-red-500" x-text="error"></p>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="apellidos"
                                    class="block text-sm/6 font-medium text-gray-900">Apellidos</label>

                                <div class="mt-2">
                                    <input id="apellidos" type="text" name="apellidos" autocomplete="family-name"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        x-model="apellidos" />

                                    <p x-text="errores.apellidos" class="text-red-500" x-text="error"></p>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="email" class="block text-sm/6 font-medium text-gray-900">Correo
                                    Electronico</label>

                                <div class="mt-2">
                                    <input id="email" type="email" name="email" autocomplete="email"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        x-model="email" />

                                    <p x-text="errores.email" class="text-red-500" x-text="error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="fechanacimiento" class="block text-sm/6 font-medium text-gray-900">Fecha de
                                    Nacimiento</label>
                                <div class="mt-2">
                                    <input type="date" id="fechanacimiento" name='fechanacimiento'
                                        x-model="fechanacimiento"
                                        class="form-input block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                <p x-text="errores.fechanacimiento" class="text-red-500 text-sm"></p>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="sexo" class="block text-sm/6 font-medium text-gray-900">Sexo</label>
                                <div class="mt-2">
                                    <select id="sexo" x-model="sexo" name="sexo" autocomplete="country-name"
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value="">-- Selecciona un sexo --</option>
                                        <option>M</option>
                                        <option>F</option>

                                    </select>
                                    <p x-text="errores.sexo" class="text-red-500 text-sm"></p>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="direccion"
                                    class="block text-sm/6 font-medium text-gray-900">Direccion</label>
                                <div class="mt-2">
                                    <input id="direccion" type="text" name="direccion" x-model="direccion"
                                        autocomplete="direccion"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                    <p x-text="errores.direccion" class="text-red-500 text-sm"></p>
                                </div>
                            </div>

                             <div class="sm:col-span-2">
                                <label for="Telefono"
                                    class="block text-sm/6 font-medium text-gray-900">Telefono</label>

                                <div class="mt-2">
                                    <input id="telefono" type="text" name="telefono" autocomplete="telefono"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        x-model="telefono" />

                                    <p x-text="errores.telefono" class="text-red-500" x-text="error"></p>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="contacto" class="block text-sm/6 font-medium text-gray-900">Contacto de
                                    Emergencia</label>
                                <div class="mt-2">
                                    <input id="contacto" type="text" name="contacto" x-model="contacto"
                                        autocomplete="contacto"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                    <p x-text="errores.contacto" class="text-red-500 text-sm"></p>
                                </div>
                            </div>


                            <div class="col-span-full">
                                <label for="contact" class="block text-sm/6 font-medium text-gray-900">Observaciones
                                    Medicas</label>
                                <div class="mt-2">
                                    <input id="observacionm" type="text" x-model="observacionm"
                                        name="observacionm" autocomplete="observacionm"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                    <p x-text="errores.observacionm" class="text-red-500 text-sm"></p>
                                </div>
                            </div>


                            <div class="col-span-full">
                                <input id="archivodb"  type="hidden" name="archivodb" x-model="archivodb" /> 
                                <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Cover
                                    photo</label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon"
                                            aria-hidden="true" class="mx-auto size-8 text-gray-300">
                                            <path
                                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                                clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm/6 text-gray-600">
                                            <label for="archivoup"
                                                class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-600 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-600 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="archivoup" type="file" name="archivoup" class="sr-only"
                                                    @change="handleFile" />
                                                <p x-text="errores.archivoup" class="text-red-500 text-sm"></p>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>

                            <button @click="open = false" class="bg-gray-300 px-3 py-1 rounded hover:bg-gray-400">
                                Cancelar
                            </button>
                            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                Aceptar
                            </button>
                    </form>
        </div>
    </div>
</div>