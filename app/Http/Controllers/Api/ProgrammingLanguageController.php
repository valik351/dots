<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\ProgrammingLanguage;
use Illuminate\Http\Request;

class ProgrammingLanguageController extends Controller
{
    /**
     * Returns all programming languages
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        return ProgrammingLanguage::all();
    }
}
