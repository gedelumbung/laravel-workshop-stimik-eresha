<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Grade;
use App\Course;
use App\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::get();

        return view('student.index', compact('students'));
    }

    public function add()
    {
        $action = 'add';
        $data = [
            'id' => '',
            'name' => '',
            'birth_place' => '',
            'birth_date' => Carbon::now(),
            'address' => '',
        ];
        return view('student.form', compact('action', 'data'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        if ($student) {
            $action = 'update';
            $data = [
                'id' => $student->id,
                'name' => $student->name,
                'birth_place' => $student->birth_place,
                'birth_date' => $student->birth_date,
                'address' => $student->address,
            ];
            return view('student.form', compact('action', 'data'));
        }

        return redirect()->route('students.index');
    }

    public function save()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'action' => 'required|in:add,update'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (request()->action === 'add') {
            Student::create([
                'name' => request()->name,
                'birth_place' => request()->birth_place,
                'birth_date' => request()->birth_date,
                'address' => request()->address,
            ]);

            return redirect()->route('students.index');
        } else {
            $student = Student::find(request()->id);
            if ($student) {
                $student->name = request()->name;
                $student->birth_place = request()->birth_place;
                $student->birth_date = request()->birth_date;
                $student->address = request()->address;
                $student->save();

                return redirect()->route('students.index');
            }
    
            return redirect()->route('students.index');
        }
    }

    public function delete($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();

            return redirect()->route('students.index');
        }

        return redirect()->route('students.index');
    }

    public function grades($id)
    {
        $student = Student::find($id);
        if ($student) {
            return view('student.grade.index', compact('student'));
        }

        return redirect()->route('students.index');
    }

    public function addGrade($id)
    {
        $action = 'add';
        $data = [
            'id' => '',
            'student_id' => $id,
            'course_id' => '',
            'grade' => '',
        ];
        $courses = Course::get();
        return view('student.grade.form', compact('action', 'data', 'courses'));
    }

    public function editGrade($id, $gradeId)
    {
        $grade = Grade::find($gradeId);
        if ($grade) {
            $action = 'update';
            $data = [
                'id' => $grade->id,
                'course_id' => $grade->course_id,
                'student_id' => $grade->student_id,
                'grade' => $grade->grade,
            ];
            $courses = Course::get();
            return view('student.grade.form', compact('action', 'data', 'courses'));
        }

        return redirect()->route('students.grades');
    }

    public function saveGrade($id)
    {
        $validator = Validator::make(request()->all(), [
            'course_id' => 'required',
            'grade' => 'required',
            'action' => 'required|in:add,update'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (request()->action === 'add') {
            Grade::create([
                'course_id' => request()->course_id,
                'grade' => request()->grade,
                'student_id' => $id
            ]);

            return redirect()->route('students.grades', ['id' => $id]);
        } else {
            $grade = Grade::find(request()->id);
            if ($grade) {
                $grade->course_id = request()->course_id;
                $grade->grade = request()->grade;
                $grade->save();

                return redirect()->route('students.grades', ['id' => $id]);
            }
    
            return redirect()->route('students.grades', ['id' => $id]);
        }
    }

    public function deleteGrade($id, $gradeId)
    {
        $grade = Grade::where('student_id', $id)->where('id', $gradeId)->first();
        if ($grade) {
            $grade->delete();

            return redirect()->route('students.grades', ['id' => $id]);
        }

        return redirect()->route('students.grades', ['id' => $id]);
    }
}
