<?php

declare(strict_types=1);

$projects = require __DIR__ . '/config/projects.php';
$categories = array_values(array_unique(array_column($projects, 'category')));
$statusClass = static fn(string $status): string => strtolower(str_replace([' ', '/'], '-', $status));
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Blackmevally — software systems, healthcare solutions, digital community platforms, and practical automation.">
<title>BLACKMEVALLY — Software Systems & Digital Solutions</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="index.php">BLACKMEVALLY</a>
    <nav>
      <a href="#products">Products</a>
      <a href="#solutions">Solutions</a>
      <a href="#about">About</a>
      <a class="nav-cta" href="#contact">Contact</a>
    </nav>
  </div>
</header>

<main>
<section class="hero">
  <div class="container hero-grid">
    <div>
      <span class="eyebrow">SOFTWARE • SYSTEMS • AUTOMATION</span>
      <h1>Software systems built for <span>real-world operations.</span></h1>
      <p class="hero-copy">Practical digital solutions for healthcare, community services, infrastructure, and automation — designed to be deployed, customized, and improved.</p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="#products">Explore Products</a>
        <a class="btn btn-ghost" href="#contact">Request a Demo</a>
      </div>
    </div>
    <div class="hero-card">
      <div class="terminal-top"><i></i><i></i><i></i></div>
      <div class="terminal-line"><span>$</span> portfolio --status</div>
      <div class="terminal-line muted">10 products / projects cataloged</div>
      <div class="terminal-line"><span>+</span> Healthcare systems</div>
      <div class="terminal-line"><span>+</span> Community platforms</div>
      <div class="terminal-line"><span>+</span> Automation & infrastructure</div>
      <div class="terminal-line accent">Ready for deployment & customization.</div>
    </div>
  </div>
</section>

<section id="products" class="section">
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">CATALOG</span>
        <h2>Products & Projects</h2>
      </div>
      <p>Open-source work and commercial-ready systems are presented separately so each project has a clear path from prototype to deployment.</p>
    </div>

    <div class="filters">
      <button class="filter active" data-filter="all">All</button>
      <?php foreach ($categories as $category): ?>
        <button class="filter" data-filter="<?= htmlspecialchars(strtolower($category)) ?>"><?= htmlspecialchars($category) ?></button>
      <?php endforeach; ?>
    </div>

    <div class="project-grid" id="projectGrid">
      <?php foreach ($projects as $project): ?>
      <article class="project-card" data-category="<?= htmlspecialchars(strtolower($project['category'])) ?>">
        <div class="project-card-top">
          <span class="project-category"><?= htmlspecialchars($project['category']) ?></span>
          <span class="status status-<?= htmlspecialchars($statusClass($project['status'])) ?>">● <?= htmlspecialchars($project['status']) ?></span>
        </div>
        <h3><?= htmlspecialchars($project['title']) ?></h3>
        <p class="project-type"><?= htmlspecialchars($project['type']) ?></p>
        <p><?= htmlspecialchars($project['summary']) ?></p>
        <div class="tags">
          <?php foreach (array_slice($project['stack'], 0, 4) as $tag): ?>
            <span><?= htmlspecialchars($tag) ?></span>
          <?php endforeach; ?>
        </div>
        <div class="project-footer">
          <span class="commercial-badge"><?= htmlspecialchars($project['availability']) ?></span>
          <a class="arrow-link" href="project.php?slug=<?= urlencode($project['slug']) ?>">View product →</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="solutions" class="section section-alt">
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">WHAT I BUILD</span>
        <h2>From operational problem to deployable system.</h2>
      </div>
    </div>
    <div class="solution-grid">
      <div class="solution"><b>🏥 Healthcare</b><p>Queue systems, dashboards, SIMRS extensions, interoperability, monitoring, and medical-imaging workflows.</p></div>
      <div class="solution"><b>🕌 Community</b><p>Digital information systems and TV/kiosk experiences for community organizations and local services.</p></div>
      <div class="solution"><b>⚙️ Automation</b><p>Practical automation connecting web applications, devices, recognition systems, and operational workflows.</p></div>
    </div>
  </div>
</section>

<section id="about" class="section">
  <div class="container about-grid">
    <div>
      <span class="eyebrow">BLACKMEVALLY</span>
      <h2>Independent software development with a deployment-first mindset.</h2>
    </div>
    <div class="about-copy">
      <p>Blackmevally is a growing collection of practical software projects focused on solving real operational problems. The portfolio is intentionally product-oriented: each system can evolve into a deployment package, custom implementation, integration service, or commercial product.</p>
      <p>Public repositories show the engineering work where appropriate; private or commercial-oriented systems are described without exposing sensitive implementation details.</p>
    </div>
  </div>
</section>

<section id="contact" class="cta-section">
  <div class="container cta-inner">
    <div><span class="eyebrow">INTERESTED?</span><h2>Need a system like one of these?</h2><p>Available for deployment, integration, customization, and further development.</p></div>
    <a class="btn btn-primary" href="mailto:contact@blackmevally.dev">Contact Blackmevally</a>
  </div>
</section>
</main>

<footer class="site-footer"><div class="container"><span>© <?= date('Y') ?> BLACKMEVALLY</span><span>PHP / XAMPP Portfolio</span></div></footer>
<script src="assets/js/app.js"></script>
</body>
</html>
