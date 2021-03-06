<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser $parser
     * @return Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $url = "https://news.yandex.ru/music.rss";
        dd($parser->getData($url));
    }
}
