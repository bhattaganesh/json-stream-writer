<?php

/**
 * Class for writing JSON files.
 * 
 * @package JsonStreamWriter\Writer
 * 
 * @since 1.0.0
 */

namespace JsonStreamWriter\Writer;

use JsonStreamWriter\Writer\AbstractStreamWriter;
use JsonStreamWriter\Writer\JsonFileStreamHandler;
use JsonStreamWriter\Exceptions\StreamWriterException;

/**
 * Class for writing JSON files.
 *
 * @package JsonStreamWriter\Writer
 *
 * @since 1.0.0
 */
class JsonStreamWriter extends AbstractStreamWriter {
    use JsonPrettyPrintTrait;

    /**
     * The file handler.
     *
     * @var JsonFileStreamHandler
     */
    private $fileHandler;

    /**
     * Constructor.
     *
     * @param string $filePath The path to the file
     * @param bool $prettyPrint Whether to pretty-print the JSON output
     */
    public function __construct(string $filePath, bool $prettyPrint = false) {
        $this->fileHandler = new JsonFileStreamHandler();
        $this->fileHandler->open($filePath);
        $this->enablePrettyPrint($prettyPrint);
    }

    /**
     * Finalize the JSON file.
     *
     * @since 1.0.0
     *
     * @throws StreamWriterException If the JSON data cannot be encoded
     */
    public function finalize(): void {
        $jsonOptions = $this->getJsonEncodingOptions();
        $encodedData = json_encode($this->data, $jsonOptions);
        if ($encodedData === false) {
            throw new StreamWriterException('Error encoding JSON data');
        }

        $this->fileHandler->write($encodedData);
        $this->fileHandler->close();
    }
}
