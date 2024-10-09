<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Course;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {   
        // Buscar todas as aulas do curso
        $classes = Classe::with('course')->where('course_id', $course->id)->orderBy('order_classe')->get();

        // Carregar a view
        return view('classes.index', [
            'classes' => $classes,
            'course' => $course
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        // Carregar a view
        return view('classes.create', [
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar os dados
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'course_id' => 'required'
        ]);

        // Buscar a última aula do curso
        $lastOrderClasse = Classe::where('course_id', $request->course_id)->orderBy('order_classe', 'desc')->first();

        // Criar uma nova aula
        Classe::create([
            'name' => $request->name,
            'description' => $request->description,
            'order_classe' => $lastOrderClasse ? $lastOrderClasse->order_classe + 1 : 1,
            'course_id' => $request->course_id
        ]);

        // Redirecionar para a página de aulas
        return redirect()->route('classe.index', ['course' => $request->course_id])->with('success', 'Aula criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
