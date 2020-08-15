<?php
declare(strict_types=1);

use Http\Response;
use PHPUnit\Framework\TestCase;


/**
 * Class ResponseTest
 */
class ResponseTest extends TestCase
{
    public function testEmpty(): void
    {
        $response = new Response($body = 'body');

        self::assertEquals($body, $response->getBody());
        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('OK', $response->getReasonPhrase());
    }

    public function test404(): void
    {
        $response = new Response($body = 'body', $status = 404);

        self::assertEquals($body, $response->getBody());
        self::assertEquals($status, $response->getStatusCode());
        self::assertEquals('Not Found', $response->getReasonPhrase());
    }

    public function testHeaders(): void
    {
        $response = (new Response('body'))
            ->withHeader($header1 = 'X-Test-1', $value1 = 'test1')
            ->withHeader($header2 = 'X-Test-2', $value2 = 'test2');

        self::assertEquals([
            $header1 => $value1,
            $header2 => $value2,
        ], $response->getHeaders());
    }
}
