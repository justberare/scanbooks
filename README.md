# Scanbooks

This is a simple PHP web app for scanning book barcodes and saving ISBN information.

## Features

- Scan barcodes using a device camera via [QuaggaJS](https://github.com/ericblade/quagga2).
- Fetch book details from a free source: the [Open Library API](https://openlibrary.org/developers/api).
- Save scanned items in a local text file.

## Usage

1. Serve the project with a PHP server (e.g. `php -S localhost:8000`).
2. Visit `/add.php` to start scanning barcodes.
3. Scanned items are listed on the home page.

The Open Library API provides book information by ISBN without requiring an API key, making it a convenient and reliable resource for this project.
