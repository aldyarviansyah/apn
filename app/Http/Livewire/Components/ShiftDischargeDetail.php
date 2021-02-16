<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ShiftDischargeDetail extends Component
{
    public function render()
    {
        $data['cargos'] = [
            'Nickel Ore' => 'cargo--red',
            'Antrachite' => 'cargo--coal',
            'Local Coal' => 'cargo--coal',
            'Australian Coal' => 'cargo--coal',
            'PCI Coal' => 'cargo--coal',
            'Semi Coke' => 'cargo--coal',
            'China Cargo' => 'cargo--lime',
            'General Cargo' => 'cargo--lime',
            'Yellow Sand' => 'cargo--yellow',
            'Cement' => 'cargo--yellow',
            'River Stone' => 'cargo--yellow',
            'Stone Boulders' => 'cargo--yellow',
            'Split Stones' => 'cargo--yellow',
            'Steel Billet' => 'cargo--teal',
            'HSD Fuel' => 'cargo--teal',
            'Liquid Tank' => 'cargo--teal',
            'Heavy Equipment' => 'cargo--teal',
            'Concrete Pile' => 'cargo--teal',
            'Ferro Chrome' => 'cargo--purple',
            'Ferro Nickel' => 'cargo--purple',
        ];
        return view('livewire.components.shift-discharge-detail', $data);
    }
}
