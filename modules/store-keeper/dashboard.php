<?php
declare(strict_types=1);

requireRole('store-keeper');
$activePage = 'dashboard';

$activities = [
    ['10:00 AM', 'Dispatch completed — 10 Wheelchairs to Galle Division (SR-041)', 'Me', 'Done'],
    ['09:30 AM', 'Batch recorded — 20 Spectacles from Vision Care Co. Ltd', 'Me', 'Done'],
    ['09:00 AM', 'Low stock alert — Hearing Aid (4 remaining)', 'System', 'Alert'],
    ['08:55 AM', 'Payment recorded — ABC Medical Co. Rs 100,000 (CHQ-009823)', 'Me', 'Done'],
    ['08:30 AM', 'Correction request CR-012 submitted for INV-00234', 'Me', 'Pending'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Store Keeper Dashboard | WIDMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-dashboard.css" rel="stylesheet">
</head>
<body>
    <?php require __DIR__ . '/../../includes/store-keeper-sidebar.php'; ?>

    <div class="admin-shell">
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="menu-button" id="menu-button" aria-label="Open navigation">☰</button>
                <h1>Dashboard</h1>
            </div>
            <div class="topbar-actions">
                <label class="search-box"><span aria-hidden="true">🔍</span><input type="search" placeholder="Search anything..." aria-label="Search"></label>
                <button class="notification-button" type="button" aria-label="Notifications">🔔</button>
            </div>
        </header>

        <main class="dashboard-content">
            <section class="stats-grid" aria-label="Store Keeper statistics">
                <article class="stat-card"><span class="stat-icon">📥</span><p>Items to Dispatch</p><strong>2</strong><small class="negative">Approved, awaiting release</small></article>
                <article class="stat-card"><span class="stat-icon">📦</span><p>Central Stock Items</p><strong>856</strong><small>Across 24 item types</small></article>
                <article class="stat-card"><span class="stat-icon">⚠️</span><p>Low Stock Alerts</p><strong>3</strong><small class="negative">Hearing Aid · Wheelchair P</small></article>
                <article class="stat-card"><span class="stat-icon">💳</span><p>Outstanding Payments</p><strong>Rs 274,500</strong><small class="negative">2 suppliers</small></article>
            </section>

            <section class="dashboard-grid">
                <article class="panel activity-panel">
                    <div class="panel-header"><h2>📋 Recent Activity</h2></div>
                    <div class="activity-table-wrap">
                        <table class="activity-table">
                            <thead><tr><th>Time</th><th>Action</th><th>By</th><th>Status</th></tr></thead>
                            <tbody>
                                <?php foreach ($activities as $activity): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($activity[0], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($activity[1], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($activity[2], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><span class="status <?= strtolower($activity[3]) ?>"><?= htmlspecialchars($activity[3], ENT_QUOTES, 'UTF-8') ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </article>

                <article class="panel attention-panel">
                    <div class="panel-header"><h2>⚠️ Items Requiring Attention</h2></div>
                    <div class="attention-content">
                        <h3>Low Stock Alerts</h3>
                        <ul class="low-stock-list">
                            <li><span><b>Hearing Aid</b> — Behind-the-ear<small>Only 4 remaining · minimum threshold: 10</small></span><em>Low</em></li>
                            <li><span><b>Wheelchair</b> — Pediatric<small>Only 8 remaining · minimum threshold: 15</small></span><em>Low</em></li>
                            <li><span><b>Tricycle</b> — Heavy-Duty<small>Only 2 remaining · minimum threshold: 10</small></span><em>Low</em></li>
                        </ul>

                        <h3 class="dispatch-heading">Pending Dispatches</h3>
                        <ul class="dispatch-list">
                            <li><span><b>Wheelchair (Standard) × 10</b><small>To: Galle Division · Ref: SR-041</small></span><button type="button">Dispatch</button></li>
                            <li><span><b>Spectacles × 20</b><small>To: Matara Division · Ref: SR-039</small></span><button type="button">Dispatch</button></li>
                        </ul>
                    </div>
                </article>
            </section>
        </main>
    </div>

    <script src="assets/js/admin-dashboard.js"></script>
</body>
</html>
