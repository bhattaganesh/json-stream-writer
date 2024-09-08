<?php

/**
 * Contains the interface for handling file streams.
 * 
 * @package JsonStreamWriter\Contracts
 * 
 * @since 1.0.0
 */

namespace JsonStreamWriter\Contracts;

/**
 * Interface for handling file streams.
 * 
 * @since 1.0.0
 * 
 * @package JsonStreamWriter\Contracts
 */
interface FileStreamHandlerInterface
{
    /**
     * Open the file stream.
     * 
     * @since 1.0.0
     * 
     * @param string $path The path to the file
     * @param string $mode The mode in which to open the file (e.g., 'r', 'wb')
     */
    public function open(string $path, string $mode): void;

    /**
     * Write data to the file stream.
     * 
     * @since 1.0.0
     * 
     * @param string $data The data to write
     */
    public function write(string $data): void;

    /**
     * Close the file stream.
     * 
     * @since 1.0.0
     */
    public function close(): void;
}

