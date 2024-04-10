<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\TagCreateForm;

class TagCreate extends Component
{

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $slug = '';

    public function store() {

        $this->validate();

        $tag = new Tag();
        $tag->name = strtolower($this->name);
        $tag->slug = $this->slug;
        $tag->save();

        $this->name = '';
        $this->slug = '';

        session()->flash('message', 'Tag created successfully.');


    }

    public function render()
    {
        return view('livewire.tag-create');
    }
}
