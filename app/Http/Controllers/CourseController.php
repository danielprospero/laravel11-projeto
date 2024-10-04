<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

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


    public function delete()
    {
        return view('courses.delete');
    }

    public function update(Request $request, Course $course)
    {
        $course->update([
            'name' => $request->name
        ]);

        return redirect()->route('courses.index')->with('success', 'Curso atualizado com sucesso!');
    }

    public function store(Request $request)
    {
        Course::create([
            'name' => $request->name
        ]);
        
        return redirect()->route('courses.create')->with('success', 'Curso criado com sucesso!');
    }

}
