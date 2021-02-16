<?php

namespace App\Http\Livewire\Boats;

use App\Models\Activity;
use App\Models\Boat;
use Livewire\Component;
use Livewire\WithPagination;

class BoatComponent extends Component
{
    use WithPagination;
    public $sort, $title, $detail, $keyword, $column, $activities;
    protected $queryString = ['sort', 'keyword', 'column'];
    protected $listeners = [
        'showDetail'
    ];

    public function mount($title) {
        $this->title = $title;
    }

    public function showDetail($id) {
        $this->detail = Boat::find($id);
    }

    public function showActivities() {
        $this->activities = Activity::with('items')->where('model', Boat::class)
            ->where('model_id', $this->detail->id)
            ->orderBy('created_at', 'desc')->get();

    }

    public function render()
    {
        $list = Boat::query();
        if($this->keyword && $this->column) {
            $list->where($this->column, 'like', '%'.$this->keyword.'%');
        }
        if($this->sort && in_array($this->sort, ['asc', 'desc'])) {
            $list->orderBy('name', $this->sort);
        } else {
            $list->orderBy('name', 'asc');
        }
        $data['boats'] = $list->paginate(50);
        return view('livewire.boats.boat-component', $data);
    }

    public function previousPage() {
        $this->setPage(max($this->page - 1, 1));
        $this->detail = null;
        $this->activities = null;
    }

    public function nextPage() {
        $this->setPage($this->page + 1);
        $this->detail = null;
        $this->activities = null;
    }

    public function updatedSort() {
        $this->resetPage();
        $this->detail = null;
        $this->activities = null;
    }

    public function hydrateDetail() {
        $this->activities = null;
    }
}
