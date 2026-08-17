<?php
declare(strict_types=1);

requireRole('admin');

$activePage = 'dashboard';

$activities = [
    ['10:42 AM', 'Aid request AR-041 submitted — Wheelchair (Standard), Galle', 'P. Jayawardena (Div. Admin)', 'Pending'],
    ['10:15 AM', 'Stock release SR-041 approved — 10 Wheelchairs to Galle Div.', 'Admin', 'Approved'],
    ['09:58 AM', 'User registration — Chamara Rathnayake (Social Service Officer)', 'System', 'Pending'],
    ['09:30 AM', 'Correction request CR-012 submitted — INV-00234 quantity error', 'K. Bandara (Store Keeper)', 'Pending'],
    ['09:00 AM', 'Low stock alert — Hearing Aid (4 remaining in central store)', 'System', 'Alert'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | WIDMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-dashboard.css" rel="stylesheet">
</head>
<body>
    <?php require __DIR__ . '/../../includes/admin-sidebar.php'; ?>

    <div class="admin-shell">
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="menu-button" id="menu-button" aria-label="Open navigation">☰</button>
                <h1>Dashboard</h1>
            </div>
            <div class="topbar-actions">
                <label class="search-box">
                    <span aria-hidden="true">🔍</span>
                    <input type="search" placeholder="Search anything..." aria-label="Search">
                </label>
                <button class="notification-button" type="button" aria-label="3 notifications">
                    🔔<span>3</span>
                </button>
            </div>
        </header>

        <main class="dashboard-content">
            <section class="stats-grid" aria-label="System statistics">
                <article class="stat-card">
                    <span class="stat-icon">📦</span>
                    <p>Total Central Stock</p>
                    <strong>1,248</strong>
                    <small class="positive">↑ 12 received this week</small>
                </article>
                <article class="stat-card">
                    <span class="stat-icon">🔔</span>
                    <p>Pending Approvals</p>
                    <strong>5</strong>
                    <small class="negative">3 users · 2 aid requests</small>
                </article>
                <article class="stat-card">
                    <span class="stat-icon">🏛️</span>
                    <p>Active Social Service Officers</p>
                    <strong>50</strong>
                    <small>2 inactive · 52 total</small>
                </article>
                <article class="stat-card">
                    <span class="stat-icon">🤝</span>
                    <p>Distributions Today</p>
                    <strong>38</strong>
                    <small class="positive">↑ 6 from yesterday</small>
                </article>
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

                <article class="panel actions-panel">
                    <div class="panel-header">
                        <h2>🔔 Pending Actions</h2>
                        <button type="button" class="view-all">View All</button>
                    </div>
                    <ul class="pending-list">
                        <li><span>👥 <b>User registrations awaiting approval</b></span><em>3</em></li>
                        <li><span>📋 <b>Aid requests awaiting Admin decision</b></span><em>2</em></li>
                        <li><span>📤 <b>Stock release requests pending approval</b></span><em>1</em></li>
                        <li><span>📝 <b>Correction requests pending review</b></span><em>1</em></li>
                    </ul>
                    <div class="system-overview">
                        <h3>System Overview</h3>
                        <dl>
                            <div><dt>Central Stock Items</dt><dd>1,248</dd></div>
                            <div><dt>Total Beneficiaries</dt><dd class="green">1,892</dd></div>
                            <div><dt>Districts Covered</dt><dd>3</dd></div>
                            <div><dt>Distributions (Jun)</dt><dd class="green">284</dd></div>
                        </dl>
                    </div>
                </article>
            </section>
        </main>
    </div>

    <script src="assets/js/admin-dashboard.js"></script>
</body>
</html>
