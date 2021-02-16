<?php

namespace App\Http\Livewire\Companies;

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

class CreateComponent extends Component
{
    public $title, $users = [], $ships = [], $boats =[], $notfound = false;
    public $keyword;
    public $name, $phone, $address, $email, $company_type_id;
    public $users_selected = [], $ships_selected = [], $boats_selected = [], $user_selected_role = [];
    public $openSelectUser = false, $openSelectShip = false, $openSelectBoat = false;

    public function mount($title) {
        $this->title = $title;
    }

    public function render()
    {
        $data['types'] = CompanyType::all();
        return view('livewire.companies.create-component', $data);
    }

    public function storeSubmit()
    {
        $roles = [
            'name' => 'required',
            'company_type_id' => 'required',
        ];
        if($this->email) {
            $roles['email'] = 'email|unique:companies,email';
        }
        if($this->phone) {
            $roles['phone'] = 'min:10|regex:/^\+[1-9]\d{1,14}$/';
        }
        foreach ($this->users_selected as $key => $value) {
            $roles['user_selected_role.'.$key] = 'required';
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
        $company = Company::create([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'company_type_id' => $this->company_type_id,
        ]);
        foreach ($this->users_selected as $key => $user) {
            $company->users()->attach($user['id'], ['role' => $this->user_selected_role[$key]]);
        }
        foreach ($this->ships_selected as $ship) {
            $company->ships()->attach($ship['id']);
        }
        foreach ($this->boats_selected as $boat) {
            $company->boats()->attach($boat['id']);
        }
        $dataMsg = [
            'title' => 'Company created',
            'message' => 'The Company has been created.',
            'model' => 'Company',
            'routeAnother' => 'companies.create',
            'emitAction' => 'showDetail',
            'modelId' => $company->id
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
