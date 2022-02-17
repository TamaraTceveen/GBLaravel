<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ParserController extends Controller
{
    /**
     * @param Request $request
     * @param Parser $service
     * @return void
     */
    public function __invoke(Request $request, Parser $service)
    {
        $url = \Arr::random(
            ['https://news.yandex.ru/music.rss', 'https://news.yandex.ru/games.rss']
        );

        $data =$service->setLink($url)->parse();

        if (array_key_exists('news', $data)) {
            $data = $data['news'];

//            foreach ($data as &$news) {
//                $news['slug'] = \Illuminate\Support\Str::slug($news['title']);
//                $news['status'] = 'active';
//                $news['created_at'] = date('Y-m-d H:i:s', strtotime($news['pubDate']));
//                unset($news['pubDate']);
//            }

            DB::table('parsingdata')->insert($data);
            dump('Новости добавлены в базу', $data);
        } else {
            dump('Ресурс не является источником новостей', $data);
        }

//        dd($service->setLink($url)->parse());
    }
}
