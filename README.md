# JSON Stream Writer

A PHP library to efficiently write large JSON datasets to a file. This is useful when dealing with large amounts of data and you need to export it to JSON without consuming too much memory.

## Installation

Via Composer:

```bash
composer require bhattaganesh/json-stream-writer
```


## Usage

```php

require_once __DIR__ . '/../vendor/autoload.php';

use JsonStreamWriter\Writer\JsonStreamWriter;

try {
    $streamWriter = new JsonStreamWriter(__DIR__ . '/output.json', true); // Use false to disable pretty-printing

    // Set metadata for the JSON file
    $streamWriter->setValue('manifest', array(
        'version' => '1.0',
        'created_at' => date('Y-m-d H:i:s')
    ));

    // Create a new section called "users"
    $streamWriter->createSection('users');

    // Append items to the "users" section
    $streamWriter->appendItems(array_fill(0, 3000, [
        'id' => rand(1, 10000), // Random ID between 1 and 10000
        'name' => 'User ' . rand(1, 10000), // Random name
        'email' => 'user' . rand(1, 10000) . '@example.com', // Random email
    ]));

    // Create another section called "products"
    $streamWriter->createSection('products');

    // Append items to the "products" section
    $streamWriter->appendItems([
        ['id' => 101, 'name' => 'Laptop', 'price' => 999.99],
        ['id' => 102, 'name' => 'Mouse', 'price' => 19.99],
    ]);

    // Finalize the JSON file
    $streamWriter->finalize();

    echo "JSON stream writing completed successfully.\n";
} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
}