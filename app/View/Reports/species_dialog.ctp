<?php
	$this->set('pageId', 'speciesDialog');
	$this->set('title_for_layout', 'Species Detail');
?>
<div data-role="content">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider"><?php echo $bird['aou_list']['common_name']; ?></li>
	</ul>
	<br />
	<div id="speciesInfo" class="ui-grid-a">
		<div class="ui-block-a"><strong>Scientific Name:</strong></div>
		<div class="ui-block-b"><span class="scientific_name"><?php echo $bird['aou_list']['scientific_name']; ?></span></div>
		<div class="ui-block-a"><strong>Order:</strong></div>
		<div class="ui-block-b"><?php echo $bird['aou_order']['order_name']; ?></div>
		<div class="ui-block-a"><strong>Family:</strong></div>
		<div class="ui-block-b"><?php echo $bird['aou_list']['family']; ?></div>
		<?php if ($bird['aou_list']['subfamily'] != ''): ?> 
			<div class="ui-block-a"><strong>Subfamily:</strong></div>
			<div class="ui-block-b"><?php echo $bird['aou_list']['subfamily']; ?></div>
		<?php endif; ?>
		<div class="ui-block-a"><strong>Last Seen:</strong></div>
		<div class="ui-block-b"><?php echo $bird[0]['last_seen']; ?></div>		
		<div class="ui-block-a"><strong>Earliest / Latest:</strong></div>
		<div class="ui-block-b"><?php echo $bird[0]['earliestSighting'].' / '.$bird[0]['latestSighting']; ?></div>				
		<div class="ui-block-a"><strong>Sightings:</strong></div>
		<div class="ui-block-b"><?php echo $bird[0]['sightings']; ?></div>			
	</div><!-- /grid-a -->
</div>	
<div id="chartSpeciesByMonth_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Sightings By Month</li>
	</ul>
	<figure>				
		<div id="chartdivSpecies" class="chartdiv" style="height: 300px;">
		</div>
	</figure>
	<form>
		<input id="speciesId" type="hidden" value=<?php echo $bird['aou_list']['id']; ?> />
	</form>
</div>
