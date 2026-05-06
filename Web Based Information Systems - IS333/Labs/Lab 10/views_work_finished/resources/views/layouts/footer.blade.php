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
