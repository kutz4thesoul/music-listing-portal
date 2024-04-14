<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Instrument;
use Livewire\Attributes\Validate;

class InstrumentCreate extends Component
{

    #[Validate('required|unique:instruments,name|min:3')]
    public $name;
    #[Validate('required|unique:instruments,slug|min:3')]
    public $slug;

    public function store() {
            
            $this->validate();
    
            $instrument = new Instrument();
            $instrument->name = strtolower($this->name);
            $instrument->slug = str_replace(' ','-',strtolower($this->slug));
            $instrument->save();
    
            $this->name = '';
            $this->slug = '';
    
            session()->flash('message', 'Instrument successfully created.');
    }

    public function render()
    {
        return view('livewire.instrument-create');
    }
}
