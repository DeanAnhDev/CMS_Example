<?php
//
//namespace App\Console\Commands;
//
//use App\Models\Articles;
//use App\Models\Categories;
//use App\Models\CategoryDetail;
//use Illuminate\Console\Command;
//use Symfony\Component\DomCrawler\Crawler;
//
//class test extends Command
//{
//    protected $signature = 'crawl:dantri';
//    protected $description = 'Crawl DanTri categories and subcategories';
//
//    public function handle()
//    {
//        $html = file_get_contents('https://dantri.com.vn');
//        $crawler = new Crawler($html);
//
//        $crawler->filterXPath("//ol[@class='menu-wrap bg-wrap']/li[@class='has-child']")->each(function ($node) {
//            $a = $node->filter('a')->first();
//            $name = trim($a->text());
//            $url = $a->attr('href');
//            $slug = basename($url);
//
//            $category = Categories::firstOrCreate(
//                ['slug' => $slug],
//                ['name' => $name, 'url' => $url]
//            );
//
//            // Với mỗi category con
//            $node->filter('ol.submenu > li > a')->each(function ($sub) use ($category) {
//                $subName = trim($sub->text());
//                $subUrl = $sub->attr('href');
//                $subSlug = basename($subUrl);
//
//                $detail = CategoryDetail::firstOrCreate(
//                    ['slug' => $subSlug],
//                    ['category_id' => $category->id, 'name' => $subName, 'url' => $subUrl]
//                );
//
//                $this->info("→ Crawl bài viết: " . $subName);
//
//                // Gọi hàm crawl bài viết từ subUrl
//                $this->crawlArticles($detail, $subUrl);
//            });
//        });
//
//        $this->info("Done!");
//    }
//
//    protected function crawlArticles(CategoryDetail $detail, string $subUrl)
//    {
//        $html = @file_get_contents($subUrl);
//        if (!$html) {
//            $this->error("❌ Không tải được URL: $subUrl");
//            return;
//        }
//
//        $crawler = new Crawler($html);
//        $nodes = $crawler->filter('h3.article-title a');
//
//        $this->info("   Tìm thấy " . $nodes->count() . " bài viết");
//
//        $nodes->each(function ($node) use ($detail) {
//            $title = trim($node->text());
//            $url   = $node->attr('href');
//            if (!str_starts_with($url, 'http')) {
//                $url = 'https://dantri.com.vn' . $url;
//            }
//            $slug = basename($url);
//
//            if (Articles::where('slug', $slug)->exists()) {
//                $this->line("   ➖ Bỏ qua (đã tồn tại): $title");
//                return;
//            }
//
//            $this->line("   ➕ Crawl article: $title");
//
//            $detailHtml = @file_get_contents($url);
//            if (!$detailHtml) {
//                $this->error("      ✖️ Không tải bài: $url");
//                return;
//            }
//
//            $dCrawler = new Crawler($detailHtml);
//
//            // Lấy excerpt
//            $excerptNode = $dCrawler->filter('h2.singular-sapo');
//            $excerpt = $excerptNode->count() ? trim($excerptNode->text()) : null;
//
//            // Lấy content HTML
//            $contentNode = $dCrawler->filter('div.singular-content');
//            $content = $contentNode->count() ? $contentNode->html() : null;
//
//            // Lấy thumbnail
//            $thumbNode = $contentNode->count() ? $contentNode->filter('img')->first() : null;
//            $thumbnail = ($thumbNode && $thumbNode->count()) ? $thumbNode->attr('src') : null;
//
//            if (!$content) {
//                $this->error("      ❌ Không có nội dung bài viết: $url");
//                return;
//            }
//
//            Articles::create([
//                'category_detail_id' => $detail->id,
//                'title'              => $title,
//                'slug'               => $slug,
//                'url'                => $url,
//                'excerpt'            => $excerpt,
//                'thumbnail'          => $thumbnail,
//                'content'            => $content,
//                'author_id'          => 1,
//                'status'             => 'published',
//            ]);
//
//
//            $this->info("      ✅ Đã lưu: $title");
//        });
//    }
//
//}
