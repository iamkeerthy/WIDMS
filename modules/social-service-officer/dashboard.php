<?php
declare(strict_types=1);

requireRole('social-service-officer');
$activePage = 'dashboard';

$activities = [
    ['10:42 AM', 'Distributed Wheelchair (Standard) → Nimal Kumar (NIC 901234567V)', 'Me', 'Done'],
    ['10:15 AM', 'Aid request AR-041 submitted — Nimal Kumar, Wheelchair', 'Me', 'Pending'],
    ['09:30 AM', 'Return processed — Wheelchair, Anura W. — Good condition → Reused', 'Me', 'Reused'],
    ['09:00 AM', 'Aid request AR-038 rejected — Kumari Perera (ineligible)', 'Admin', 'Rejected'],
    ['08:30 AM', 'Distributed Spectacles → Chamara Mendis (NIC 730456789V)', 'Me', 'Done'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Service Officer Dashboard | WIDMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-dashboard.css" rel="stylesheet">
</head>
<body>
    <?php require __DIR__ . '/../../includes/social-service-officer-sidebar.php'; ?>

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
            <section class="stats-grid" aria-label="Social Service Officer statistics">
                <article class="stat-card"><span class="stat-icon">📦</span><p>My Pool Quota (Remaining)</p><strong>26</strong><small>Across 4 item types</small></article>
                <article class="stat-card"><span class="stat-icon">🤝</span><p>Distributed Today</p><strong>3</strong><small class="positive">To 3 beneficiaries</small></article>
                <article class="stat-card"><span class="stat-icon">📋</span><p>My Open Requests</p><strong>1</strong><small class="negative">Awaiting Admin approval</small></article>
                <article class="stat-card"><span class="stat-icon">🔄</span><p>Returns This Month</p><strong>2</strong><small class="positive">Both marked reusable</small></article>
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

                <article class="panel social-quota-panel">
                    <div class="panel-header">
                        <h2>📦 My Pool Quota — Galle Division</h2>
                        <button type="button" class="outline-action">Full View</button>
                    </div>
                    <div class="quota-summary social-quota-summary">
                        <div class="quota-row"><div><b>Wheelchair — Standard</b><span>6 remaining · 14/20</span></div><div class="quota-track"><i style="width:70%"></i></div></div>
                        <div class="quota-row danger"><div><b>Wheelchair — Pediatric</b><span class="empty-quota">⚠ Empty · 8/8</span></div><div class="quota-track"><i style="width:100%"></i></div></div>
                        <div class="quota-row"><div><b>Tricycle — Standard</b><span>6 remaining · 9/15</span></div><div class="quota-track"><i style="width:60%"></i></div></div>
                        <div class="quota-row"><div><b>Spectacles</b><span>14 remaining · 10/24</span></div><div class="quota-track"><i style="width:42%"></i></div></div>
                    </div>
                    <div class="social-dashboard-actions">
                        <button type="button" class="distribute-aid-button">🤝 Distribute Aid to Beneficiary</button>
                        <div class="handover-notice"><span>👓 <b>2 Vision Camp item(s)</b> handed over to you for distribution.</span><button type="button">View →</button></div>
                    </div>
                </article>
            </section>
        </main>
    </div>

    <script src="assets/js/admin-dashboard.js"></script>
</body>
</html>
