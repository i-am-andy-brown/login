<div class = "row">
	<div class="large-12 columns">
		<fieldset>
			<legend>New Post</legend>
			<div id='post_form'>
				<?php
					echo form_open('blog/new_post');
					echo form_input('blog_title', "Title");
					echo form_textarea('blog_post', "Blog Post"); 
					echo form_submit('submit', "Submit");
					echo anchor('blog_post', "New post"); 
				?>
			</div>
		</fieldset>
	</div>
</div>