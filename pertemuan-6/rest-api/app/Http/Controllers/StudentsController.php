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

    function show($id)
    {
        $student = Students::find($id);
        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }
    }

    function update($id, Request $request)
    {
        $student = Students::find($id);

        if ($student) {
            $student->update([
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ]);
            $data = [
                'message' => 'Data is updated',
                'data' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }
    }

    function destroy($id)
    {
        $student = Students::find($id);
        if ($student) {
            $student->delete();
            $hasil = [
                "message" => "Student id $id has been deleted",
                "data" => $this->index()
            ];
            return $hasil;
        } else {
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }
    }
}
