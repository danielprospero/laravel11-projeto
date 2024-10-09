<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function index()
    {

        $courses = Course::paginate(10);

        return view('courses.index', [
            'courses' => $courses
        ]);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course
        ]);
    }

    public function show(Course $course)
    {
        return view('courses.show', [
            'course' => $course
        ]);
    }


    public function destroy(Course $course)
    {
        
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso deletado com sucesso!');
    }
      
    public function update(CourseRequest $request, Course $course)
    {
        $request->validated();
        
        $course->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->route('courses.index')->with('success', 'Curso atualizado com sucesso!');
    }

    public function store(CourseRequest $request)
    {
        $request->validated();
        Course::create([
            'name' => $request->name,
            'price' => $request->price
        ]);
        
        return redirect()->route('courses.create')->with('success', 'Curso criado com sucesso!');
    }

}
