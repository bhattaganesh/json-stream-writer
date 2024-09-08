<?php

/**
 * Trait providing a method to enable pretty-printing of JSON output.
 * 
 * @package JsonStreamWriter\Writer
 * 
 * @since 1.0.0
 */

namespace JsonStreamWriter\Writer;

/**
 * Trait providing a method to enable pretty-printing of JSON output.
 * 
 * @package JsonStreamWriter\Writer
 * 
 * @since 1.0.0
 */
trait JsonPrettyPrintTrait {
    /**
     * Whether to pretty-print the JSON output.
     * 
     * @var bool
     */
    protected $prettyPrint = false;

    /**
     * Enable or disable pretty-printing of the JSON output.
     * 
     * @since 1.0.0
     * 
     * @param bool $enabled Whether to enable pretty-printing
     */
    public function enablePrettyPrint(bool $enabled): void {
        $this->prettyPrint = $enabled;
    }

    /**
     * Get the JSON encoding options.
     * 
     * @since 1.0.0
     * 
     * @return int The JSON encoding options
     */
    protected function getJsonEncodingOptions(): int {
        return $this->prettyPrint ? JSON_PRETTY_PRINT : 0;
    }
}
