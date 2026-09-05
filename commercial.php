<?php
declare(strict_types=1);

$lang = (($_GET['lang'] ?? 'id') === 'en') ? 'en' : 'id';

$t = $lang === 'id'
    ? [
        'title' => 'Commercial & Licensing',
        'eyebrow' => 'COMMERCIAL',
        'headline' => 'Turn a proven system into your deployment.',
        'copy' => 'Software dapat dilisensikan, dikustomisasi, diintegrasikan, dan dikembangkan sesuai kebutuhan organisasi.',
        'model' => 'Model kerja',
        'items' => [
            ['title' => 'License', 'text' => 'Hak penggunaan software untuk environment dan jumlah deployment yang disepakati.'],
            ['title' => 'Customization', 'text' => 'Penyesuaian UI, workflow, business rules, dan kebutuhan organisasi.'],
            ['title' => 'Integration', 'text' => 'Koneksi dengan SIMRS, API, database, perangkat, atau sistem lain.'],
            ['title' => 'Development', 'text' => 'Pengembangan fitur baru, maintenance, dan roadmap produk.'],
        ],
        'cta' => 'Diskusikan Kebutuhan',
        'back' => '← Kembali ke portfolio',
        'trust' => 'WHAT YOU GET',
        'trustItems' => [
            'Scope dan requirement yang jelas',
            'Deployment plan sesuai environment',
            'Testing dan handover',
            'Dokumentasi konfigurasi',
            'Opsi support dan pengembangan lanjutan',
        ],
    ]
    : [
        'title' => 'Commercial & Licensing',
        'eyebrow' => 'COMMERCIAL',
        'headline' => 'Turn a proven system into your deployment.',
        'copy' => 'Software can be licensed, customized, integrated, and further developed for your organization.',
        'model' => 'Engagement model',
        'items' => [
            ['title' => 'License', 'text' => 'Usage rights for agreed environments and deployment scope.'],
            ['title' => 'Customization', 'text' => 'UI, workflow, business rules, and organization-specific adjustments.'],
            ['title' => 'Integration', 'text' => 'Connect with SIMRS, APIs, databases, devices, or other systems.'],
            ['title' => 'Development', 'text' => 'New features, maintenance, and ongoing product roadmap.'],
        ],
        'cta' => 'Discuss Your Needs',
        'back' => '← Back to portfolio',
        'trust' => 'WHAT YOU GET',
        'trustItems' => [
            'Clear scope and requirements',
            'Deployment plan for your environment',
            'Testing and handover',
            'Configuration documentation',
            'Optional support and further development',
        ],
    ];
?>
<!doctype html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="BLACKMEVALLY commercial software licensing, customization, integration, deployment, and development services.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Commercial & Licensing — BLACKMEVALLY">
    <meta property="og:description" content="Software licensing, customization, integration, deployment, and further development.">
    <meta property="og:image" content="assets/img/og-default.svg">
    <meta name="twitter:card" content="summary_large_image">
    <title><?= htmlspecialchars($t['title']) ?> — BLACKMEVALLY</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php?lang=<?= $lang ?>">BLACKMEVALLY</a>
        <nav>
            <a href="index.php?lang=<?= $lang ?>#products">Products</a>
            <a href="commercial.php?lang=<?= $lang ?>"><?= htmlspecialchars($t['title']) ?></a>
            <a href="contact.php?lang=<?= $lang ?>">Contact</a>
            <span class="lang-switch">
                <a href="?lang=id" class="<?= $lang === 'id' ? 'active' : '' ?>">ID</a>
                <a href="?lang=en" class="<?= $lang === 'en' ? 'active' : '' ?>">EN</a>
            </span>
        </nav>
    </div>
</header>

<main>
    <section class="commercial-hero section">
        <div class="container narrow">
            <span class="eyebrow"><?= htmlspecialchars($t['eyebrow']) ?></span>
            <h1><?= htmlspecialchars($t['headline']) ?></h1>
            <p class="hero-copy"><?= htmlspecialchars($t['copy']) ?></p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <div>
                    <span class="eyebrow">OPTIONS</span>
                    <h2><?= htmlspecialchars($t['model']) ?></h2>
                </div>
            </div>

            <div class="solution-grid commercial-grid">
                <?php foreach ($t['items'] as $i => $item): ?>
                    <article class="solution">
                        <span class="card-index">0<?= $i + 1 ?></span>
                        <h3><?= htmlspecialchars($item['title']) ?></h3>
                        <p><?= htmlspecialchars($item['text']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section-alt">
        <div class="container">
            <div class="section-head">
                <div>
                    <span class="eyebrow"><?= htmlspecialchars($t['trust']) ?></span>
                    <h2><?= $lang === 'id' ? 'Deployment dengan ekspektasi yang jelas.' : 'Deployment with clear expectations.' ?></h2>
                </div>
            </div>

            <div class="trust-list">
                <?php foreach ($t['trustItems'] as $i => $item): ?>
                    <div>
                        <b>0<?= $i + 1 ?></b>
                        <span><?= htmlspecialchars($item) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container cta-inner">
            <div>
                <span class="eyebrow">NEXT STEP</span>
                <h2><?= htmlspecialchars($t['cta']) ?></h2>
                <p><?= $lang === 'id' ? 'Mulai dengan demo atau requirement singkat.' : 'Start with a demo or a short requirements brief.' ?></p>
            </div>
            <a class="btn btn-primary" href="demo.php?lang=<?= $lang ?>"><?= htmlspecialchars($t['cta']) ?> →</a>
        </div>
    </section>
</main>

<footer class="site-footer">
    <div class="container">
        <span>© <?= date('Y') ?> BLACKMEVALLY</span>
        <a href="index.php?lang=<?= $lang ?>"><?= htmlspecialchars($t['back']) ?></a>
    </div>
</footer>
</body>
</html>
