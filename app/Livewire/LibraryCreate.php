<?php

namespace App\Livewire;

use App\Models\Library;
use Livewire\Component;
use Livewire\Attributes\Validate;

class LibraryCreate extends Component
{


    // FIXME: For some reason my validation isn't working.
    #[Validate('required|unique:libraries,name|min:3')]
    public $name = '';

    #[Validate('required|unique:libraries,slug|min:3')]
    public $slug = '';

    #[Validate('required|unique:libraries,url|min:7')]
    public $url = '';

    public function store() {
        $this->validate();

        $library = new Library();
        $library->name = strtolower($this->name);
        $library->slug = str_replace(' ','-',strtolower($this->slug));
        $library->url = strtolower($this->url);

        $library->save();

        $this->name = '';
        $this->slug = '';
        $this->url = '';

        session()->flash('message', 'Library successfully added.');
    }

    public function render()
    {
        return view('livewire.library-create');
    }
}
