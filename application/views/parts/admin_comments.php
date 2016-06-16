<div id="main">
		<h4>Comments Settings</h4>
		<div class="table-wrapper">
			<table class="alt">
				<thead>
					<tr>
						<th>Text</th>
						<th>Name</th>
						<th>Posted</th>
						<th>Delete</th>
					</tr>
				</thead>
				<?php foreach($results as $result) :?>
				<tbody>
					<tr>
						<td><?php echo word_limiter($result['text'],5); ?></td>
						<td><?php echo $result['username']; ?></td>
						<td><?php print date('d.m. Y', $result['comm_date']); ?></td>
						<td><a href="<?php echo base_url();?>admin/admin_post/commentDelete/<?php echo $result['id_comm']; ?>"><img src="<?php echo base_url();?>/images/no.png" height='20px' width='20px'></a></td>
					</tr>
				</tbody>
				<?php endforeach;?>
			</table>
			
		</div>
		<ul class="actions pagination">
				<?php echo $links; ?>
			</ul>
		</div>