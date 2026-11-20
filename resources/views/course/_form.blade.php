<x-form-input name="name" label="Course Name" :value="$course->name" />

<x-form-textarea name="description" label="Description" :value="$course->description" />

<x-form-input name="duration" label="Duration (weeks)" type="number"
              :value="$course->duration" min="1" />

<x-form-input name="fee" label="Fee" type="number"
              :value="$course->fee" min="0" step="0.01" />

<div class="form-group">
    <label for="difficulty">Difficulty</label>
    <select name="difficulty" id="difficulty">
        @foreach(['Easy', 'Medium', 'Hard'] as $level)
            <option value="{{ $level }}"
                @selected(old('difficulty', $course->difficulty) === $level)>
                {{ $level }}
            </option>
        @endforeach
    </select>
    @error('difficulty')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group checkbox">
    <label>
        <input type="checkbox" name="is_active" value="1"
            @checked(old('is_active', $course->is_active ?? true))>
        Active
    </label>
    @error('is_active')
        <p class="error">{{ $message }}</p>
    @enderror
</div>