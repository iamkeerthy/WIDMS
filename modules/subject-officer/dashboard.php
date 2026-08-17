<?php
declare(strict_types=1);

requireRole('subject-officer');
$activePage = 'dashboard';

$activities = [
    ['10:42 AM', 'Aid request AR-041 submitted — Nimal Kumara, Galle', 'Me', 'Pending'],
    ['09:30 AM', 'Aid request AR-039 approved by Admin — Tricycle (Standard)', 'Admin', 'Approved'],
    ['09:15 AM', 'Return processed — Wheelchair returned by Anura W. (Good)', 'Me', 'Reused'],
    ['08:45 AM', 'Stock release SR-040 approved — 5 Tricycles dispatched', 'Admin', 'Approved'],
    ['08:00 AM', 'Beneficiary added — Sanduni Wijesinghe, Galle Four Gravets', 'Me', 'Done'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subject Officer Dashboard | WIDMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-dashboard.css" rel="stylesheet">
</head>
<body>
    <?php require __DIR__ . '/../../includes/subject-officer-sidebar.php'; ?>

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
            <section class="stats-grid" aria-label="Subject Officer statistics">
                <article class="stat-card"><span class="stat-icon">📋</span><p>Submitted Requests</p><strong>12</strong><small>1 pending · 9 approved</small></article>
                <article class="stat-card"><span class="stat-icon">🗃️</span><p>Beneficiaries in Division</p><strong>142</strong><small>Galle Division</small></article>
                <article class="stat-card"><span class="stat-icon">📤</span><p>Pending Stock Releases</p><strong>1</strong><small class="negative">Awaiting Admin approval</small></article>
                <article class="stat-card"><span class="stat-icon">🔄</span><p>Returns This Month</p><strong>4</strong><small class="positive">3 marked reusable</small></article>
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

                <article class="panel division-panel">
                    <div class="panel-header"><h2>📊 My Division Summary — Galle</h2></div>
                    <div class="quota-summary">
                        <h3>My Pool Quota Status</h3>
                        <div class="quota-row"><div><b>Wheelchair — Standard</b><span>6 remaining · 14/20</span></div><div class="quota-track"><i style="width:70%"></i></div></div>
                        <div class="quota-row danger"><div><b>Wheelchair — Pediatric</b><span>0 remaining · 8/8</span></div><div class="quota-track"><i style="width:100%"></i></div></div>
                        <div class="quota-row"><div><b>Tricycle — Standard</b><span>6 remaining · 9/15</span></div><div class="quota-track"><i style="width:60%"></i></div></div>
                        <div class="quota-row"><div><b>Spectacles</b><span>14 remaining · 10/24</span></div><div class="quota-track"><i style="width:42%"></i></div></div>
                    </div>
                    <div class="request-pipeline">
                        <h3>My Request Pipeline</h3>
                        <dl>
                            <div><dt>Total Submitted</dt><dd>12</dd></div>
                            <div><dt>Approved</dt><dd class="green">9</dd></div>
                            <div><dt>Pending</dt><dd class="orange">1</dd></div>
                            <div><dt>Rejected</dt><dd class="red">2</dd></div>
                        </dl>
                    </div>
                </article>
            </section>
        </main>
    </div>

    <script src="assets/js/admin-dashboard.js"></script>
</body>
</html>
