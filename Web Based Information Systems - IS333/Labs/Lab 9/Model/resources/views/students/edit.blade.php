@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="student_name">Student Name <span>*</span></label>
            <input type="text" id="student_name" name="student_name" value="{{ old('student_name', $student->student_name) }}" required>
            @error('student_name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="student_email">Email Address <span>*</span></label>
            <input type="email" id="student_email" name="student_email" value="{{ old('student_email', $student->student_email) }}" required>
            @error('student_email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="student_gender">Gender <span>*</span></label>
            <select id="student_gender" name="student_gender" required>
                <option value="">-- Select Gender --</option>
                <option value="male" {{ old('student_gender', $student->student_gender) === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('student_gender', $student->student_gender) === 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('student_gender')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="student_image_path">Image Path</label>
            <input type="text" id="student_image_path" name="student_image_path" value="{{ old('student_image_path', $student->student_image_path) }}" placeholder="/images/student.jpg">
            @if ($student->student_image_path)
                <div>
                    <small>Current Image:</small>
                    <img src="{{ $student->student_image_path }}" alt="{{ $student->student_name }}" style="max-width: 150px;">
                </div>
            @endif
            <small>Enter the path or URL to the student's image</small>
            @error('student_image_path')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit">Update Student</button>
            <a href="{{ route('students.index') }}">Cancel</a>
        </div>
    </form>
@endsection