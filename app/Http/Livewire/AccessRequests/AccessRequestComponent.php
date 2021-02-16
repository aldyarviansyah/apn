<?php

namespace App\Http\Livewire\AccessRequests;

use App\Models\AccessRequest;
use App\Models\Activity;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AccessRequestComponent extends Component
{
    use WithPagination;
    public $title, $detail, $status='pending', $activities, $keyword, $sort, $column, $reason, $showReject = false;
    protected $queryString = ['status', 'keyword', 'sort', 'column'];
    protected $listeners = [
        'showDetail'
    ];

    public function mount($title) {
        $this->title = $title;
    }

    public function showDetail($id) {
        $this->resetValidation('reason');
        $this->resetErrorBag('reason');
        $this->detail = AccessRequest::find($id);
    }

    public function showActivities() {
        $this->activities = Activity::where('model', AccessRequest::class)
            ->where('model_id', $this->detail->id)
            ->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $list = AccessRequest::query();
        if($this->status) {
            $list->where('status', $this->status);
        } else {
            $this->where('status', 'pending');
        }
        if($this->keyword && $this->column) {
            $list->where($this->column, 'like', '%'.$this->keyword.'%');
        }
        if($this->sort && in_array($this->sort, ['asc', 'desc', 'latest'])) {
            if($this->sort == 'latest') {
                $list->orderBy('created_at', 'desc');
            } else {
                $list->orderBy('name', $this->sort);
            }
        } else {
            $list->orderBy('created_at', 'desc');
        }
        $data['accessRequests'] = $list->paginate(50);
        return view('livewire.access-requests.access-request-component', $data);
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
        $this->showReject = false;
    }

    public function updatedSort() {
        $this->resetPage();
        $this->detail = null;
        $this->activities = null;
    }

    public function updatingReason() {
        $this->showReject = true;
    }

    public function rejectFormSubmit() {
        $this->showReject = true;
        $this->validate([
            'reason' => 'required'
        ]);
        $this->detail->update([
            'status' => 'rejected',
            'reason' => $this->reason
        ]);
        $dataMsg = [
            'title' => __('accessrequest.user_rejected_title'),
            'message' => __('accessrequest.user_rejected_note'),
            'model' => __('accessrequest.title'),
            'emitAction' => 'showDetail',
            'modelId' => $this->detail->id
        ];
        request()->session()->flash('msg', 'data_saved');
        request()->session()->flash('dataMsg', $dataMsg);
        $params = [
            'pages' => $this->page,
            'sort' => $this->sort,
            'keyword' => $this->keyword,
            'column' => $this->column,
            'status'=> $this->status
        ];
        $params = array_filter($params, function($value) {return !is_null($value) && $value !== '';});
        return redirect()->route('access-requests', $params);
    }
}
