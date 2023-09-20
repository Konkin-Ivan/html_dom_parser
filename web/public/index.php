<?php

namespace App;

use function App\parser\createCrawler;
use function App\parser\extractDataFromTable;
use function App\parser\getHtmlPage;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$html = getHtmlPage('https://www.betonvoskresensk.ru/price.html');
$crawler = createCrawler($html);
$data = extractDataFromTable($crawler);
echo json_encode($data, JSON_UNESCAPED_UNICODE);
