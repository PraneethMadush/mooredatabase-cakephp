<?php foreach($sighting_set as $bird): ?>
<li data-icon="info"><a href="/reports/species_dialog/<?php echo $bird['aou_list']['id']; ?>"><?php echo $bird['aou_list']['common_name']; ?></a></li>
<?php endforeach; ?>