<?php
declare(strict_types=1);

return [
    'Overview' => [
        ['icon' => '📊', 'label' => 'Dashboard', 'page' => 'dashboard'],
    ],
    'Inventory' => [
        ['icon' => '📥', 'label' => 'Receive Items', 'page' => 'receive-items'],
        ['icon' => '📦', 'label' => 'Current Stock', 'page' => 'current-stock'],
        ['icon' => '🚚', 'label' => 'Dispatch Items', 'page' => 'dispatch-items'],
    ],
    'Procurement' => [
        ['icon' => '💳', 'label' => 'Payment Details', 'page' => 'payment-details'],
    ],
    'Requests' => [
        ['icon' => '📝', 'label' => 'Correction Requests', 'page' => 'correction-requests'],
    ],
];
