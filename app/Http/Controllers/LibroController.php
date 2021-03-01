<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Libro;
use App\GeneroLibro;
use App\Autor;
use App\Editorial;
use App\TipoLibro;
// use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();

        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editorials = Editorial::all();
        $autores = Autor::all();
        $genero_libros = GeneroLibro::all();
        $tipo_libros = TipoLibro::all();
        return view('libros.create', compact('genero_libros','autores', 'editorials','tipo_libros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'numero_serie' => 'required|unique:libros|min:17',
            'nombre' => 'required|regex:/^[a-zA-Z\s]*$/',
            'edicion' => 'required|numeric',
            'stock_libro' => 'required|numeric',
            'genero_id' => 'required',
            'autor_id' => 'required',
            'editorial_id' => 'required',
            'tipo_libro_id'=> 'required',
        ]) ;
        
        if ((Libro::where('nombre', $request->nombre)->first()) &&  (Libro::where([
            ['edicion', '=', $request->edicion],
            ['nombre', '=', $request->nombre],
            ['editorial_id', '=', $request->editorial_id]
        ])->first()) && (Libro::where('editorial_id', $request->editorial_id)->first())){
            return redirect()->back()->with('error','Este libro ya a sido registrado');
         }    

        if ($request->hasfile('imagen')) { 
            $file=$request->file('imagen');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        }    

        // $genero = new GeneroLibro();
        // // $genero = save();

        $libro = new Libro();
        $libro->genero_id = $request->genero_id;
        $libro->tipo_libro_id = $request->tipo_libro_id;
        $libro->autor_id = $request->autor_id;
        $libro->editorial_id = $request->editorial_id;
        $libro->numero_serie = $request->numero_serie ;
        $libro->nombre = $request->nombre ;
        $libro->edicion = $request->edicion ;
        $libro->stock_libro = $request->stock_libro;
        $libro->stock_fantasma = $request->stock_libro; //Aqui mi sotck fantasma recibe el valor inicial de stock de libros
        $libro->imagen = $name;
        $libro->save();

        
        // $numero_libro = strtoupper(substr($genero->genero_libros,0,3).'-'.$libro->id);
        // $libro->numero_libro = $numero_libro ;
        // $libro->save();

        
        return redirect(route('libros.index'))->with('success','Libro nuevo guardado con exito!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $editorials = Editorial::all();
        $autores = Autor::all();
        $genero_libros = GeneroLibro::all();
        $tipo_libros = TipoLibro::all();
        return view('libros.edit', compact('libro', 'genero_libros', 'autores', 'editorials','tipo_libros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $data = request()->validate([
            'numero_serie' => 'required|min:12|unique:libros,numero_serie,'.$libro->id,
            'nombre' => 'required|regex:/^[a-zA-Z\s]*$/',
            'edicion' => 'required|numeric',
            'genero_id' => 'required',
            'autor_id' => 'required',
            'tipo_libro_id'=> 'required',
        ]);
        if ((Libro::where('nombre', $request->nombre)->first()) &&  (Libro::where('edicion', $request->edicion)->first()) && (Libro::where('editorial_id', $request->editorial_id)->first())){
            return redirect()->back()->with('error','Este libro ya a sido registrado');
         } 
        
        $libro->fill($request->except('imagen'));
        if ($request->hasfile('imagen')) { 
            $file=$request->file('imagen');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        } 
        $libro->imagen = $name;
        $libro->update();
        // $libro->genero_id = $request->genero_id;
        // $libro->tipo_libro_id = $request->tipo_libro_id;
        // $libro->autor_id = $request->autor_id;
        // $libro->editorial_id = $request->editorial_id;
        // $libro->numero_serie = $request->numero_serie ;
        // $libro->nombre = $request->nombre ;
        // $libro->edicion = $request->edicion ;
        // $libro->stock_libro = $request->stock_libro;
        // $libro->imagen = $name;
        

        // $equipo->fill($request->all());
        //     $libro->fill($request->all());
        //     $libro->imagen = $name;
        //     $libro->update();
        

        
        return redirect(route('libros.index'))->with('success','Libro editado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        if ($libro->stock_libro == 0){
            $libro->delete();
            return redirect(route('libros.index'))->with('success', 'Libro '.$libro->nombre.' eliminado con éxito!');
        }else{
            return redirect(route('libros.index'))->with('error', 'Libro '.$libro->nombre.' no se puede eliminar, aun contamos con ejemplares!');
        }
        
    }
}
