<?php

/**
 * Class for handling file streams.
 * 
 * @package JsonStreamWriter\Writer
 * 
 * @since 1.0.0
 */

namespace JsonStreamWriter\Writer;

use JsonStreamWriter\Contracts\FileStreamHandlerInterface;
use JsonStreamWriter\Exceptions\FileStreamException;

/**
 * Class for handling file streams.
 * 
 * @package JsonStreamWriter\Writer
 * 
 * @since 1.0.0
 */
class JsonFileStreamHandler implements FileStreamHandlerInterface {
    /**
     * The file handle.
     *
     * @var handle
     */
    private $handle;

    /**
     * Open the file stream.
     * 
     * @param string $filePath The file path to the file
     * @param string $mode The mode in which to open the file (e.g., 'r', 'wb')
     * 
     * @throws FileStreamException If the file cannot be opened
     */
    public function open(string $filePath, string $mode = 'wb'): void {
        $this->handle = fopen($filePath, $mode);
        if (!$this->handle) {
            throw new FileStreamException("Unable to open file at path: {$filePath} with mode: {$mode}");
        }
    }

    /**
     * Write data to the file stream.
     * 
     * @since 1.0.0
     * 
     * @param string $data The data to write
     */
    public function write(string $data): void {
        if (!$this->handle) {
            throw new FileStreamException("No file handle is available for writing.");
        }

        fwrite($this->handle, $data);
    }

    /**
     * Close the file stream.
     * 
     * @since 1.0.0
     */
    public function close(): void {
        fclose($this->handle);
    }
}
