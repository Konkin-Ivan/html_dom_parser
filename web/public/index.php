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
// Создаем объект PHPQuery и загружаем HTML код
$doc = phpQuery::newDocument($html);

// Ищем таблицу и извлекаем нужные данные
$table = $doc->find('.table');
$rows = $table->find('tbody tr');

// Массив для хранения полученных данных
$data = [];

// Обходим каждую строку таблицы
foreach ($rows as $row) {
    // Создаем объект PHPQuery для текущей строки
    $pq = pq($row);

    // Извлекаем значения из ячеек
    $name = $pq->find('td:nth-child(1)')->text();
    $price = $pq->find('td:nth-child(3)')->text();
    $categories = $pq->prevAll('.accordion-header')->find('button')->text();
    $description = $pq->find('td:nth-child(2) a')->attr('title');

    // Формируем ассоциативный массив для текущей строки
    $rowData = [
        'name' => $name,
        'price' => $price,
        'categories' => $categories,
        'description' => $description
    ];

    // Добавляем данные в общий массив
    $data[] = $rowData;
}

// Выводим полученные данные
echo json_encode($data, JSON_UNESCAPED_UNICODE);
