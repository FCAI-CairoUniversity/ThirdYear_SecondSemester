@extends('layouts.app')

@section('title', 'Students List')

@section('content')
    <h2>Students List</h2>
    <a href="{{ route('students.create') }}">
        + Add New Student
    </a>

    @if ($students->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->student_email }}</td>
                        <td>{{ ucfirst($student->student_gender) }}</td>
                        <td>
                            @if ($student->student_image_path)
                                <img src="{{ $student->student_image_path }}" alt="{{ $student->student_name }}" style="max-width: 50px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}">View</a>
                            <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $student->student_name }}?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div>
            <h5>No students found</h5>
            <p>Get started by <a href="{{ route('students.create') }}">adding a new student</a></p>
        </div>
    @endif
@endsection
