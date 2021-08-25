<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
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
        $newsList = News::with('category')->paginate(
            config('paginate.admin.news')
        );

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
     * @param StoreNewsRequest $request
     * @return RedirectResponse
     */
    public function store(StoreNewsRequest $request)
    {
        $news = News::create($request->validated());

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.create.success'));
        }

        return back()->withInput()->with('error', trans('messages.admin.news.create.fail'));

    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function show(News $news)
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
     * @param UpdateNewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $news = $news->fill($request->validated())->save();

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.update.success'));
        }

        return back()->withInput()->with('error', trans('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param News $news
     * @return Response
     */
    public function destroy(Request $request, News $news)
    {
        if($request->ajax()) {
            try{
                $news->delete();
                return response()->json('ok', 200);
            }catch (\Exception $e) {
                \Log::error($e->getMessage());
                return response()->json('error', 400);
            }
        }
    }
}
