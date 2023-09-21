<?php

use App\parser\CrawlerHelper;
use PHPUnit\Framework\TestCase;

class CrawlerHelperTest extends TestCase
{
    public function testExtractDataFromTable()
    {
        $html = '
        <div class="accordion">
            <div class="accordion-item">
                <h2>Category 1</h2>
                <table>
                    <tbody>
                        <tr>
                            <td>Product 1</td>
                            <td>Description 1</td>
                            <td>Price 1 with granite</td>
                            <td>Price 1 with gravel</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        ';

        $crawler = CrawlerHelper::createCrawler($html);
        $data = CrawlerHelper::extractDataFromTable($crawler);

        $expectedData = [
            [
                'name' => 'Product 1',
                'categories' => 'Category 1',
                'description' => 'Description 1',
                'price with granite' => 'Price 1 with granite',
                'price with gravel' => 'Price 1 with gravel'
            ]
        ];

        $this->assertEquals($expectedData, $data);
    }
}