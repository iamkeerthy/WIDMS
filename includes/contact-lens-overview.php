<?php
declare(strict_types=1);

function renderContactLensOverview(PDO $db): void
{
    $stock=$db->query("SELECT lu.power,COUNT(*) in_stock,s.company_name,MAX(DATE(lu.created_at)) last_received FROM contact_lens_units lu JOIN contact_lens_bulk_orders bo ON bo.id=lu.bulk_order_id JOIN suppliers s ON s.id=bo.supplier_id WHERE lu.status='available' GROUP BY lu.power,s.id,s.company_name ORDER BY lu.power")->fetchAll();
    $orders=$db->query("SELECT ar.id,b.full_name,b.nic,ds.name division_name,ar.prescribed_power requested_power,lu.power current_power,ar.status,ar.created_at,COALESCE((SELECT COUNT(*) FROM contact_lens_units available WHERE available.power=ar.prescribed_power AND available.status='available'),0) exact_stock FROM aid_requests ar JOIN beneficiaries b ON b.id=ar.beneficiary_id JOIN ds_divisions ds ON ds.id=b.ds_division_id JOIN inventory_items i ON i.id=ar.item_id JOIN item_categories c ON c.id=i.category_id LEFT JOIN contact_lens_units lu ON lu.aid_request_id=ar.id AND lu.status<>'returned-to-vendor' WHERE LOWER(CONCAT(i.item_name,' ',i.variety,' ',c.name)) LIKE '%contact%lens%' GROUP BY ar.id,lu.id ORDER BY ar.id DESC")->fetchAll();
    ?>
    <section class="admin-data-card lens-overview-card">
      <div class="admin-data-header"><h2><span class="lens-blue-dot"></span> Contact Lens Stock — By Power</h2></div>
      <div class="admin-data-table-wrap"><table class="admin-data-table lens-stock-overview"><thead><tr><th>Power</th><th>In Stock</th><th>Company</th><th>Last Received</th><th>Status</th></tr></thead><tbody>
      <?php if(!$stock):?><tr><td colspan="5" class="admin-empty-row">No received contact lens units are currently available.</td></tr><?php else:foreach($stock as $r):?><tr><td><strong><?=sprintf('%+.2f',(float)$r['power'])?></strong></td><td class="stock-quantity"><?=(int)$r['in_stock']?></td><td><?=htmlspecialchars($r['company_name'])?></td><td><?=date('d M Y',strtotime($r['last_received']))?></td><td><span class="stock-pill available">Available</span></td></tr><?php endforeach;endif;?>
      </tbody></table></div>
    </section>
    <section class="admin-data-card lens-overview-card">
      <div class="admin-data-header"><h2><span class="lens-blue-dot"></span> All Contact Lens Orders</h2><input id="lens-order-search" type="search" placeholder="🔍 Search name, NIC or power..."></div>
      <div class="admin-data-table-wrap"><table class="admin-data-table" id="lens-overview-table"><thead><tr><th>ID</th><th>Beneficiary</th><th>NIC</th><th>Division</th><th>Requested Power</th><th>Current Power</th><th>Power Changed?</th><th>Stock Check</th><th>Status</th><th>Date</th></tr></thead><tbody>
      <?php if(!$orders):?><tr><td colspan="10" class="admin-empty-row">No Contact Lens aid requests available.</td></tr><?php else:foreach($orders as $r):$changed=$r['current_power']!==null&&(float)$r['current_power']!==(float)$r['requested_power'];?><tr class="lens-overview-row"><td>AR-<?=str_pad((string)$r['id'],4,'0',STR_PAD_LEFT)?></td><td><strong><?=htmlspecialchars($r['full_name'])?></strong></td><td><?=htmlspecialchars($r['nic']?:'—')?></td><td><?=htmlspecialchars($r['division_name'])?></td><td><?=sprintf('%+.2f',(float)$r['requested_power'])?></td><td><?=$r['current_power']!==null?sprintf('%+.2f',(float)$r['current_power']):'—'?></td><td><?=$changed?'Yes':'No'?></td><td><span class="stock-pill <?=$r['exact_stock']?'available':'out'?>"><?=$r['exact_stock']?(int)$r['exact_stock'].' exact available':'Out of Stock'?></span></td><td><span class="request-status-pill status-<?=htmlspecialchars($r['status'])?>"><?=ucwords(str_replace('-',' ',$r['status']))?></span></td><td><?=date('d M Y',strtotime($r['created_at']))?></td></tr><?php endforeach;endif;?>
      </tbody></table></div>
    </section>
    <script>document.getElementById('lens-order-search')?.addEventListener('input',event=>{const term=event.target.value.toLowerCase();document.querySelectorAll('#lens-overview-table .lens-overview-row').forEach(row=>row.hidden=!row.textContent.toLowerCase().includes(term));});</script>
    <?php
}
