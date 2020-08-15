<?php
declare(strict_types=1);

namespace Http;

use Psr\Http\Message\StreamInterface;

/**
 * Class Stream
 * @package Framework\Http
 */
class Stream implements StreamInterface
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContents(): string
    {
        return $this->content;
    }

    public function __toString(): string
    {
        return $this->getContents();
    }

    /**
     * @param string $string
     */
    public function write($string)
    {
        $this->content .= $string;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return mb_strlen($this->content);
    }

    public function close()
    {
        // TODO: Implement close() method.
    }

    public function detach()
    {
        // TODO: Implement detach() method.
    }

    public function tell()
    {
        // TODO: Implement tell() method.
    }

    public function eof()
    {
        // TODO: Implement eof() method.
    }

    public function isSeekable()
    {
        // TODO: Implement isSeekable() method.
    }

    public function seek($offset, $whence = SEEK_SET)
    {
        // TODO: Implement seek() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    public function isWritable()
    {
        // TODO: Implement isWritable() method.
    }

    public function isReadable()
    {
        // TODO: Implement isReadable() method.
    }

    public function read($length)
    {
        // TODO: Implement read() method.
    }

    public function getMetadata($key = null)
    {
        // TODO: Implement getMetadata() method.
    }
}
