<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['group', 'subject'])->get();
        return view('crud.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        $subjects = Subject::all();
        return view('crud.students.create', compact('groups', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest  $request)
    {
        $student = Student::create($request->validated());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $user->person()->create([
            'name' => $request->name,
            'username' => $request->username,
            'birth_day' => $request->birth_day,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
            'IsMarried' => $request->IsMarried,
            'Status' => $request->Status ?? true,
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = 'avatar' . '-' .  $user->person->id . time() . '-' .  $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $user->person->update([
            'profile_picture' => $profile
        ]);


        $user->person->Student()->create([
            'group_id' => $request->group_id,
            'subject_id' => $request->subject_id,
        ]);
        // $user->assignRole('Student');

        return redirect()->route('students.index')->with('success', 'تم إضافة الطالب بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('crud.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $groups = Group::all();
        $subjects = Subject::all();
        return view('crud.students.edit', compact('student', 'groups', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest  $request, Student $student)
    {
        $student->update($request->validated());
        return redirect()->route('students.index')->with('success', 'تم تحديث الطالب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'تم حذف الطالب بنجاح');
    }
}
