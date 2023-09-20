<?php

namespace App\parser;

use Symfony\Component\DomCrawler\Crawler;

class CrawlerHelper {
    public static function createCrawler($html): Crawler
    {
        return new Crawler($html);
    }

    public static function extractDataFromTable(Crawler $crawler): array
    {
        $table = $crawler->filter('.accordion .accordion-item:nth-child(1)');
        $rows = $table->filter('tbody tr');

        $data = [];

        $rows->each(function (Crawler $row) use (&$data) {
            $name = $row->filter('td:nth-child(1)')->text();
            $description = $row->filter('td:nth-child(2)')->text();
            $categories = $row->closest('.accordion-item')->filter('h2')->text();
            $priceWithGranite = $row->filter('td:nth-child(3)')->text();
            $priceWithGravel = $row->filter('td:nth-child(4)')->text();

            $rowData = [
                'name' => $name,
                'categories' => $categories,
                'description' => $description,
                'price with granite' => $priceWithGranite,
                'price with gravel' => $priceWithGravel
            ];

            $data[] = $rowData;
        });

        return $data;
    }
}
