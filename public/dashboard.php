<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/permissions.php';

requireLogin();

$adminPages = [
    'dashboard' => __DIR__ . '/../modules/admin/dashboard.php',
    'pending-approvals' => __DIR__ . '/../modules/admin/pending-approvals.php',
    'users' => __DIR__ . '/../modules/admin/users.php',
    'system-config' => __DIR__ . '/../modules/admin/system-config.php',
];

$socialOfficerPages = [
    'dashboard' => __DIR__ . '/../modules/social-service-officer/dashboard.php',
    'aid-requests' => __DIR__ . '/../modules/social-service-officer/aid-requests.php',
];

$requestedPage = (string) ($_GET['page'] ?? 'dashboard');

$dashboards = [
    'admin' => $adminPages[$requestedPage] ?? $adminPages['dashboard'],
    'subject-officer' => __DIR__ . '/../modules/subject-officer/dashboard.php',
    'store-keeper' => __DIR__ . '/../modules/store-keeper/dashboard.php',
    'social-service-officer' => $socialOfficerPages[$requestedPage] ?? $socialOfficerPages['dashboard'],
];

$dashboard = $dashboards[$_SESSION['role']] ?? null;
if ($dashboard === null || !is_file($dashboard)) {
    http_response_code(403);
    exit('Dashboard is unavailable.');
}

require $dashboard;
