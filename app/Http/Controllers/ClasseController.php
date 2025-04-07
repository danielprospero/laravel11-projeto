<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Course;
use Illuminate\Support\Facades\Log;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {   
        // Buscar todas as aulas do curso
        $classes = Classe::with('course')->where('course_id', $course->id)->orderBy('order_classe')->get();

        // log 
        Log::info('Listando aulas do curso: ' . $course->name);
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

        DB::beginTransaction();

        try {
            // Buscar a última aula do curso
            $lastOrderClasse = Classe::where('course_id', $request->course_id)->orderBy('order_classe', 'desc')->first();
            // Criar uma nova aula
            Classe::create([
                'name' => $request->name,
                'description' => $request->description,
                'order_classe' => $lastOrderClasse ? $lastOrderClasse->order_classe + 1 : 1,
                'course_id' => $request->course_id
            ]);
            // log 
            Log::info('Aula criada: ' . $request->name);
            DB::commit();
            // Redirecionar para a página de aulas
            return redirect()->route('classe.index', ['course' => $request->course_id])->with('success', 'Aula criada com sucesso!');
        } catch (\Exception $e) {
            // Desfazer a transação
            DB::rollBack();
            // log
            Log::warning('Erro ao criar aula: ' . $e->getMessage());
            // Redirecionar para a página de aulas
            return redirect()->route('classe.index', ['course' => $request->course_id])->with('error', 'Não foi possível criar a aula!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        // log
        Log::info('Exibindo aula: ' . $classe->name);
        // Carregar a view
        return view('classes.show', [
            'classe' => $classe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        // Carregar a view
        return view('classes.edit', [
            'classe' => $classe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClasseRequest $request, Classe $classe)
    {
        // Validar os dados
        $request->validated();

        // Iniciar a transação
        DB::beginTransaction();
        try {
            // Atualizar a aula
            $classe->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            // Atualizar a ordem das aulas
            DB::commit();
            // log
            Log::info('Aula atualizada: ' . $request->name);
            // Redirecionar para a página de aulas
            return redirect()->route('classe.index', ['course' => $classe->course_id])->with('success', 'Aula atualizada com sucesso!');
        } catch (\Exception $e) {
            // Desfazer a transação
            DB::rollBack();
            // log
            Log::warning('Erro ao atualizar aula: ' . $e->getMessage());
            // Redirecionar para a página de aulas
            return redirect()->route('classe.index', ['course' => $classe->course_id])->with('error', 'Não foi possível atualizar a aula!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {   
        // Iniciar a transação
        DB::beginTransaction();
        try {
            // Deletar a aula
            $classe->delete();
            // Atualizar a ordem das aulas
            DB::commit();
            // log
            Log::info('Aula deletada: ' . $classe->name);
            // Redirecionar para a página de aulas
            return redirect()->route('classe.index', ['course' => $classe->course_id])->with('success', 'Aula deletada com sucesso!');
        } catch (\Exception $e) {
            // Desfazer a transação
            DB::rollBack();
            // log
            Log::warning('Erro ao deletar aula: ' . $e->getMessage());
            // Redirecionar para a página de aulas
            return redirect()->route('classe.index', ['course' => $classe->course_id])->with('error', 'Não foi possível deletar a aula!');
        }
    }
}
