<?php
declare(strict_types=1);

namespace Http;

use Psr\Http\Message\ResponseInterface;

/**
 * Class Response
 * @package Framework\Http
 */
class Response implements ResponseInterface
{
    private array $headers = [];
    private int $statusCode;
    private $body;
    private string $reasonPhrase = '';

    private static array $phrases = [
        200 => 'OK',
        301 => 'Movement Permanently',
        400 => 'Bad Request',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
    ];

    /**
     * Response constructor.
     * @param mixed $body
     * @param int $status
     */
    public function __construct($body, int $status = 200)
    {
        $this->body = $body;
        $this->statusCode = $status;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     * @return Response
     */
    public function withBody($body): Response
    {
        $new = clone $this;
        $new->body = $body;
        return $new;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function withStatusCode(int $status): Response
    {
        $new = clone $this;
        $new->statusCode = $status;
        return $new;
    }

    public function getReasonPhrase(): string
    {
        if ($this->reasonPhrase === '' && isset(self::$phrases[$this->statusCode])) {
            $this->reasonPhrase = self::$phrases[$this->statusCode];
        }

        return $this->reasonPhrase;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param string $header
     * @return bool
     */
    public function hasHeader($header): bool
    {
        return isset($this->headers[$header]);
    }

    /**
     * @param string $header
     * @return mixed|null
     */
    public function getHeader($header)
    {
        if ($this->hasHeader($header)) {
            return null;
        }
        return $this->headers[$header];
    }

    /**
     * @param string $header
     * @param mixed $value
     * @return Response
     */
    public function withHeader($header, $value): Response
    {
        $new = clone $this;
        $new->headers[$header] = $value;
        return $new;
    }

    public function getProtocolVersion()
    {
        // TODO: Implement getProtocolVersion() method.
    }

    public function withProtocolVersion($version)
    {
        // TODO: Implement withProtocolVersion() method.
    }

    public function getHeaderLine($name)
    {
        // TODO: Implement getHeaderLine() method.
    }

    public function withAddedHeader($name, $value)
    {
        // TODO: Implement withAddedHeader() method.
    }

    public function withoutHeader($name)
    {
        // TODO: Implement withoutHeader() method.
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        // TODO: Implement withStatus() method.
    }
}
