<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\QueryBuilders\NewsQueryBuilder;

class NewsController extends Controller
{

    public function index(NewsQueryBuilder $queryBuilder)
    {
        $news = News::select(News::$availableFields)->get();
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(News $news)
    {

        return view('news/show', [
            'newsList' => $news
        ]);
    }

    public function showAllCategories()
    {
        $categories = new Category();
        $categories = $categories->newsCategories();

        return view('news/categories', [
            'categoriesList' => $categories
        ]);
    }

    public function showCategories(int $id)
    {
        $categories = new Category();
        $categories = $categories->showCategories($id);


        return view('news/showNewsByCategory', [
            'categoriesList' => $categories
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5']
        ]);

//        file_put_contents(public_path('/newsFile/data.json'), json_encode($request->all()));

        dd($request->all());

        return response()->json($request->all(), 201);
    }
}
