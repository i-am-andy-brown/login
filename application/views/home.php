<div class='row'>
	<div class="large-8 columns">
		<h2>Eight Columns</h2>
		<p>Lorem ipsum...</p>

		<?php foreach($rows as $row) : ?>
			<h2><?php echo $row->title; ?></h2>
			<h4><?php echo $row->date; ?></h4>
			<p><?php echo $row->post; ?></p>
		<?php endforeach; ?>
	</div>
</div>