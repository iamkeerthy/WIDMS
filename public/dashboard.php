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
    'correction-requests' => __DIR__ . '/../modules/admin/correction-requests.php',
];

$socialOfficerPages = [
    'dashboard' => __DIR__ . '/../modules/social-service-officer/dashboard.php',
    'aid-requests' => __DIR__ . '/../modules/social-service-officer/aid-requests.php',
];

$requestedPage = (string) ($_GET['page'] ?? 'dashboard');

$storeKeeperPages = [
    'dashboard' => __DIR__ . '/../modules/store-keeper/dashboard.php',
    'receive-items' => __DIR__ . '/../modules/store-keeper/receive-items.php',
    'current-stock' => __DIR__ . '/../modules/store-keeper/current-stock.php',
    'correction-requests' => __DIR__ . '/../modules/store-keeper/correction-requests.php',
    'approved-dispatches' => __DIR__ . '/../modules/store-keeper/approved-dispatches.php',
    'recent-dispatches' => __DIR__ . '/../modules/store-keeper/recent-dispatches.php',
];

$dashboards = [
    'admin' => $adminPages[$requestedPage] ?? $adminPages['dashboard'],
    'subject-officer' => __DIR__ . '/../modules/subject-officer/dashboard.php',
    'store-keeper' => $storeKeeperPages[$requestedPage] ?? $storeKeeperPages['dashboard'],
    'social-service-officer' => $socialOfficerPages[$requestedPage] ?? $socialOfficerPages['dashboard'],
];

$dashboard = $dashboards[$_SESSION['role']] ?? null;
if ($dashboard === null || !is_file($dashboard)) {
    http_response_code(403);
    exit('Dashboard is unavailable.');
}

require $dashboard;
