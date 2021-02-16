<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * endpoint: /companies
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $data['title'] = 'Company';
        return view('companies.index', $data);
    }

    /**
     * endpoint: /companies/create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        $data['title'] = 'Create Company';
        return view('companies.create', $data);
    }

    /**
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Company $company) {
        $data['title'] = 'Update Company';
        $data['detail'] = $company;
        return view('companies.edit', $data);
    }
}
