<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    /**
     * endpoint: /ships
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $data['title'] = 'Ships';
        return view('ships.index', $data);
    }

    /**
     * endpoint: /ships/create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        $data['title'] = 'Create Ship';
        $data['countries'] = Country::orderBy('highlighted', 'desc')->orderBy('name', 'asc')->get();
        return view('ships.create', $data);
    }

    /**
     * @param Request $request
     * @param Ship $ship
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Ship $ship) {
        $data['title'] = 'Update ship';
        $data['detail'] = $ship;
        $data['countries'] = Country::orderBy('highlighted', 'desc')->orderBy('name', 'asc')->get();
        return view('ships.edit', $data);
    }

    /**
     * store boat
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validation = $request->validate([
            'name' => 'required|regex:/^[a-z0-9 ]+$/i|max:24|unique:ships,name',
            'category' => 'required',
            'call_sign' => 'required',
            'nationality_id' => 'required',
            'telephone' => 'required',
            'port' => 'required',
            'imo_number' => 'required',
            'issc_type' => 'required',
            'issc_issue_date' => 'required|date',
            'issc_expiry_date' => 'required|date',
        ], [
            'name.regex' => 'The :attribute may only alphabets and numbers, cannot be duplicate of other ship\'s name.'
        ]);
        $validation['created_by'] = auth()->user()->id;
        $ship = Ship::create($validation);
        $dataMsg = [
            'title' => 'Ship Created',
            'message' => 'The Ship has been created.',
            'model' => 'Ship',
            'routeAnother' => 'ships.create',
            'emitAction' => 'showDetail',
            'modelId' => $ship->id
        ];
        return redirect()->route('ships')
            ->with('msg', 'data_saved')
            ->with('dataMsg', $dataMsg);
    }

    /**
     * @param Request $request
     * @param Ship $ship
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Ship $ship) {
        $validation = $request->validate([
            'name' => 'required|regex:/^[a-z0-9 ]+$/i|max:24|unique:ships,name,'.$ship->id,
            'category' => 'required',
            'call_sign' => 'required',
            'nationality_id' => 'required',
            'telephone' => 'required',
            'port' => 'required',
            'imo_number' => 'required',
            'issc_type' => 'required',
            'issc_issue_date' => 'required|date',
            'issc_expiry_date' => 'required|date',
        ], [
            'name.regex' => 'The :attribute may only alphabets and numbers, cannot be duplicate of other ship\'s name.'
        ]);
        if($ship->nationality_id != $validation['nationality_id']) {
            $country = Country::find($validation['nationality_id']);
            $ship->setOldDisplayValueAttribute([
                'nationality_id' => $ship->nationality_id?$ship->country->name:null
            ]);
            $ship->setNewDisplayValueAttribute([
                'nationality_id' => $country->name
            ]);
        }
        $ship->update($validation);
        $dataMsg = [
            'title' => 'Ship Updated',
            'message' => 'The Ship has been updated.',
            'model' => 'Ship',
            'emitAction' => 'showDetail',
            'modelId' => $ship->id
        ];
        return redirect()->route('ships')
            ->with('msg', 'data_saved')
            ->with('dataMsg', $dataMsg);
    }
}
