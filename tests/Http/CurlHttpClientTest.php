<?php

namespace codenixsv\Bittrex\tests\Http;

use PHPUnit\Framework\TestCase;
use codenixsv\Bittrex\Http\CurlHttpClient;

final class CurlHttpClientTest extends TestCase
{
    /**
     * @throws \codenixsv\Bittrex\Exceptions\CurlException
     */
    public function testGet()
    {
        $value = 'testvalue';
        $client = new CurlHttpClient();

        $response = $client->get('https://httpbin.org/get?test=' . $value);

        $resultArray = json_decode($response, true);
        $this->assertArrayHasKey('args', $resultArray);
        $this->assertEquals($value, $resultArray['args']['test']);
    }

    /**
     * @throws \codenixsv\Bittrex\Exceptions\CurlException
     */
    public function testPost()
    {
        $value = 'testvalue';
        $client = new CurlHttpClient();

        $response = $client->post('https://httpbin.org/post', ['test' => $value]);

        $resultArray = json_decode($response, true);
        $this->assertArrayHasKey('form', $resultArray);
        $this->assertEquals($value, $resultArray['form']['test']);
    }
}