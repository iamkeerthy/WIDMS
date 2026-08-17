<?php
declare(strict_types=1);

requireRole('social-service-officer');
$activePage = 'aid-requests';

$submittedRequests = [
    ['AR-041', 'Nimal Kumar', '901234567V', '52', 'Galle', 'Galle Four Gravets', 'Wheelchair (Standard)', 'Today', 'Pending', '—'],
    ['AR-038', 'Kumari Perera', '888765432V', '36', 'Galle', 'Akmeemana', 'Hearing Aid', '1 week ago', 'Rejected', 'Insufficient official approvals — GN, SSO and DS required'],
    ['AR-035', 'Anura Wijesinghe', '720345678V', '54', 'Hambantota', 'Hambantota', 'Tricycle (Standard)', '2 weeks ago', 'Approved', '—'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Aid Requests | WIDMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-dashboard.css" rel="stylesheet">
</head>
<body>
    <?php require __DIR__ . '/../../includes/social-service-officer-sidebar.php'; ?>

    <div class="admin-shell">
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="menu-button" id="menu-button" aria-label="Open navigation">☰</button>
                <h1>My Requests</h1>
            </div>
            <div class="topbar-actions">
                <label class="search-box"><span aria-hidden="true">🔍</span><input type="search" placeholder="Search anything..." aria-label="Search"></label>
                <button class="notification-button" type="button" aria-label="Notifications">🔔</button>
            </div>
        </header>

        <main class="dashboard-content aid-requests-page">
            <section class="aid-form-card">
                <div class="aid-card-header">
                    <h2>📋 Submit New Aid Distribution Request</h2>
                    <small>All fields marked * are required</small>
                </div>

                <form class="aid-request-form">
                    <fieldset>
                        <legend>📍 Location Details</legend>
                        <div class="aid-form-grid three-columns">
                            <label>District *<select required><option value="">Select District</option><option>Galle</option><option>Matara</option><option>Hambantota</option></select></label>
                            <label>D.S. Division *<select required><option value="">Select DS Division</option></select></label>
                            <label>G.N. Division *<select required><option value="">Select GN Division</option></select></label>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>👤 Beneficiary Details</legend>
                        <div class="aid-form-grid two-columns">
                            <label>Full Name *<input type="text" placeholder="As per NIC / Birth Certificate" required></label>
                            <label>NIC Number *<input type="text" placeholder="e.g. 901234567V or 199012345678" required></label>
                        </div>
                        <div class="aid-form-grid three-columns">
                            <label>Date of Birth *<input type="date" required></label>
                            <label>Gender *<select required><option value="">Select</option><option>Male</option><option>Female</option><option>Other</option></select></label>
                            <label>Phone Number<input type="tel" placeholder="e.g. 077-1234567"></label>
                        </div>
                        <label class="full-field">Address *<textarea rows="2" placeholder="Full residential address..." required></textarea></label>
                    </fieldset>

                    <fieldset>
                        <legend>♿ Disability &amp; Aid Requested</legend>
                        <div class="aid-form-grid two-columns">
                            <label>Nature of Disability *<select required><option value="">Select Disability Type</option><option>Mobility Impairment</option><option>Visual Impairment</option><option>Hearing Impairment</option><option>Other</option></select></label>
                            <label>Aid Requested *<select required><option value="">Select Aid Type</option><option>Wheelchair</option><option>Tricycle</option><option>Hearing Aid</option><option>Spectacles</option></select></label>
                        </div>
                        <label class="full-field">Additional Notes<textarea rows="3" placeholder="Any additional information..."></textarea></label>
                    </fieldset>

                    <fieldset>
                        <legend>✅ Official Approvals</legend>
                        <p class="approval-help">Check each official who has approved this application.</p>
                        <div class="official-grid">
                            <label><input type="checkbox"> 🩺 Government Medical Officer</label>
                            <label><input type="checkbox"> 🧑‍💼 Grama Niladhari</label>
                            <label><input type="checkbox"> 🏛️ Social Services Officer</label>
                            <label><input type="checkbox"> 📋 Divisional Secretary</label>
                        </div>
                    </fieldset>

                    <div class="aid-form-actions">
                        <button type="button" class="submit-aid-button">📤 Submit Aid Request</button>
                        <button type="button" class="draft-aid-button">Save as Draft</button>
                        <small>Will be sent to Admin for final approval</small>
                    </div>
                </form>
            </section>

            <section class="submitted-requests-card">
                <div class="submitted-header">
                    <h2>My Submitted Requests</h2>
                    <div><input type="search" placeholder="Search name or NIC..."><select><option>All Status</option><option>Pending</option><option>Approved</option><option>Rejected</option></select></div>
                </div>
                <div class="submitted-table-wrap">
                    <table class="submitted-table">
                        <thead><tr><th>ID</th><th>Beneficiary</th><th>NIC</th><th>Age</th><th>District</th><th>DS Division</th><th>Aid Requested</th><th>Approvals</th><th>Submitted</th><th>Status</th><th>Notes</th></tr></thead>
                        <tbody>
                            <?php foreach ($submittedRequests as $request): ?>
                                <tr>
                                    <td><?= htmlspecialchars($request[0], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><strong><?= htmlspecialchars($request[1], ENT_QUOTES, 'UTF-8') ?></strong></td>
                                    <td><?= htmlspecialchars($request[2], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($request[3], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($request[4], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($request[5], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($request[6], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="approval-icons">🩺 🧑‍💼 🏛️ 📋</td>
                                    <td><?= htmlspecialchars($request[7], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><span class="status <?= strtolower($request[8]) ?>"><?= htmlspecialchars($request[8], ENT_QUOTES, 'UTF-8') ?></span></td>
                                    <td><?= htmlspecialchars($request[9], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <script src="assets/js/admin-dashboard.js"></script>
</body>
</html>
