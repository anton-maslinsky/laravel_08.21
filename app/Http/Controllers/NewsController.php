<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $model = new News();
        $newsList = $model->getNews();

        return view('news.index', [
            'newsList' => $newsList
        ]);
    }

    public function show(int $id)
    {
        $news =\DB::table('news')->select('id','title', 'description')->find($id);

        return view('news.show', [
            'news' => $news
        ]);
    }
}
