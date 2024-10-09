<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseRequest;
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
    public function store(ClasseRequest $request)
    {
        // Validar os dados
        $request->validated();

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
    public function edit(Classe $classe)
    {
        // Carregar a view
        return view('classes.edit', [
            'classe' => $classe,
            'course' => $classe->course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClasseRequest $request, Classe $classe)
    {
        // Validar os dados
        $request->validated();

        // Atualizar a aula
        $classe->update([
            'name' => $request->name,
            'description' => $request->description,
            'order_classe' => $request->order_classe,
        ]);
        
        // Redirecionar para a página de aulas  
        return redirect()->route('classe.index', ['course' => $classe->course_id])->with('success', 'Aula atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        // Deletar a aula
        $classe->delete();

        // Redirecionar para a página de aulas
        return redirect()->route('classe.index', ['course' => $classe->course_id])->with('success', 'Aula deletada com sucesso!');
    }
}
