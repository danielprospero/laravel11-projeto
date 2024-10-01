<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function create()
    {
        return view('courses.create');
    }

    public function edit()
    {
        return view('courses.edit');
    }

    public function show()
    {
        return view('courses.show');
    }

    public function delete()
    {
        return view('courses.delete');
    }

    public function update()
    {
        return view('courses.update');
    }

    public function store()
    {
        return view('courses.store');
    }

}
