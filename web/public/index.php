<?php

namespace App;

use App\parser\CrawlerHelper;
use App\parser\CurlHelper;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$html = CurlHelper::getHtmlPage('https://www.betonvoskresensk.ru/price.html');
$crawler = CrawlerHelper::createCrawler($html);
$data = CrawlerHelper::extractDataFromTable($crawler);
echo json_encode($data, JSON_UNESCAPED_UNICODE);
