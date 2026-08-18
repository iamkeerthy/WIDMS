<?php
declare(strict_types=1);

if (PHP_SAPI !== 'cli') { http_response_code(403); exit("CLI only.\n"); }
require_once __DIR__.'/../config/database.php';

$files=[
 'schema.sql','migration_registration_requests.sql','migration_stock_receiving.sql',
 'migration_supplier_workflow.sql','migration_correction_requests.sql','migration_user_profiles.sql',
 'migration_activity_log.sql','migration_master_data.sql','migration_beneficiaries.sql',
 'migration_goods_workflow.sql','migration_aid_distribution.sql','migration_special_workflows.sql',
 'migration_remove_lifecycle_status.sql',
];
$db=database();
foreach($files as $file){$path=__DIR__.'/'.$file;if(!is_file($path))throw new RuntimeException("Missing migration: $file");$db->exec(file_get_contents($path));echo "Applied $file\n";}
echo "WIDMS schema is current.\n";
