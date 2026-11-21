<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
</head>
<body>

    <h1>Add New Course</h1>

    @if($errors->any())
        <div>
            <h3>Please fix the following errors:</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/courses" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <br><br>

        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>
        <br><br>

        <label>Duration (hours):</label>
        <input type="number" name="duration" value="{{ old('duration') }}" required>
        <br><br>

        <label>Fee:</label>
        <input type="number" step="0.01" name="fee" value="{{ old('fee') }}" required>
        <br><br>

        <label>Difficulty:</label>
        <select name="difficulty" required>
            <option value="">Select Difficulty</option>
            <option value="Easy" {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>Easy</option>
            <option value="Medium" {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>Medium</option>
            <option value="Hard" {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>Hard</option>
        </select>
        <br><br>

        <label>
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', true) ? 'checked' : '' }}>
            Active
        </label>
        <br><br>

        <button type="submit">Add Course</button>
    </form>

    <br>
    <a href="/courses">Back to Courses</a>

</body>
</html>
