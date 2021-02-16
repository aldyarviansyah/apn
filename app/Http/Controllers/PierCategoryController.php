<?php

namespace App\Http\Controllers;

use App\Models\PierCategory;
use Illuminate\Http\Request;

class PierCategoryController extends Controller
{
    /**
     * endpoint: /pier-categories
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $data['title'] = 'Pier Categories';
        return view('pier-categories.index', $data);
    }

    /**
     * endpoint: /pier-categories/create
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request) {
        $data['title'] = 'Create Pier Categories';
        return view('pier-categories.create', $data);
    }

    /**
     * endpoint: /pier-categories/{pierCategory}/edit
     * @param Request $request
     * @param PierCategory $pierCategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, PierCategory $pierCategory) {
        $data['title'] = 'Update Pier Categories';
        $data['detail'] =$pierCategory;
        return view('pier-categories.edit', $data);
    }

    /**
     * store pier-categories
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validation = $request->validate([
            'name' => 'required|max:64'
        ]);
        $validation['created_by'] = auth()->user()->id;
        $pierCategory = PierCategory::create($validation);
        $dataMsg = [
            'title' => 'Pier Category created',
            'message' => 'The Pier Category has been created.',
            'model' => 'Pier Category',
            'routeAnother' => 'pier-categories.create',
            'emitAction' => 'showDetail',
            'modelId' => $pierCategory->id
        ];
        return redirect()->route('pier-categories')
            ->with('msg', 'data_saved')
            ->with('dataMsg', $dataMsg);
    }

    /**
     * pier-categories update
     * @param Request $request
     * @param PierCategory $pierCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, PierCategory $pierCategory) {
        $validation = $request->validate([
            'name' => 'required|max:64'
        ]);
        $pierCategory->update($validation);
        $dataMsg = [
            'title' => 'Pier Category updated',
            'message' => 'The Pier Category has been updated.',
            'model' => 'Pier Category',
            'emitAction' => 'showDetail',
            'modelId' => $pierCategory->id
        ];
        return redirect()->route('pier-categories')
            ->with('msg', 'data_saved')
            ->with('dataMsg', $dataMsg);
    }
}
