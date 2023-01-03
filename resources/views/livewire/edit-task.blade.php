<div>
    @if(! empty($task))
        <div class="card task-edit-card">
            <h2>Task Editing</h2>

            <div class="card-body">
                @error('description') <span class="error">- {{ $message }}</span> @enderror
                <form class="edit-task" wire:submit.prevent="submit">
                    <div class="form-group">
                        <label>
                            <input wire:model="description" class="form-text" type="text">
                        </label>
                        <button class="btn btn-todo">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
