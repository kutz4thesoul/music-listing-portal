<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Livewire\Attributes\Validate;

class TagCreate extends Component
{

    #[Validate('required|unique:tags,name|min:3')]
    public $name = '';

    #[Validate('required|unique:tags,slug|min:3')]
    public $slug = '';

    public function store() {

        $this->validate();

        $tag = new Tag();
        $tag->name = strtolower($this->name);
        $tag->slug = str_replace(' ','-',strtolower($this->slug));
        $tag->save();

        $this->name = '';
        $this->slug = '';

        session()->flash('message', 'Tag successfully created.');

    }

    public function render()
    {
        return view('livewire.tag-create');
    }
}
