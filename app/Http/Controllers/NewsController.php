<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->getNews();

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
//        $news = $this->getNews($id);
//
//        return view('news/categories', [
//            'categoriesList' => $news
//        ]);
    }
}
