<?php
declare(strict_types=1);

requireRole('admin');
$activePage = 'pending-approvals';

$registrations = [
    ['Chamara Rathnayake', 'Social Service Officer', 'Galle Division', 'Today 08:14', 'blue'],
    ['Sunil Fernando', 'Store Keeper', 'Central', 'Yesterday', 'yellow'],
    ['Dilini Perera', 'Subject Officer', '—', '2 days ago', 'green'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pending Approvals | WIDMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-dashboard.css" rel="stylesheet">
</head>
<body>
    <?php require __DIR__ . '/../../includes/admin-sidebar.php'; ?>

    <div class="admin-shell">
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="menu-button" id="menu-button" aria-label="Open navigation">☰</button>
                <h1>Pending Approvals</h1>
            </div>
            <div class="topbar-actions">
                <label class="search-box">
                    <span aria-hidden="true">🔍</span>
                    <input type="search" placeholder="Search anything..." aria-label="Search">
                </label>
                <button class="notification-button" type="button" aria-label="Notifications">🔔</button>
            </div>
        </header>

        <main class="dashboard-content approvals-page">
            <div class="approval-tabs" role="tablist" aria-label="Approval categories">
                <button class="approval-tab active" type="button" role="tab" data-tab="registrations" aria-selected="true">
                    User Registrations <span class="tab-count red">3</span>
                </button>
                <button class="approval-tab" type="button" role="tab" data-tab="items" aria-selected="false">
                    Item Requests <span class="tab-count yellow">2</span>
                </button>
                <button class="approval-tab" type="button" role="tab" data-tab="stock" aria-selected="false">
                    Stock Release
                </button>
            </div>

            <section class="approval-tab-panel active" data-panel="registrations">
                <div class="approval-alert"><span aria-hidden="true">⚠️</span> 3 user registration requests require your review.</div>
                <article class="approval-card">
                    <h2>User Registration Requests</h2>
                    <div class="approval-table-wrap">
                        <table class="approval-table">
                            <thead><tr><th>Name</th><th>Role Requested</th><th>Division</th><th>Submitted</th><th>Action</th></tr></thead>
                            <tbody>
                                <?php foreach ($registrations as $registration): ?>
                                    <tr>
                                        <td><strong><?= htmlspecialchars($registration[0], ENT_QUOTES, 'UTF-8') ?></strong></td>
                                        <td><span class="role-label <?= $registration[4] ?>"><?= htmlspecialchars($registration[1], ENT_QUOTES, 'UTF-8') ?></span></td>
                                        <td><?= htmlspecialchars($registration[2], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($registration[3], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="approval-actions">
                                            <button type="button" class="approve-button">✓ Approve</button>
                                            <button type="button" class="reject-button">✕ Reject</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </article>
            </section>

            <section class="approval-tab-panel" data-panel="items">
                <div class="approval-alert"><span aria-hidden="true">⚠️</span> 2 item requests require your review.</div>
                <article class="approval-card empty-approval-card">
                    <h2>Item Requests</h2>
                    <p>Item request approval records will be connected when the Item Requests module is developed.</p>
                </article>
            </section>

            <section class="approval-tab-panel" data-panel="stock">
                <article class="approval-card empty-approval-card">
                    <h2>Stock Release Requests</h2>
                    <p>Stock release approval records will be connected when the Central Stock module is developed.</p>
                </article>
            </section>
        </main>
    </div>

    <script src="assets/js/admin-dashboard.js"></script>
    <script src="assets/js/pending-approvals.js"></script>
</body>
</html>
