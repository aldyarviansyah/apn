<?php

namespace App\Http\Livewire\Ships;

use App\Models\Activity;
use App\Models\Ship;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ShipComponent extends Component
{
    use WithPagination;
    public $sort, $title, $detail, $keyword, $column, $category, $activities;
    protected $queryString = ['sort', 'keyword', 'column', 'category'];
    protected $listeners = [
        'showDetail'
    ];
    public function mount($title) {
        $this->title = $title;
    }

    public function showDetail($id) {
        $this->detail = Ship::find($id);
    }

    public function showActivities() {
        $this->activities = Activity::where('model', Ship::class)
            ->where('model_id', $this->detail->id)
            ->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $list = Ship::query();
        if($this->category) {
            $list->where('category', $this->category);
        }
        if($this->keyword && $this->column) {
            $list->where($this->column, 'like', '%'.$this->keyword.'%');
        }
        if($this->sort && in_array($this->sort, ['asc', 'desc'])) {
            $list->orderBy('name', $this->sort);
        } else {
            $list->orderBy('name', 'asc');
        }
        $data['barge'] = Ship::where('category', 'barge')->count();
        $data['vessel'] = Ship::where('category', 'vessel')->count();
        $data['ships'] = $list->paginate(50);
        return view('livewire.ships.ship-component', $data);
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

    public function hydrateDetail() {
        $this->activities = null;
    }

    public function updatedSort() {
        $this->resetPage();
        $this->detail = null;
        $this->activities = null;
    }
}
