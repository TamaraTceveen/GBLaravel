<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $news = new News();
        $news = $news->getNews();
//        $news = [];

        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = new News();
        $news = $news->getNewsById($id);

        return view('news/show', [
            'newsList' => $news
        ]);
    }

    public function showAllCategories()
    {
        $categories = new Category();
        $categories = $categories->newsCategories();

//        dd($categories);
        return view('news/categories', [
            'categoriesList' => $categories
        ]);
    }

    public function showCategories(int $id)
    {
        $categories = new Category();
        $categories = $categories->showCategories($id);

//        dd($categories);
        return view('news/showNewsByCategory', [
            'categoriesList' => $categories
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5']
        ]);

//        file_put_contents(public_path('/news/data.json'), json_encode($request->all()));

        dd($request->all());

        return response()->json($request->all(), 201);
    }
}
