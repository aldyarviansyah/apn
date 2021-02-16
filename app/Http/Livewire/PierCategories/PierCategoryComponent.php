<?php

namespace App\Http\Livewire\PierCategories;

use App\Models\Activity;
use App\Models\PierCategory;
use Livewire\Component;
use Livewire\WithPagination;

class PierCategoryComponent extends Component
{
    use WithPagination;
    public $title, $detail, $activities;
    protected $queryString = [];
    protected $listeners = [
        'showDetail'
    ];

    public function mount($title) {
        $this->title = $title;
    }

    public function showDetail($id) {
        $this->detail = PierCategory::withCount('piers')->find($id);
    }

    public function showActivities() {
        $this->activities = Activity::with('items')->where('model', PierCategory::class)
            ->where('model_id', $this->detail->id)
            ->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $list = PierCategory::withCount('piers')->orderBy('created_at', 'desc');
        $data['categories'] = $list->paginate(50);
        return view('livewire.pier-categories.pier-category-component', $data);
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
