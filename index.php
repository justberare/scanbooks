<?php
$itemsFile = __DIR__.'/data/items.txt';
$items = [];
if (file_exists($itemsFile)) {
    $lines = file($itemsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $item = json_decode($line, true);
        if ($item) $items[] = $item;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Scanbooks - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container my-4">
  <h1>Scanned Items</h1>
  <?php if (empty($items)): ?>
    <p>No items scanned yet.</p>
  <?php else: ?>
    <?php foreach ($items as $item): ?>
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-1"><?= htmlspecialchars($item['title'] ?? 'Unknown'); ?></h5>
          <p class="card-text mb-0">ISBN: <?= htmlspecialchars($item['isbn']); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
<?php include 'navbar.php'; ?>
</body>
</html>
