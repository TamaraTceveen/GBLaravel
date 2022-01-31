<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $availableFields = ['id', 'title', 'description', 'created_at'];

    public function newsCategories(): array
    {
        return \DB::table($this->table)
            ->select($this->availableFields)
            ->get()
            ->toArray();
    }

    public function showCategories(int $id)
    {
        return \DB::table('news')
            ->join('categories_has_news as chn', 'news.id', '=', 'chn.news_id')
            ->join('categories', 'chn.category_id', '=', 'categories.id')
            ->where('chn.category_id', '=', $id)
            ->select('news.*', 'categories.title as categoryName')
            ->get()
            ->toArray();
    }
}
