<?php

namespace App\Http\Livewire\Companies;

use App\Models\Activity;
use App\Models\Boat;
use App\Models\Company;
use App\Models\CompanyBoat;
use App\Models\CompanyShip;
use App\Models\CompanyType;
use App\Models\CompanyUser;
use App\Models\Ship;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditComponent extends Component
{
    public $title, $users = [], $ships = [], $boats =[], $notfound = false;
    public $keyword, $detail;
    public $name, $phone, $address, $email, $company_type_id;
    public $users_selected = [], $ships_selected = [], $boats_selected = [], $user_selected_role = [];
    public $openSelectUser = false, $openSelectShip = false, $openSelectBoat = false;

    public function mount($title, $detail) {
        $this->detail = $detail;
        $this->title = $title;
        $this->name = $detail->name;
        $this->phone = $detail->phone;
        $this->address = $detail->address;
        $this->email = $detail->email;
        $this->company_type_id = $detail->company_type_id;
        foreach ($detail->users as $user) {
            array_push($this->users_selected, [
                'id' => $user->id,
                'full_name' => $user->full_name,
                'image' => $user->image,
                'role' => $user->role
            ]);
            array_push($this->user_selected_role,  $user->pivot->role);
        }
        foreach ($detail->ships as $ship) {
            array_push($this->ships_selected, [
                'id' => $ship->id,
                'name' => $ship->name,
                'category' => $ship->category,
            ]);
        }
        foreach ($detail->boats as $boat) {
            array_push($this->boats_selected, [
                'id' => $boat->id,
                'name' => $boat->name
            ]);
        }
    }

    public function render()
    {
        $data['types'] = CompanyType::all();
        return view('livewire.companies.edit-component', $data);
    }

    public function storeSubmit()
    {
        $roles = [
            'name' => 'required',
            'company_type_id' => 'required',
        ];
        if($this->phone) {
            $roles['phone'] = 'min:10|regex:/^\+[1-9]\d{1,14}$/';
        }
        foreach ($this->users_selected as $key => $value) {
            $roles['user_selected_role.'.$key] = 'required';
        }
        if($this->email) {
            $roles['email'] = 'email|unique:companies,email,'.$this->detail->id;
        }
        $validation = Validator::make([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'company_type_id' => $this->company_type_id,
        ], $roles);
        if($validation->fails()) {
            $this->resetSearch();
            $this->openSelectUser = false;
            $this->openSelectShip = false;
            $this->openSelectBoat = false;
            $this->emit('toTop');
        }
        $this->validate($roles, [
            'phone.regex' => __('validation.phone_e164')
        ]);
        $additionalItems = [];

        $company_users = $this->detail->users->pluck('id')->toArray();
        $new_company_users = array_column($this->users_selected, 'id');
        $new_company_users = array_map('intval', $new_company_users);
        $added_users = array_diff($new_company_users, $company_users);
        $removed_users = array_diff($company_users, $new_company_users);

        $company_ships = $this->detail->ships->pluck('id')->toArray();
        $new_company_ships = array_column($this->ships_selected, 'id');
        $new_company_ships = array_map('intval', $new_company_ships);
        $added_ships = array_diff($new_company_ships, $company_ships);
        $removed_ships = array_diff($company_ships, $new_company_ships);

        $company_boats = $this->detail->boats->pluck('id')->toArray();
        $new_company_boats = array_column($this->boats_selected, 'id');
        $new_company_boats = array_map('intval', $new_company_boats);
        $added_boats = array_diff($new_company_boats, $company_boats);
        $removed_boats = array_diff($company_boats, $new_company_boats);

        foreach ($this->users_selected as $key => $user) {
            $searchUsers = CompanyUser::where('company_id', $this->detail->id)
                ->where('user_id', $user['id'])->first();
            $new_display_value = null;
            $old_display_value = null;
            $new_values = null;
            $old_values = null;
            if($searchUsers) {
                if($searchUsers->role != $this->user_selected_role[$key]) {
                    $new_display_value = 'Updated Contact Role: '.$this->user_selected_role[$key] . ' ('.$searchUsers->user->full_name.')';
                    $old_display_value = 'Contact Role: '.$searchUsers->role. ' ('.$searchUsers->user->full_name.')';
                    $new_values = [
                        'company_id' => $this->detail->id,
                        'user_id' => $user['id'],
                        'role' => $this->user_selected_role[$key]
                    ];
                    $old_values = [
                        'company_id' => $this->detail->id,
                        'user_id' => $user['id'],
                        'role' => $searchUsers->role
                    ];
                    $newItem = [
                        'field' => 'all',
                        'field_label' => 'Users',
                        'value_type' => 'object',
                        'old_value' => json_encode($old_values),
                        'old_display_value' => $old_display_value,
                        'new_value' => json_encode($new_values),
                        'new_display_value' => $new_display_value,
                        'undo_able' => true,
                        'current_model' => CompanyUser::class,
                        'current_table' => 'company_users',
                    ];
                    array_push($additionalItems, $newItem);
                }
            } else {
                $userDetail = User::find($user['id']);
                $new_display_value = 'Added Contact: '. $userDetail->full_name;
                $new_values = [
                    'company_id' => $this->detail->id,
                    'user_id' => $user['id'],
                    'role' => $this->user_selected_role[$key]
                ];
                $newItem = [
                    'field' => 'all',
                    'field_label' => 'Users',
                    'value_type' => 'object',
                    'old_value' => json_encode($old_values),
                    'old_display_value' => $old_display_value,
                    'new_value' => json_encode($new_values),
                    'new_display_value' => $new_display_value,
                    'undo_able' => true,
                    'current_model' => CompanyUser::class,
                    'current_table' => 'company_users',
                ];
                array_push($additionalItems, $newItem);
            }
        }
        foreach ($removed_users as $user) {
            $old_values = [
                'company_id' => $this->detail->id,
                'user_id' => $user,
                'role' => ''
            ];
            $display_value = User::find($user);
            $newItem = [
                'field' => 'all',
                'field_label' => 'Users',
                'value_type' => 'object',
                'old_value' => json_encode($old_values),
                'old_display_value' => 'Contact: '.$display_value->full_name,
                'new_value' => null,
                'new_display_value' => 'Removed Contact: '.$display_value->full_name,
                'undo_able' => true,
                'current_model' => CompanyUser::class,
                'current_table' => 'company_users',
            ];
            array_push($additionalItems, $newItem);
        }
        foreach ($added_ships as $ship) {
            $new_values = [
                'company_id' => $this->detail->id,
                'ship_id' => $ship,
            ];
            $display_value = Ship::find($ship);
            $newItem = [
                'field' => 'all',
                'field_label' => 'Ships',
                'value_type' => 'object',
                'old_value' => null,
                'old_display_value' => null,
                'new_value' => json_encode($new_values),
                'new_display_value' => 'Added Ship: '. $display_value->name,
                'undo_able' => true,
                'current_model' => CompanyShip::class,
                'current_table' => 'company_ships',
            ];
            array_push($additionalItems, $newItem);
        }
        foreach ($removed_ships as $ship) {
            $old_values = [
                'company_id' => $this->detail->id,
                'ship_id' => $ship,
            ];
            $display_value = Ship::find($ship);
            $newItem = [
                'field' => 'all',
                'field_label' => 'Ships',
                'value_type' => 'object',
                'old_value' => json_encode($old_values),
                'old_display_value' => 'Ship: '. $display_value->name,
                'new_value' => null,
                'new_display_value' => 'Removed Ship: '. $display_value->name,
                'undo_able' => true,
                'current_model' => CompanyShip::class,
                'current_table' => 'company_ships',
            ];
            array_push($additionalItems, $newItem);
        }
        foreach ($added_boats as $boat) {
            $new_values = [
                'company_id' => $this->detail->id,
                'boat_id' => $boat,
            ];
            $display_value = Boat::find($boat);
            $newItem = [
                'field' => 'all',
                'field_label' => 'Boats',
                'value_type' => 'object',
                'old_value' => null,
                'old_display_value' => null,
                'new_value' => json_encode($new_values),
                'new_display_value' => 'Added Boat: '. $display_value->name,
                'undo_able' => true,
                'current_model' => CompanyBoat::class,
                'current_table' => 'company_boats',
            ];
            array_push($additionalItems, $newItem);
        }
        foreach ($removed_boats as $boat) {
            $old_values = [
                'company_id' => $this->detail->id,
                'boat_id' => $boat,
            ];
            $display_value = Boat::find($boat);
            $newItem = [
                'field' => 'all',
                'field_label' => 'Boats',
                'value_type' => 'object',
                'old_value' => json_encode($old_values),
                'old_display_value' => 'Boat: '. $display_value->name,
                'new_value' => null,
                'new_display_value' => 'Removed Boat: '. $display_value->name,
                'undo_able' => true,
                'current_model' => CompanyBoat::class,
                'current_table' => 'company_boats',
            ];
            array_push($additionalItems, $newItem);
        }
        $this->detail->setAdditionalActivitiesItemAttribute($additionalItems);
        $company_type = CompanyType::find($this->company_type_id);
        $this->detail->setNewDisplayValueAttribute(['company_type_id' => $company_type->name]);

        $updated = (($this->detail->name != $this->name) ||
            ($this->detail->email != $this->email) ||
            ($this->detail->address != $this->address) ||
            ($this->detail->phone != $this->phone) ||
            ($this->detail->company_type_id != $this->company_type_id));

        $this->detail->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'company_type_id' => $this->company_type_id,
        ]);
        $this->detail->users()->detach();
        $this->detail->ships()->detach();
        $this->detail->boats()->detach();
        foreach ($this->users_selected as $key => $user) {
            $this->detail->users()->attach($user['id'], ['role' => $this->user_selected_role[$key]]);
        }
        foreach ($this->ships_selected as $ship) {
            $this->detail->ships()->attach($ship['id']);
        }
        foreach ($this->boats_selected as $boat) {
            $this->detail->boats()->attach($boat['id']);
        }
        if(!$updated && count($additionalItems) > 0) {
            $this->detail->setNewDisplayValueAttribute([]);
            $activities = Activity::create([
                'model_id' => $this->detail->id,
                'user_id' => auth()->user()->id,
                'model' => Company::class,
                'model_label' => 'Company',
                'action' => 'update',
                'action_label' => 'Updated',
            ]);
            $activities->items()->createMany($additionalItems);
            $this->detail->activity_count = $this->detail->activities_count;
            $this->detail->saveQuietly();
        }
        $dataMsg = [
            'title' => 'Company updated',
            'message' => 'The Company has been updated.',
            'model' => 'Company',
            'emitAction' => 'showDetail',
            'modelId' => $this->detail->id
        ];
        request()->session()->flash('msg', 'data_saved');
        request()->session()->flash('dataMsg', $dataMsg);
        return redirect()->route('companies');
    }

    public function openSelect($type) {
        $this->resetSearch();
        $this->notfound = false;
        $this->openSelectShip = ($type=='ship');
        $this->openSelectBoat = ($type=='boat');
        $this->openSelectUser = ($type=='user');
    }


    public function resetSearch() {
        $this->users = [];
        $this->ships = [];
        $this->boats = [];
        $this->keyword = null;
    }

    public function searchUsers() {
        $this->validate([
            'keyword' => 'required'
        ]);
        $this->users = User::where('full_name', 'like', '%'.$this->keyword.'%')
            ->orWhere('email', 'like', '%'. $this->keyword.'%')
            ->orWhere('username', 'like', '%'. $this->keyword.'%')
            ->limit(10)->get();
        $this->notfound = count($this->users)==0;
    }

    public function searchShips() {
        $this->validate([
            'keyword' => 'required'
        ]);
        $this->ships = Ship::where('name', 'like', '%'.$this->keyword.'%')
            ->limit(10)->get();
        $this->notfound = count($this->ships)==0;
    }

    public function searchBoats() {
        $this->validate([
            'keyword' => 'required'
        ]);
        $this->boats = Boat::where('name', 'like', '%'.$this->keyword.'%')
            ->limit(10)->get();
        $this->notfound = count($this->boats)==0;
    }

    public function selectThis($type, $obj) {
        if($type == 'user') {
            $ids = array_column($this->users_selected, 'id');
            if(!in_array($obj['id'], $ids)) {
                array_push($this->users_selected, $obj);
            }
        } elseif($type == 'ship') {
            $ids = array_column($this->ships_selected, 'id');
            if(!in_array($obj['id'], $ids)) {
                array_push($this->ships_selected, $obj);
            }
        } elseif($type == 'boat') {
            $ids = array_column($this->boats_selected, 'id');
            if(!in_array($obj['id'], $ids)) {
                array_push($this->boats_selected, $obj);
            }
        }
        $this->resetSearch();
        $this->openSelectUser = false;
        $this->openSelectShip = false;
        $this->openSelectBoat = false;
    }

    public function removeThis($key, $type) {
        if($type == 'user') {
            unset($this->users_selected[$key]);
            unset($this->user_selected_role[$key]);
        } elseif($type == 'ship') {
            unset($this->ships_selected[$key]);
        } elseif($type == 'boat') {
            unset($this->boats_selected[$key]);
        }
        $this->openSelectUser = false;
        $this->openSelectShip = false;
        $this->openSelectBoat = false;
    }

    public function updatingKeyword() {
        $this->openSelectUser = $this->openSelectUser;
        $this->openSelectShip = $this->openSelectShip;
        $this->openSelectBoat = $this->openSelectBoat;
    }

    public function updatingName() {
        $this->resetSearch();
        $this->openSelectUser = false;
        $this->openSelectShip = false;
        $this->openSelectBoat = false;
    }

    public function updatingPhone() {
        $this->resetSearch();
        $this->openSelectUser = false;
        $this->openSelectShip = false;
        $this->openSelectBoat = false;
    }

    public function updatingCompanyTypeId() {
        $this->resetSearch();
        $this->openSelectUser = false;
        $this->openSelectShip = false;
        $this->openSelectBoat = false;
    }

    public function updatingAddress() {
        $this->resetSearch();
        $this->openSelectUser = false;
        $this->openSelectShip = false;
        $this->openSelectBoat = false;
    }

    public function updatingEmail() {
        $this->resetSearch();
        $this->openSelectUser = false;
        $this->openSelectShip = false;
        $this->openSelectBoat = false;
    }
}
