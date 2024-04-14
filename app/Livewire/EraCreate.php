<?php

namespace App\Livewire;

use App\Models\Era;
use Livewire\Component;
use Livewire\Attributes\Validate;

class EraCreate extends Component
{
    #[Validate('required|unique:tags,name|min:3')]
    public $name;

    #[Validate('required|unique:tags,name|min:3')]
    public $slug;

    public function store() {

        $this->validate();

        $era = new Era();
        $era->name = strtolower($this->name);
        $era->slug = str_replace(' ','-',strtolower($this->slug));
        $era->save();

        $this->name = '';
        $this->slug = '';

        session()->flash('message', 'Era successfully created.');

    }

    public function render()
    {
        return view('livewire.era-create');
    }
}
