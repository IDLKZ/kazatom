<?php

namespace App\Http\Livewire\Instructor;

use App\Category;
use App\Level;
use Livewire\Component;

class CreateCourse extends Component
{
    public $step1 = 'active dstepper-block';
    public $step2 = 'dstepper-none';
    public $step3 = 'dstepper-none';

    public $categories;
    public $levels;

    public $title;
    public $short_description;
    public $description;
    public $deadline;
    public $category_id;
    public $level_id;

    protected $rules = [
        'title' => 'required|min:5',
        'short_description' => 'max:75',
        'description' => 'required',
        'deadline' => 'date'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeCourse()
    {
        dd($this->deadline);
        $this->validate();
    }








    public function mount()
    {
        $this->categories = Category::all();
        $this->levels = Level::all();

    }

    public function render()
    {
        return view('livewire.instructor.create-course');
    }
}
