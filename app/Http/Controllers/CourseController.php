<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $courses = Course::paginate(10);

        Log::info('Listando cursos');

        return view('courses.index', [
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        DB::beginTransaction();
        try{
            $request->validated();
            Course::create([
                'name' => $request->name,
                'price' => $request->price
            ]);
            Log::info('Curso criado: ' . $request->name);
            DB::commit();
            return redirect()->route('course.create')->with('success', 'Curso criado com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::worning('Erro ao criar curso: ' . $e->getMessage());
            return redirect()->route('course.create')->with('error', 'Erro ao criar curso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {

        Log::info('Exibindo curso: ' . $course->name);
        return view('courses.show', [
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        DB::beginTransaction();
        try{
            $request->validated();
            
            $course->update([
                'name' => $request->name,
                'price' => $request->price
            ]);
            DB::commit();
            Log::info('Curso atualizado: ' . $request->name);
            return redirect()->route('course.index')->with('success', 'Curso atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::warning('Erro ao atualizar curso: ' . $e->getMessage());
            return redirect()->route('course.edit', $course)->with('error', 'Erro ao atualizar curso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        DB::beginTransaction();
        try {
            $course->delete();
            DB::commit();
            Log::info('Curso deletado: ' . $course->name);
            return redirect()->route('course.index')->with('success', 'Curso deletado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::warning('Erro ao deletar curso: ' . $e->getMessage());
            return redirect()->route('course.index')->with('error', 'Não foi possível deletar o curso, pois existem aulas associadas a ele!');
        }

    }
}
