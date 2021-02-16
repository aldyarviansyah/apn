<?php

namespace App\Http\Livewire\Piers;

use App\Models\Pier;
use App\Models\PierCategory;
use Livewire\Component;

class PierComponent extends Component
{
    public $title, $detail, $pier_category_id;
    protected $queryString = ['pier_category_id'];
    protected $listeners = [
        'showDetail'
    ];

    public function mount($title) {
        $this->title = $title;
    }

    public function showDetail($id) {
        $this->detail = Pier::find($id);
    }

    public function render()
    {
        $list = Pier::orderBy('number', 'asc');
        if($this->pier_category_id) {
            $list->where('pier_category_id', $this->pier_category_id);
        }
        $data['piers'] = $list->get();
        $data['categories'] = PierCategory::orderBy('name')->get();
        return view('livewire.piers.pier-component', $data);
    }
}
