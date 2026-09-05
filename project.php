<?php

declare(strict_types=1);

$projects = require __DIR__ . '/config/projects.php';
$slug = isset($_GET['slug']) ? (string) $_GET['slug'] : '';
$project = null;
foreach ($projects as $item) {
    if ($item['slug'] === $slug) {
        $project = $item;
        break;
    }
}
if ($project === null) {
    http_response_code(404);
}
$statusClass = static fn(string $status): string => strtolower(str_replace([' ', '/'], '-', $status));
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if ($project): ?>
<meta name="description" content="<?= htmlspecialchars($project['summary']) ?>">
<title><?= htmlspecialchars($project['title']) ?> — BLACKMEVALLY</title>
<?php else: ?>
<title>Project Not Found — BLACKMEVALLY</title>
<?php endif; ?>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header"><div class="container nav-wrap"><a class="brand" href="index.php">BLACKMEVALLY</a><nav><a href="index.php#products">Products</a><a href="index.php#solutions">Solutions</a><a href="index.php#about">About</a><a class="nav-cta" href="index.php#contact">Contact</a></nav></div></header>
<main>
<?php if (!$project): ?>
<section class="detail section"><div class="container"><span class="eyebrow">404</span><h1>Project not found.</h1><a class="btn btn-primary" href="index.php#products">Back to products</a></div></section>
<?php else: ?>
<section class="detail section">
  <div class="container">
    <a class="back-link" href="index.php#products">← Back to products</a>
    <div class="detail-hero">
      <div>
        <span class="eyebrow"><?= htmlspecialchars($project['category']) ?> • <?= htmlspecialchars($project['type']) ?></span>
        <h1><?= htmlspecialchars($project['title']) ?></h1>
        <p class="detail-summary"><?= htmlspecialchars($project['summary']) ?></p>
        <div class="detail-status-row"><span class="status status-<?= htmlspecialchars($statusClass($project['status'])) ?>">● <?= htmlspecialchars($project['status']) ?></span><span class="commercial-badge"><?= htmlspecialchars($project['availability']) ?></span></div>
      </div>
      <div class="product-visual"><div class="visual-label">BLACKMEVALLY / PRODUCT</div><div class="visual-title"><?= htmlspecialchars($project['title']) ?></div><div class="visual-grid"></div></div>
    </div>

    <div class="detail-grid">
      <section><span class="eyebrow">PROBLEM</span><h2>The problem</h2><p><?= htmlspecialchars($project['problem']) ?></p></section>
      <section><span class="eyebrow">SOLUTION</span><h2>The solution</h2><p><?= htmlspecialchars($project['solution']) ?></p></section>
    </div>

    <section class="detail-block"><span class="eyebrow">CAPABILITIES</span><h2>Key features</h2><div class="feature-grid"><?php foreach ($project['features'] as $feature): ?><div class="feature-item">✓ <?= htmlspecialchars($feature) ?></div><?php endforeach; ?></div></section>
    <section class="detail-block"><span class="eyebrow">TECHNOLOGY</span><h2>Technology stack</h2><div class="tags large-tags"><?php foreach ($project['stack'] as $tag): ?><span><?= htmlspecialchars($tag) ?></span><?php endforeach; ?></div></section>

    <section class="commercial-panel">
      <div><span class="eyebrow">COMMERCIAL</span><h2>Interested in this product?</h2><p>This project can be evaluated for deployment, customization, integration, licensing, or further development.</p></div>
      <div class="commercial-actions">
        <?php if ($project['repo']): ?><a class="btn btn-ghost" target="_blank" rel="noopener" href="<?= htmlspecialchars($project['repo']) ?>">View GitHub</a><?php endif; ?>
        <a class="btn btn-primary" href="mailto:contact@blackmevally.dev?subject=Inquiry%20-%20<?= rawurlencode($project['title']) ?>">Request a Demo</a>
      </div>
    </section>
  </div>
</section>
<?php endif; ?>
</main>
<footer class="site-footer"><div class="container"><span>© <?= date('Y') ?> BLACKMEVALLY</span><span>PHP / XAMPP Portfolio</span></div></footer>
</body>
</html>
