<?php

namespace App\Http\Controllers\Admin;

use App\Specialty;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index () 
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties')); 
    }

    public function create () 
    {
        return view('specialties.create');
    }

    public function performValidation (Request $request) 
    {
        $rules = [
            'name' => 'required|max:255|min:3',
            'description' => 'required',
        ];

        $message = [
            'name.required' => 'nombre necesario',
            // 'name.unique' => 'nombre unico',
            'name.max' => 'max: 255 caracteres',
            'name.min' => 'min: 3 caracteres',
            'description.required' => 'descripcion necesaria',
        ];

        $this->validate($request, $rules, $message);

    }

    public function store (Request $request) 
    {
        $this->performValidation($request);
        
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        $notification = 'La especialidad se ha registrado correctamente';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function edit (Specialty $specialty) 
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update (Request $request, Specialty $specialty) 
    {
        $this->performValidation($request);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        $notification = 'La especialidad ha sido actualizada correctamente.';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function destroy (Specialty $specialty) 
    {
        $deletedSpecialty = $specialty->name;
        $specialty->delete();

        $notification = 'La especialidad '.$deletedSpecialty.' ha sido eliminada correctamente.';
        return redirect('/specialties')->with(compact('notification'));
    }
}
