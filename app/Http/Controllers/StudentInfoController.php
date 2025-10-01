<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentInfo;

class StudentInfoController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:posts,email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        try {
            // Handle file upload
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move('images', $fileName, 'public');

            // $filePath = $file->storeAs('images', $fileName, 'public');

            // Save student data
            $student = new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->image = $filePath; // Store the file path
            $student->save();

            return response()->json(['res' => 'Student added successfully', 'filePath' => $filePath]);

        } catch (\Exception $e) {
            return response()->json(['res' => 'Error: ' . $e->getMessage()], 500);
        }
    }
	public function getAllStudentinfomation()
	{
        $students = StudentInfo::all();
        return response()->json(['students' => $students]);
	}
}