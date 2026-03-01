@csrf

<div>
    <label>Título</label>
    <input 
        type="text" 
        name="title" 
        value="{{ old('title', $task->title ?? '') }}" 
        required
    >
</div>

<div>
    <label>Descrição</label>
    <textarea 
        name="description"
    >{{ old('description', $task->description ?? '') }}</textarea>
</div>

<div>
    <label>Status</label>
    <select name="status" required>
        @foreach(\App\Enums\TaskStatus::cases() as $status)
            <option 
                value="{{ $status->value }}"
                @selected(old('status', $task->status->value ?? '') === $status->value)
            >
                {{ ucfirst(str_replace('_', ' ', $status->value)) }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit">
    Salvar
</button>
