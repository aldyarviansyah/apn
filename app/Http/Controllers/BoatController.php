<?php

namespace App\Http\Controllers;

use App\Models\Boat;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    /**
     * endpoint: /boats
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $data['title'] = 'Boats';
        return view('boats.index', $data);
    }

    /**
     * endpoint: /boats/create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        $data['title'] = 'Create Boat';
        return view('boats.create', $data);
    }

    /**
     * endpoint: /boats/{boat}/edit
     * @param Request $request
     * @param Boat $boat
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Boat $boat) {
        $data['title'] = 'Update boat';
        $data['detail'] = $boat;
        return view('boats.edit', $data);
    }

    /**
     * store boat
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validation = $request->validate([
            'name' => 'required|regex:/^[a-z0-9 ]+$/i|max:24|unique:boats,name'
        ], [
            'name.regex' => 'The :attribute may only alphabets and numbers, cannot be duplicate of other boat\'s name.'
        ]);
        $validation['created_by'] = auth()->user()->id;
        $boat = Boat::create($validation);
        $dataMsg = [
            'title' => 'Boat Created',
            'message' => 'The Boat has been created.',
            'model' => 'Boat',
            'routeAnother' => 'boats.create',
            'emitAction' => 'showDetail',
            'modelId' => $boat->id
        ];
        return redirect()->route('boats')
            ->with('msg', 'data_saved')
            ->with('dataMsg', $dataMsg);
    }

    /**
     * @param Request $request
     * @param Boat $boat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Boat $boat) {
        $validation = $request->validate([
            'name' => 'required|regex:/^[a-z0-9 .\-]+$/i|max:24|unique:boats,name,'.$boat->id
        ], [
            'name.regex' => 'The :attribute may only alphabets and numbers, cannot be duplicate of other boat\'s name.'
        ]);
        $boat->update($validation);
        $dataMsg = [
            'title' => 'Boat Updated',
            'message' => 'The Boat has been updated.',
            'model' => 'Boat',
            'emitAction' => 'showDetail',
            'modelId' => $boat->id
        ];
        return redirect()->route('boats')
            ->with('msg', 'data_saved')
            ->with('dataMsg', $dataMsg);
    }
}
