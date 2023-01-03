<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;

class CompletedTasks extends Component
{
    public $tasks;

    protected $listeners = [
        'taskAdded',
        'taskCompleted'
    ];

    public function taskAdded()
    {
        $this->getTasks();
    }

    public function getTasks()
    {
	    $this->tasks = Task::where('completed_at', '!=', null)
            ->orderBy('completed_at', 'desc')
            ->get();
    }

    public function taskCompleted()
    {
        $this->getTasks();
    }

    public function returnTask($id)
    {
        $this->getTask($id);
        $this->task->completed_at = null;
        $this->task->save();

        $this->mount();

        $this->emit('taskReturned');
    }

    public function getTask($id)
    {
		$this->task = Task::findOrFail($id);

    }

    public function mount()
    {
        $this->getTasks();
    }

    public function deleteTask($id)
    {
        $this->getTask($id);
        $this->task->delete();

        $this->mount();
    }

    public function render()
    {
        return view('livewire.completed-tasks');
    }
}
