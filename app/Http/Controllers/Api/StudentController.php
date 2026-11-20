<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return StudentResource::collection(Student::all());
    }

    public function store(StoreStudentRequest $request): StudentResource
    {
        $student = Student::create($request->validated());

        return new StudentResource($student);
    }

    public function show(Student $student): StudentResource
    {
        return new StudentResource($student);
    }

    public function update(UpdateStudentRequest $request, Student $student): StudentResource
    {
        $student->update($request->validated());

        return new StudentResource($student);
    }

    public function destroy(Student $student): Response
    {
        $student->delete();

        return response()->noContent();
    }
}
