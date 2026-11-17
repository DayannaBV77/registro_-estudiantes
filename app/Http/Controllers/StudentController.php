<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $estudiantes = Student::latest()->get();
        $students = $estudiantes;

        return view('student', compact('estudiantes', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'nullable|string|max:100',
            'email' => 'required|email|unique:students,email',
            'telefono' => 'nullable|string|max:20',
            'curso' => 'nullable|string|max:100',
            'edad' => 'nullable|integer|min:0',
        ]);

        Student::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'curso' => $request->curso,
            'edad' => $request->edad,
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante registrado correctamente.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado.');
    }
}
