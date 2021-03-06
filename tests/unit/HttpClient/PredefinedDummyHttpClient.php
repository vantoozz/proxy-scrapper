<?php declare(strict_types=1);

namespace Vantoozz\ProxyScraper\UnitTests\HttpClient;

use Vantoozz\ProxyScraper\HttpClient\HttpClientInterface;

/**
 * Class PredefinedDummyHttpClient
 * @package Vantoozz\ProxyScraper\UnitTests\HttpClient
 */
final class PredefinedDummyHttpClient implements HttpClientInterface
{

    /**
     * @var string
     */
    private $response;

    /**
     * PredefinedDummyHttpClient constructor.
     * @param string $response
     */
    public function __construct(string $response)
    {
        $this->response = $response;
    }

    /**
     * @param string $uri
     * @return string
     */
    public function get(string $uri): string
    {
        return $this->response;
    }
}
