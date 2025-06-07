<?php
header('Content-Type: application/json');
$barcode = preg_replace('/[^0-9Xx]/', '', $_POST['barcode'] ?? '');
if (!$barcode) {
    echo json_encode(['message' => 'Invalid barcode']);
    exit;
}
$info = ['isbn' => $barcode];
$apiUrl = "https://openlibrary.org/api/books?bibkeys=ISBN:$barcode&jscmd=data&format=json";
$resp = @file_get_contents($apiUrl);
if ($resp !== false) {
    $data = json_decode($resp, true);
    $key = "ISBN:$barcode";
    if (isset($data[$key]['title'])) {
        $info['title'] = $data[$key]['title'];
    }
}
$itemsFile = __DIR__.'/data/items.txt';
file_put_contents($itemsFile, json_encode($info).PHP_EOL, FILE_APPEND);

echo json_encode(['message' => 'Saved']);
