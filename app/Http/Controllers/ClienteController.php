<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    //
    function index(Request $request)
    /**
     * Builds a query to retrieve 'cliente' records, optionally filtering by search term.
     *
     * If the 'search' parameter is present in the request, filters results where
     * either 'cliente_nombre' or 'cliente_apellido' contains the search term.
     *
     * @param \Illuminate\Http\Request $request The incoming HTTP request containing optional search parameter.
     * @return \Illuminate\Database\Eloquent\Builder The query builder instance for 'cliente'.
     */
    {
        $query = cliente::query();
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('cliente_nombre', 'like', '%' . $request->search . '%')
                    ->orWhere('cliente_apellido', 'like', '%' . $request->search . '%');
            });
        }

        $perPage = $request->get('per_page', 7);
        $cliente = $query->paginate($perPage);

        // Mantener parámetros en la paginación
        $cliente->appends($request->query());
      ///  dd(  $cliente);

       // return view('cliente.index', compact('cliente')); // Assuming you have a view named 'cliente.index'
        return view('cliente.index',compact('cliente'));
    }
    public function create(){
       // return view('cliente.create');
    }
    public function store(Request $request){
        
        $request->validate([
        'archivo' => 'required|file|max:2048|mimes:jpg,png,pdf,doc,docx'
    ]);
    
    if ($request->hasFile('archivo')) {
        $archivo = $request->file('archivo');
        
        if ($archivo->isValid()) {
            $extension = $archivo->extension();
            $nombre = time() . '.' . $extension;
            
            $path = $archivo->storeAs('uploads', $nombre, 'public');

            $request->merge([
                
                'cliente_foto' => 'http://localhost/storage/'.''.$path,
                'cliente_fecha_creacion' => now()->toDateTimeString(),
                'cliente_fechaactualizacion' => now()->toDateTimeString()
                
            ]);

          

           
            cliente::create($request->all()) ;
            return response()->json([
                'success' => true,
                'path' => $path
            ]);
        }
    }

        
       
       

       

    }

    public function edit($id)
    {
       
        dd($id);
        return $cliente; 
    
    }

    function update(Request $request, $id ){
          $val=explode("/",$request->input('archivodb'));
          //dd($val[5]);
        
        //  dd($request->hasFile('archivo'));
           
         // dd($request->hasFile('archivo'));
         
         if ($request->hasFile('archivo')) {
              $archivo = $request->file('archivo');
             
        
         if ($archivo->isValid()) {
           // dd(Storage::disk('public')->exists('uploads/1755998765.jpg')); 1755820583.jpg
             
              if (Storage::disk('public')->exists('uploads/'.$val[5])) {
              Storage::disk('public')->delete('uploads/'.$val[5]);
             }
           

                 
            $extension = $archivo->extension();
            $nombre = time() . '.' . $extension;
            
            $path = $archivo->storeAs('uploads', $nombre, 'public');

             

            $request->merge([
                
                'cliente_foto' => 'http://localhost/storage/'.''.$path,
                'cliente_fecha_creacion' => now()->toDateTimeString(),
                'cliente_fechaactualizacion' => now()->toDateTimeString()
                
            ]);
           }else {
                $request->merge([
                'cliente_fecha_creacion' => now()->toDateTimeString(),
                'cliente_fechaactualizacion' => now()->toDateTimeString()
                
            ]);

          
           }
            $cliente = Cliente::find($id); // $id es el ID del cliente que estás editando
            $cliente->update($request->all()); // ✅ Esto actualiza correctamente
              return response()->json([
                'success' => true,
                'path' => $path
            ]);

    } 
}
 function delete(Request $request, $id ){

     $cliente = Cliente::find($id); 
     $cliente->delete(); 
       return response()->json([
                'success' => true
                
            ]);

 }

}
