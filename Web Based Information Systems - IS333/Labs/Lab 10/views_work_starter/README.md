// To run the project 
1. composer update --no-scripts
2. composer install
3. php artisan serve
# Run the following in your terminal
php artisan serve

#check out the following routes
/students
/students/1
/students/create
/students/1/edit

********************************************************

//To Start the tutorial
# Use this project as your started code.
********************************************************
Creating layouts and extending them steps (1-8).
1. Under resources/views folder create a new folder with name "layouts"
2. Create file app.blade.php
# Use the following code:
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Management System')</title>
</head>

<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>
3. Under resources/views folder create a new folder with name "partials"
4. Create files "footer.blade.php" & "header.blade.php"

# Use the following code in "header.blade.php":
<header>
    <h1>
        <a href="{{ route('students.index') }}">
            📚 Student Management System
        </a>
    </h1>
    <nav>
        <ul>
            <li>
                <a href="{{ route('students.index') }}">All Students</a>
            </li>
            <li>
                <a href="{{ route('students.create') }}">Add Student</a>
            </li>
        </ul>
    </nav>
</header>

# Use the following code in "footer.blade.php":
<footer>
    <section>
        <h5>Student Management</h5>
        <p>Manage and track student information efficiently.</p>
    </section>
    <section>
        <h5>Quick Links</h5>
        <ul>
            <li><a href="{{ route('students.index') }}">Students List</a></li>
            <li><a href="{{ route('students.create') }}">Add New Student</a></li>
        </ul>
    </section>
    <section>
        <h5>Information</h5>
        <p>
            Built with Laravel & HTML<br>
            © {{ date('Y') }} All Rights Reserved
        </p>
    </section>
    <hr>
    <div>
        <p>Student Management System v1.0</p>
    </div>
</footer>

5. Remove all code in file resources/views/welcome.blade.php
# Use the following code in "welcome.blade.php":
@extends('layouts.app')

@section('content')
    <h1>Welcome view is now displayede</h1>
@endsection

6. Under resources/views folder create a new folder with name "students"
7. Under the "students" folder create the following files 
"index.blade.php" 
"create.blade.php" 
"edit.blade.php" 
"show.blade.php"
# Add the following code to each of the created files:
@extends('layouts.app')
@section('title', 'PAGE_NAME_GOES_HERE')
@section('content')
@endsection('content')

8. Check out the laravel docs for layouts: [text](https://laravel.com/docs/13.x/blade#building-layouts)
********************************************************

Adjusting the StudentController to call the right views and pass data step(9)
9. Replace the code in "StudentController" with the following:
<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Student::paginate(10); // to be used with css to enable pagination
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:100',
            'student_email' => 'required|email|max:100|unique:students',
            'student_gender' => 'required|in:male,female',
            'student_image_path' => 'nullable|string',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:100',
            'student_email' => 'required|email|max:100|unique:students,student_email,' . $student->id,
            'student_gender' => 'required|in:male,female',
            'student_image_path' => 'nullable|string',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
*******************************************************
Adjusting student views to work with StudentController events and data.
10. For each view under students folder use the code related from below:
# index.blade.php:

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

# create.blade.php:
@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
    <h2>Add New Student</h2>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="student_name">Student Name <span>*</span></label>
            <input type="text" id="student_name" name="student_name" value="{{ old('student_name') }}" required>
            @error('student_name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="student_email">Email Address <span>*</span></label>
            <input type="email" id="student_email" name="student_email" value="{{ old('student_email') }}" required>
            @error('student_email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="student_gender">Gender <span>*</span></label>
            <select id="student_gender" name="student_gender" required>
                <option value="">-- Select Gender --</option>
                <option value="male" {{ old('student_gender') === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('student_gender') === 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('student_gender')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="student_image_path">Image Path</label>
            <input type="text" id="student_image_path" name="student_image_path" value="{{ old('student_image_path') }}" placeholder="/images/student.jpg">
            <small>Enter the path or URL to the student's image</small>
            @error('student_image_path')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit">Create Student</button>
            <a href="{{ route('students.index') }}">Cancel</a>
        </div>
    </form>
@endsection

# edit.blade.php
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

# show.blade.php
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


# Check out the validation documentation for laravel requests: https://laravel.com/docs/13.x/validation#main-content

To test the application functionality so far
# Run the following in your terminal
php artisan serve

#check out the following routes
/students
/students/1
/students/create
/students/1/edit