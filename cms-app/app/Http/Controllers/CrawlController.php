<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CrawlController extends Controller
{
    public function crawlArticle(Request $request)
    {
        $targetUrl = $request->query('url');

        if (!$targetUrl || !filter_var($targetUrl, FILTER_VALIDATE_URL)) {
            return response()->json(['error' => 'URL không hợp lệ'], 400);
        }

        $response = Http::get($targetUrl);

        if (!$response->successful()) {
            return response()->json(['error' => 'Không thể truy cập URL'], 500);
        }

        $html = $response->body();

        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML($html);
        $xpath = new \DOMXPath($dom);

        $node = $xpath->query('//article')->item(0);

        if (!$node) {
            return response()->json(['html' => 'Không tìm thấy <article>']);
        }

        $innerHTML = '';
        foreach ($node->childNodes as $child) {
            $innerHTML .= $dom->saveHTML($child);
        }

        return response()->json(['html' => $innerHTML]);
    }
}
