<?php

/**
 * Abstract stream writer.
 * 
 * @package JsonStreamWriter\Writer
 * 
 * @since 1.0.0
 */

namespace JsonStreamWriter\Writer;

use JsonStreamWriter\Contracts\StreamWriterInterface;
use JsonStreamWriter\Exceptions\SectionNotFoundException;

/**
 * Abstract stream writer.
 *
 * @package JsonStreamWriter\Writer
 */
abstract class AbstractStreamWriter implements StreamWriterInterface {
    /**
     * The data to be written.
     *
     * @var array
     */
    protected $data = [];

    /**
     * The active section.
     *
     * @var string|null
     */
    protected $activeSection = null;

    /**
     * {@inheritdoc}
     */
    public function setValue(string $key, $value): void {
        $this->data[$key] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function createSection(string $name): void {
        if (!isset($this->data[$name])) {
            $this->data[$name] = [];
        }
        $this->activeSection = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function appendItem(array $item): void {
        if ($this->activeSection === null) {
            throw new SectionNotFoundException('No active section. Please createSection() first.');
        }
        $this->data[$this->activeSection][] = $item;
    }

    /**
     * {@inheritdoc}
     */
    public function appendItems(array $items): void {
        foreach ($items as $item) {
            $this->appendItem($item);
        }
    }
}
