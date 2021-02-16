<?php

namespace App\Http\Livewire\Companies;

use App\Models\Activity;
use App\Models\Company;
use App\Models\CompanyType;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesComponent extends Component
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
        $this->detail = Company::find($id);
    }

    public function showActivities() {
        $this->activities = Activity::where('model', Company::class)
            ->where('model_id', $this->detail->id)
            ->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $list = Company::withCount('users');
        if($this->category) {
            $list->where('company_type_id', $this->category);
        }
        if($this->keyword && $this->column) {
            $list->where($this->column, 'like', '%'.$this->keyword.'%');
        }
        if($this->sort && in_array($this->sort, ['asc', 'desc'])) {
            $list->orderBy('name', $this->sort);
        } else {
            $list->orderBy('name', 'asc');
        }
        $data['types'] = CompanyType::all();
        $data['companies'] = $list->paginate(50);
        return view('livewire.companies.companies-component', $data);
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
