<?php

namespace App\Http\Livewire\Users;

use App\Models\Activity;
use App\Models\ModelHasPermission;
use App\Models\PermissionGroup;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersComponent extends Component
{
    use WithPagination;

    public $sort, $title, $detail, $keyword, $column, $role_id, $permissionGroups, $userSearch, $usersResults, $activities;
    public $trayCopyPermission = false;
    public $userId='';
    protected $queryString = ['sort', 'keyword', 'column', 'role_id'];
    protected $listeners = [
        'showDetail'
    ];

    public function mount($title) {
        $this->title = $title;
    }

    public function showDetail($id) {
        $this->setDetail(User::find($id));
    }

    public function showPermissionGroup() {
        $this->userSearch=null;
        $this->usersResults=null;
        $this->userId=null;
        $this->setPermissionGroups(PermissionGroup::get());
    }

    public function showActivities() {
        $this->activities = Activity::with('items')->where('model', User::class)
            ->where('model_id', $this->detail->id)
            ->orderBy('created_at', 'desc')->get();

    }

    public function render() {
        $list = User::query();
        if($this->keyword && $this->column) {
            $list->where($this->column, 'like', '%'.$this->keyword.'%');
        }
        if($this->role_id) {
            $list->whereHas('roles', function($query) {
                $query->where('id', $this->role_id);
            });
        }
        if($this->sort && in_array($this->sort, ['asc', 'desc', 'latest'])) {
            if($this->sort == 'latest') {
                $list->orderBy('created_at', 'desc');
            } else {
                $list->orderBy('full_name', $this->sort);
            }
        } else {
            $list->orderBy('full_name', 'asc');
        }
        $data['users'] = $list->paginate(50);
        $data['roles'] = Role::orderBy('name')->withCount('users')->get();
        return view('livewire.users.users-component', $data);
    }

    public function searchFormSubmit() {
        $this->trayCopyPermission = true;
        $this->usersResults = null;
        $this->userId=null;
        $this->activities = null;
        $this->validate([
            'userSearch' => 'required'
        ]);
        $this->usersResults = User::where('full_name', 'like', '%'.$this->userSearch.'%')
            ->orWhere('email', 'like', '%'. $this->userSearch.'%')
            ->orWhere('username', 'like', '%'. $this->userSearch.'%')
            ->limit(10)->get();
    }

    public function copyFormSubmit() {
        $this->trayCopyPermission = true;
        $this->validate([
            'userId' => 'required'
        ], [
            'userId.required' => __('users.no_one_user_selected')
        ]);
        $detailUser = User::find($this->userId);

        $user_permissions = $this->detail->permissions->pluck('id')->toArray();
        $new_permissions = array_map('intval', $detailUser->permissions->pluck('id')->toArray());
        $added = array_diff($new_permissions,$user_permissions);
        $removed = array_diff($user_permissions, $new_permissions);
        $additionalItems = [];
        foreach ($added as $key => $add) {
            $new_values = [
                'model_type' => User::class,
                'model_id' => $this->detail->id,
                'permission_id' => $add
            ];
            $new_display_value = Permission::find($add)->label;
            $newItem = [
                'field' => 'all',
                'field_label' => 'Permission',
                'value_type' => 'object',
                'old_value' => null,
                'old_display_value' => null,
                'new_value' => json_encode($new_values),
                'new_display_value' => 'Added '. $new_display_value,
                'undo_able' => true,
                'current_model' => ModelHasPermission::class,
                'current_table' => 'model_has_permissions',
            ];
            array_push($additionalItems, $newItem);
        }

        foreach ($removed as $key => $remove) {
            $new_values = [
                'model_type' => User::class,
                'model_id' => $this->detail->id,
                'permission_id' => $remove
            ];
            $display_value = Permission::find($remove)->label;
            $newItem = [
                'field' => 'all',
                'field_label' => 'Permission',
                'value_type' => 'object',
                'old_value' => json_encode($new_values),
                'old_display_value' => $display_value,
                'new_value' => null,
                'new_display_value' => 'Removed '. $display_value,
                'undo_able' => true,
                'current_model' => ModelHasPermission::class,
                'current_table' => 'model_has_permissions',
            ];
            array_push($additionalItems, $newItem);
        }
        if(count($additionalItems)>0) {
            $activities = Activity::create([
                'model_id' => $this->detail->id,
                'user_id' => auth()->user()->id,
                'model' => User::class,
                'model_label' => 'User',
                'action' => 'update',
                'action_label' => 'Updated',
            ]);
            $activities->items()->createMany($additionalItems);
        }

        $this->detail->syncPermissions($detailUser->getPermissionNames());
        $dataMsg = [
            'title' => __('users.user_permission_updated'),
            'message' => __('users.user_permission_updated_note'),
            'model' => 'User',
            'emitAction' => 'showDetail',
            'modelId' => $this->detail->id
        ];
        request()->session()->flash('msg', 'user_saved');
        request()->session()->flash('dataMsg', $dataMsg);
        $params = [
            'pages' => $this->page,
            'sort' => $this->sort,
            'keyword' => $this->keyword,
            'column' => $this->column,
            'role_id'=> $this->role_id
        ];
        $params = array_filter($params, function($value) {return !is_null($value) && $value !== '';});
        return redirect()->route('users', $params);
    }

    public function previousPage() {
        $this->setPage(max($this->page - 1, 1));
        $this->setDetail(null);
        $this->setPermissionGroups(null);
        $this->trayCopyPermission = false;
        $this->activities = null;
    }

    public function nextPage() {
        $this->setPage($this->page + 1);
        $this->setDetail(null);
        $this->setPermissionGroups(null);
        $this->trayCopyPermission = false;
        $this->activities = null;
    }

    public function updatedSort() {
        $this->resetPage();
        $this->setDetail(null);
        $this->setPermissionGroups(null);
        $this->trayCopyPermission = false;
        $this->activities = null;
    }

    public function hydrateDetail() {
        $this->setPermissionGroups(null);
        $this->trayCopyPermission = false;
        $this->activities = null;
    }

    public function updatingUserSearch() {
        $this->trayCopyPermission = true;
    }

    public function updatingUserId() {
        $this->trayCopyPermission = true;
    }

    private function setDetail($value) {
        $this->detail = $value;
    }

    private function setPermissionGroups($value) {
        $this->permissionGroups = $value;
    }
}
