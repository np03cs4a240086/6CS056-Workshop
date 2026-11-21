<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
</head>
<body>

    <h1>Students List</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="/students/create">Add New Student</a>

    <br><br>

    @if($students->count() > 0)

        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>

            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <a href="/students/{{ $student->id }}">View</a>

                        <a href="/students/{{ $student->id }}/edit">Edit</a>

                        <form action="/students/{{ $student->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

    @else
        <p>No students found.</p>
    @endif

</body>
</html>
