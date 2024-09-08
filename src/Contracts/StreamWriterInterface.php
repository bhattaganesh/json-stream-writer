<?php
/**
 * Contains the interface for writing JSON files.
 * 
 *
 * @package JsonStreamWriter\Contracts
 * 
 * @since 1.0.0
 */

namespace JsonStreamWriter\Contracts;

/**
 * Interface for writing JSON files.
 * 
 * 1.0.0
 *
 * @package JsonStreamWriter\Contracts
 */
interface StreamWriterInterface {
    
    /**
     * Set a value in the JSON file.
     * 
     * @since 1.0.0
     *
     * @param string $key The key to set
     * @param mixed $value The value to set
     */
    public function setValue(string $key, $value): void;

    /**
     * Create a new section of the JSON file.
     * 
     * @since 1.0.0
     *
     * @param string $name The name of the section
     */
    public function createSection(string $name): void;
    /**
     * Append a single item to the JSON file.
     * 
     * @since 1.0.0
     *
     * @param array $item The item to append
     */
    public function appendItem(array $item): void;
    /**
     * Append multiple items to the JSON file.
     * 
     * @since 1.0.0
     *
     * @param array $items The items to append
     */
    public function appendItems(array $items): void;
    /**
     * Finalize the JSON file.
     * 
     * @since 1.0.0
     */
    public function finalize(): void;
}

