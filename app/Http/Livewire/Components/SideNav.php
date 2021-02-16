<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SideNav extends Component
{
    public function render()
    {
        $data['dateWIB'] = \Carbon\Carbon::now()->timezone('Asia/Jakarta');
        $data['dateWITA'] = \Carbon\Carbon::now()->timezone('Asia/Ujung_Pandang');
        return view('livewire.components.side-nav', $data);
    }
}
