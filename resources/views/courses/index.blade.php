<!DOCTYPE html>
<html>
<head>
    <title>Courses List</title>
</head>
<body>

    <h1>Courses List</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="/courses/create">Add New Course</a>

    <br><br>

    @if($courses->count() > 0)

        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ $course->fee }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>{{ $course->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="/courses/{{ $course->id }}">View</a>

                        <a href="/courses/{{ $course->id }}/edit">Edit</a>

                        <form action="/courses/{{ $course->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

    @else
        <p>No courses found.</p>
    @endif

    <br>
    <a href="/students">Go to Students</a>

</body>
</html>
