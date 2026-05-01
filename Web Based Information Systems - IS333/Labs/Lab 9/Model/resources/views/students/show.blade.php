@extends('layouts.app')

@section('title', $student->student_name)

@section('content')
    <h2>{{ $student->student_name }}</h2>

    <div>
        @if ($student->student_image_path)
            <img src="{{ $student->student_image_path }}" alt="{{ $student->student_name }}" style="max-width: 250px;">
        @else
            <p>No Image Available</p>
        @endif
    </div>

    <div>
        <p>
            <strong>Email:</strong>
            <a href="mailto:{{ $student->student_email }}">{{ $student->student_email }}</a>
        </p>

        <p>
            <strong>Gender:</strong>
            {{ ucfirst($student->student_gender) }}
        </p>

        <p>
            <strong>ID:</strong>
            {{ $student->id }}
        </p>

        <p>
            <strong>Created At:</strong>
            {{ $student->created_at->format('M d, Y H:i A') }}
        </p>

        <p>
            <strong>Last Updated:</strong>
            {{ $student->updated_at->format('M d, Y H:i A') }}
        </p>
    </div>

    <hr>

    <div>
        <a href="{{ route('students.edit', $student->id) }}">Edit</a>
        <a href="{{ route('students.index') }}">Back to List</a>
        <button type="button" onclick="openDeleteModal('deleteModal')">Delete</button>
    </div>

    <h3>Quick Actions</h3>
    <ul>
        <li>
            <a href="{{ route('students.edit', $student->id) }}">Edit Student</a>
        </li>
        <li>
            <a href="{{ route('students.index') }}">View All Students</a>
        </li>
        <li>
            <a href="{{ route('students.create') }}">Add New Student</a>
        </li>
    </ul>

    <!-- Delete Modal -->
    <div id="deleteModal" style="display: none;">
        <div>
            <h5>Confirm Delete</h5>
            <button onclick="closeDeleteModal('deleteModal')">&times;</button>
        </div>
        <div>
            <p>Are you sure you want to delete <strong>{{ $student->student_name }}</strong>?</p>
            <p>This action cannot be undone.</p>
        </div>
        <div>
            <button type="button" onclick="closeDeleteModal('deleteModal')">Cancel</button>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeDeleteModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
    </script>
@endsection
