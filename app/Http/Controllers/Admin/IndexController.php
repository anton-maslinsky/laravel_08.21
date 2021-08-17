<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {

        $countNews = \DB::table('news')->count();
        $countCategories = \DB::table('categories')->count();

        return view('admin.index', [
            'countNews' => $countNews,
            'countCategories' => $countCategories
        ]);
    }
}
