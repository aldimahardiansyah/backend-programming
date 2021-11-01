<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    function index()
    {
        $students = Students::all();

        $hasil = [
            'message' => 'Get all students',
            'data' => $students
        ];

        return response()->json($hasil, 200);
    }

    function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Students::create($input);

        $data = [
            'message' => 'Student is created',
            'data' => $student
        ];
        return response()->json($data, 201);
    }
}
