<div class="card task-card">
    <div class="card-body">
        <h1>Create Task</h1>

        @error('description') <span class="error">- {{ $message }}</span> @enderror

        <form class="create-task" wire:submit.prevent="submit">
            <label>
                <input wire:model="description" class="form-text" type="text" placeholder="Enter task description">
            </label>

            <button class="btn btn-todo">Submit</button>
        </form>
    </div>
</div>
