<?php

namespace App\Http\Controllers;

use App\Models\Pier;
use App\Models\PierCategory;
use Illuminate\Http\Request;

class PierController extends Controller
{
    /**
     * endpoint: /piers
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $data['title'] = 'Piers';
        return view('piers.index', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request) {
        $data['title'] = 'Create Pier';
        $data['categories'] = PierCategory::orderBy('name')->get();
        return view('piers.create', $data);
    }

    /**
     * endpoint: /piers\{pier}/edit
     * @param Request $request
     * @param Pier $pier
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Pier $pier) {
        $data['title'] = 'Update Pier';
        $data['detail'] = $pier;
        $data['categories'] = PierCategory::orderBy('name')->get();
        return view('piers.edit', $data);
    }

    /**
     * store pier
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validation = $request->validate([
            'number' => 'required|min:1|numeric|unique:piers,number',
            'section' => 'required|in:west,east,center',
            'pier_category_id' => 'required|exists:pier_categories,id'
        ]);
        $validation['created_by'] = auth()->user()->id;
        $pier = Pier::create($validation);
        $dataMsg = [
            'title' => 'Pier created',
            'message' => 'The Pier has been created.',
            'model' => 'Pier',
            'routeAnother' => 'piers.create',
            'emitAction' => 'showDetail',
            'modelId' => $pier->id
        ];
        return redirect()->route('piers')
            ->with('msg', 'data_saved')
            ->with('dataMsg', $dataMsg);
    }

    /**
     * update pier
     * @param Request $request
     * @param Pier $pier
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pier $pier) {
        $validation = $request->validate([
            'number' => 'required|min:1|numeric|unique:piers,number,'.$pier->id,
            'section' => 'required|in:west,east,center',
            'pier_category_id' => 'required|exists:pier_categories,id'
        ]);
        $validation['created_by'] = auth()->user()->id;
        $pier->update($validation);
        $dataMsg = [
            'title' => 'Pier updated',
            'message' => 'The The Pier has been updated.',
            'model' => 'Pier',
            'emitAction' => 'showDetail',
            'modelId' => $pier->id
        ];
        return redirect()->route('piers')
            ->with('msg', 'data_saved')
            ->with('dataMsg', $dataMsg);
    }
}
