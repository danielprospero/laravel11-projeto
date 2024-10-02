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

    public function edit()
    {
        return view('courses.edit');
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

    public function update()
    {
        return view('courses.update');
    }

    public function store(Request $request)
    {
        Course::create([
            'name' => $request->name
        ]);
        
        return redirect()->route('courses.create')->with('success', 'Curso criado com sucesso!');
    }

}
