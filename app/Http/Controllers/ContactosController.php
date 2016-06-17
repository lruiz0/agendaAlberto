<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;



class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($userId)
    {
        
        return "esto es el formulario del nuevo contacto y tu id es : ".$userId;
    }

    /**
     * Guardar un contacto en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /**
    *Reglas de validacion de un contacto:
    *Debe tener un nombre y dos apellidos, un email, una fecha de nacimiento, un telefono de maximo 9 caracteres
    *y si se sube una imagen debe pesar como mucho 2 Megas.
    */

        $this->validate($request, [
            'nombre' => 'bail|required|max:255',
            'apellido1' => 'required|max:255',
            'apellido2' => 'required|max:255',
            'email'=>'required',
            'fechaNacimiento'=>'required',
            'telefono'=>'required|max:9',
            'foto'=>'max:2000',
            'foto' => 'mimes:jpeg,gif,png'
        ]);

        


        $img_data=null;
        $base64=null;
        $mime=null;
        //Obtenemos los datos de la imagen si la tiene
         if(Input::file("foto")){

            $img_path=Input::file('foto')->getRealPath();
            $img_data = file_get_contents($img_path);
            $type = pathinfo($img_path, PATHINFO_EXTENSION);
            $base64 = base64_encode($img_data);
            
            $mime = \Input::file('foto')->getMimeType();
            //$extension = strtolower(\Input::file('foto')->getClientOriginalExtension());
        
    
         }
         //Creamos el registro del contacto en la base de datos
        \App\Contacto::create([
            'nombre'=>$request->input('nombre'), 
            'apellido1'=>$request->input('apellido1'),
            'apellido2'=>$request->input('apellido2'),
            'email'=>$request->input('email'), 
            'fechaNacimiento'=>$request->input('fechaNacimiento'), 
            'sueldoBruto'=>$request->input('sueldo'), 
            'foto'=>$base64,
            'tipoImagen'=>$mime,
            'telefono'=>$request->input('telefono'),
            'user_id'=>$request->input('user_id')
            ]);
       // return redirect('/')->with('status', 'El contacto ha sido agregado');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId=$id;
        //Busca todos los contactos cuyo que pertenezcan al Id del usuario 
        $contactos = \App\Contacto::where('user_id', $userId)
               ->orderBy('nombre', 'asc') // para que salgan los contactos por orden alfabetico
               ->get();

        return view ('normal/index',['contactos'=>$contactos, 'userId'=>$userId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function formularioNuevoContacto($userId)
    {
        return view ('normal/crearContacto',['userId'=>$userId]);
    }

    public function adminIndex($userId){

       
        //Busca todos los contactos cuyo que pertenezcan al Id del usuario 
        $contactos = \App\Contacto::where('user_id', $userId)
               ->orderBy('nombre', 'asc') //Para que salgan los contactos por orden alfabetico
               ->get();

        return view ('admin/index',['contactos'=>$contactos, 'userId'=>$userId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contacto = \App\Contacto::findOrFail($id);

     $this->validate($request, [
            'nombre' => 'bail|required|max:255',
            'apellido1' => 'required|max:255',
            'apellido2' => 'required|max:255',
            'email'=>'required',
            'fechaNacimiento'=>'required',
            'telefono'=>'required|max:9',
            'foto'=>'max:2000',
            'foto' => 'mimes:jpeg,gif,png'
        ]);

$input = $request->all();

    $contacto->fill($input);
        if(Input::file("foto")){

            $img_path=Input::file('foto')->getRealPath();
            $img_data = file_get_contents($img_path);
            $type = pathinfo($img_path, PATHINFO_EXTENSION);
            $base64 = base64_encode($img_data);
            
            $mime = \Input::file('foto')->getMimeType();
            //$extension = strtolower(\Input::file('foto')->getClientOriginalExtension());
        
            $contacto->foto=$base64;
            $contacto->tipoImagen=$mime;
         }
    


    $contacto->save();



    return redirect()->back()->with('status', 'El contacto '.$contacto->nombre.' '.$contacto->apellido1.' '.$contacto->apellido2.' ha sido modificado');
    }

    public function editarContacto($id)
    {
          $contacto = \App\Contacto::findOrFail($id);
            return view('admin.modificarContacto')->with('contacto', $contacto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       \App\Contacto::destroy($id);
       //return redirect('/')->with('status', 'El contacto ha sido borrado');
       return redirect()->back()->with('status', 'El contacto ha sido borrado');
    }

    public function buscarContacto(Request $request, $userId)
    {
        $usuario=\App\User::find($userId);
        $nombre=$request->input('nombre');
       $contactos=\App\Contacto::where([
            ['nombre', $nombre],
            ['user_id', $userId]
        ])->get();

        if($contactos->isEmpty() || is_null($contactos)){
             return redirect()->back()->with('errorCustom', 'No existen contactos con ese nombre');

        }else{

            if($usuario->rolId==1){
                return view ('admin/index',['contactos'=>$contactos, 'userId'=>$userId]);
            }else{
                return view ('normal/index',['contactos'=>$contactos, 'userId'=>$userId]);
            }
            
        }
        
    }
}
