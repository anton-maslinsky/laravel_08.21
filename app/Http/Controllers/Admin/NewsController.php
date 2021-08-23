<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $newsList = News::select(
            News::$allowedFields
        )->get();

        return view('admin.news.index', [
            'newsList' => $newsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string']
        ]);

        $news = News::create(
            $request->only(News::$allowedFields)
        );

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно добавлена');
        }

        return back()->withInput()->with('error', 'Не удалось добавить новость');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View|Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param News $news
     * @return RedirectResponse
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => ['required', 'string']
        ]);

        $news = $news->fill(
            $request->only(['category_id', 'title', 'description', 'author', 'image', 'status'])
        )->save();

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно изменена');
        }

        return back()->withInput()->with('error', 'Не удалось сохранить новость');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
