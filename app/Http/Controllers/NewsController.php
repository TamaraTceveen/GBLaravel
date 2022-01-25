<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->getNews();
//        $news = [];

        return view('news/index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = $this->getNews($id);

        return view('news/show', [
            'newsList' => $news
        ]);
    }

    public function showAllCategories()
    {
        $categories = $this->newsCategories();

        return view('news/categories', [
            'categoriesList' => $categories
        ]);
    }

    public function showCategories(int $id)
    {
        $categories = $this->newsCategories($id);

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
