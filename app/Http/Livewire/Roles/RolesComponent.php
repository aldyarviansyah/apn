<?php

namespace App\Http\Livewire\Roles;

use App\Models\Activity;
use App\Models\RoleExtend;
use Livewire\Component;
use Livewire\WithPagination;

class RolesComponent extends Component
{
    use WithPagination;
    public $sort, $title, $detail, $activities;
    protected $queryString = ['sort'];
    protected $listeners = [
        'showDetail'
    ];

    public function mount($title) {
        $this->title = $title;
    }

    public function showDetail($id) {
        $this->detail = RoleExtend::withCount('users')->find($id);
    }

    public function showActivities() {
        $this->activities = Activity::with('items')->where('model', RoleExtend::class)
            ->where('model_id', $this->detail->id)
            ->orderBy('created_at', 'desc')->get();

    }

    public function render()
    {
        $list = RoleExtend::withCount('users');
        if($this->sort) {
            $column = $this->sort == 'highest'? 'users_count': 'name';
            $order = $this->sort == 'highest'? 'desc': 'asc';
            $list->orderBy($column, $order);
        } else {
            $list->orderBy('users_count', 'desc');
        }
        $data['roles'] = $list->paginate(50);
        return view('livewire.roles.roles-component', $data);
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
