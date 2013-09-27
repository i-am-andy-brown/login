<section id="mainContent">
	<div class="row">
		<?php foreach($rows as $row) : ?>
			<div class="large-8 columns">
				<h2><?php echo $row->blog_title; ?></h2?>
				<h4><?php echo $row->blog_date; ?></h4>
				<p><?php echo $row->blog_post; ?></p>
			</div>
			<div class="large-4 columns">
			</div>
		<?php endforeach; ?>
	</div>
</section>