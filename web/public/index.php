<?php

use PHPHtmlParser\Dom;
use Symfony\Component\DomCrawler\Crawler;

require_once dirname(__DIR__) . "/vendor/autoload.php";

// Получаем HTML страницы с помощью curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.betonvoskresensk.ru/price.html');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($curl);
curl_close($curl);


// Ожидаемый результат:
//$fff = [
//    "name" => "Фундаментный блок стеновой ФБС 12-3-6т",
//    "price" => "1 100₽",
//    "categories" => "Блоки ФБС",
//    "description" => "Нормативный документ ГОСТ 13579-78 Длина, мм 1180 Ширина, мм 300 Высота, мм 580 Вес, т 0,42 Объём, м3 0,174"
//];
// Создаем объект Crawler и загружаем HTML код
$crawler = new Crawler($html);

// Ищем таблицу и извлекаем нужные данные
$table = $crawler->filter('.accordion .accordion-item:nth-child(1)');
$rows = $table->filter('tbody tr');

// Массив для хранения полученных данных
$data = [];

// Обходим каждую строку таблицы
$rows->each(function (Crawler $row) use (&$data) {
    // Извлекаем значения из ячеек
    $name = $row->filter('td:nth-child(1)')->text();
    $description = $row->filter('td:nth-child(2)')->text();
    $categories = $row->closest('.accordion-item')->filter('h2')->text();
    $priceWithGranite = $row->filter('td:nth-child(3)')->text();
    $priceWithGravel = $row->filter('td:nth-child(4)')->text();

    // Формируем ассоциативный массив для текущей строки
    $rowData = [
        'name' => $name,
        'categories' => $categories,
        'description' => $description,
        'price with granite' => $priceWithGranite,
        'price with gravel' => $priceWithGravel
    ];

    // Добавляем данные в общий массив
    $data[] = $rowData;
});

// Выводим полученные данные

echo json_encode($data, JSON_UNESCAPED_UNICODE);
