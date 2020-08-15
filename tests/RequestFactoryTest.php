<?php
declare(strict_types=1);

use Http\RequestFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestFactoryTest
 */
class RequestFactoryTest extends TestCase
{
    public function testEmpty(): void
    {
        $request = RequestFactory::fromGlobals();

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals([], $request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $data = [
            'name' => 'test',
        ];

        $request = RequestFactory::fromGlobals($data);

        self::assertEquals($data, $request->getQueryParams());
        self::assertEquals([], $request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $data = [
            'name' => 'test',
        ];

        $request = RequestFactory::fromGlobals(null, $data);

        self::assertEquals($data, $request->getParsedBody());
        self::assertEquals([], $request->getQueryParams());
    }
}
