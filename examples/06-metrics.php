<?php declare(strict_types=1);

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as HttpAdapter;
use Http\Message\MessageFactory\GuzzleMessageFactory as MessageFactory;
use Vantoozz\ProxyScraper\HttpClient\Psr18HttpClient;
use Vantoozz\ProxyScraper\Proxy;
use Vantoozz\ProxyScraper\Scrapers;

require_once __DIR__ . '/../vendor/autoload.php';

$httpClient = new Psr18HttpClient(
    new HttpAdapter(new GuzzleClient([
        'connect_timeout' => 2,
        'timeout' => 3,
    ])),
    new MessageFactory
);

$scraper = new Scrapers\FreeProxyListScraper($httpClient);

/** @var Proxy $proxy */
$proxy = $scraper->get()->current();

foreach ($proxy->getMetrics() as $metric) {
    echo $metric->getName() . ': ' . $metric->getValue() . "\n";
}
