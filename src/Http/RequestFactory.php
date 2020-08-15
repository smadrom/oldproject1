<?php
declare(strict_types=1);

namespace Http;

/**
 * Class RequestFactory
 * @package Framework\Http
 */
class RequestFactory
{
    public static function fromGlobals(array $query = null, array $body = null): Request
    {
        return (new Request())
            ->withQueryParams($query ?: $_GET)
            ->withParsedBody($body ?: $_POST);
    }
}
