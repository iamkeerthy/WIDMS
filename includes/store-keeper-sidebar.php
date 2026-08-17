<?php
declare(strict_types=1);

$navigation = require __DIR__ . '/store-keeper-navigation.php';
$activePage = $activePage ?? 'dashboard';
$keeperName = htmlspecialchars((string) $_SESSION['full_name'], ENT_QUOTES, 'UTF-8');
?>
<aside class="sidebar" id="admin-sidebar">
    <div class="sidebar-brand">
        <span class="sidebar-logo">W</span>
        <span><strong>WIDMS</strong></span>
        <button type="button" class="sidebar-close" id="sidebar-close" aria-label="Close navigation">&times;</button>
    </div>

    <div class="admin-profile">
        <span class="profile-avatar keeper-avatar"><?= strtoupper(substr($keeperName, 0, 1)) ?></span>
        <span><strong><?= $keeperName ?></strong><small>Store Keeper</small></span>
    </div>

    <nav class="sidebar-nav" aria-label="Store Keeper navigation">
        <?php foreach ($navigation as $section => $items): ?>
            <p class="nav-heading"><?= htmlspecialchars($section, ENT_QUOTES, 'UTF-8') ?></p>
            <?php foreach ($items as $item): ?>
                <a href="<?= $item['page'] === 'dashboard' ? 'dashboard.php' : '#' ?>"
                   class="nav-link<?= $item['page'] === $activePage ? ' active' : '' ?>">
                    <span class="nav-icon" aria-hidden="true"><?= $item['icon'] ?></span>
                    <span><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></span>
                </a>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </nav>

    <a class="sign-out" href="logout.php">← Sign Out</a>
</aside>
<div class="sidebar-overlay" id="sidebar-overlay"></div>
