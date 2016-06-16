<div id="main">
<div align='center' class='ispis'> <?php $poruka=$this->session->flashdata('poruka'); if(isset($poruka)) {echo $poruka; }?></div>
		<h4>Post Settings</h4>
		<div class="table-wrapper">
		<?php if(isset($posts)) :?>
			<table class="alt">
				<thead>
					<tr>
						<td><a href="<?php echo base_url();?>admin/admin_post/add" class="button small">New post</a></td>
					</tr>
					<tr>
						<th>User</th>
						<th>Subject</th>
						<th>About</th>
						<th>Posted</th>
						<th>Category</th>
						<th>Status</th>
						<th>View Comments</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<?php foreach($posts as $post) :?>
				<tbody>
					<tr>
						<td><?php echo $post['username']; ?></td>
						<td><?php echo $post['subject']; ?></td>
						<td><?php echo $post['about']; ?></td>
						<td><?php print date('d.m. Y', $post['post_date']); ?></td>
						<td><?php echo $post['categorie']; ?></td>
						<td><?php  if($post['post_status'] == 1){echo 'Active'; }else{echo 'Disabled'; }; ?></td>
						<td><a href="<?php echo base_url();?>admin/admin_post/get_comm/<?php echo $post['id_post']; ?>"><img src="<?php echo base_url();?>/images/edit.png" height='20px' width='20px'></a></td>
						<td><a href="<?php echo base_url();?>admin/admin_post/edit/<?php echo $post['id_post']; ?>"><img src="<?php echo base_url();?>/images/edit.png" height='20px' width='20px'></a></td>
						<td><a href="<?php echo base_url();?>admin/admin_post/delete/<?php echo $post['id_post']; ?>"><img src="<?php echo base_url();?>/images/no.png" height='20px' width='20px'></a></td>
					</tr>
				</tbody>
				<?php endforeach;?>
			</table>
			<?php endif;?>
			<?php if(isset($check)) : ?>
			<section>
				<h3>Add User</h3>
				<form id="UsersForm" method="post" action="<?php echo base_url();?>admin/admin_post/add" enctype="multipart/form-data">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="text" name="tbSubject" id="demo-name" placeholder="Subject" value="<?php echo set_value('tbSubject'); ?>"/>
							<?php echo form_error('tbSubject')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="text" name="tbAbout" id="demo-name" placeholder="About" value="<?php echo set_value('tbAbout'); ?>"/>
							<?php echo form_error('tbAbout')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<textarea name="taText" id="demo-name" placeholder="Text" value="<?php echo set_value('taText'); ?>"></textarea>
							<?php echo form_error('taText')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<select name="opCat">
								<?php foreach($categories as $categorie) :?>
									<option value='<?php echo $categorie['id']; ?>'><?php echo $categorie['name']; ?></option>
								<?php endforeach; ?>
							</select>
							<?php echo form_error('opCat')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="file" name="tbPicture" id="demo-name" />
							<?php echo form_error('tbPicture')?>
						</div>
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" id="btnUsers" value="Add" /></li>
								<li><input type="reset" value="Reset" id="btnReset" /></li>
							</ul>
						</div>
					</div>
				</form>
			</section>
			<?php endif;?>
			<?php if(isset($postEdit)) :?>
			<?php foreach($postEdit->result_array() as $edit) :?>
			<section>
			<h3>Edit Post</h3>
				<form id="UsersFormEdit" method="post" action="<?php echo base_url();?>admin/admin_post/update" enctype="multipart/form-data">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="hidden" name="tbIdPost" value="<?php echo $edit['id_post']; ?>"/>
							<input type="text" name="tbSubject" id="demo-name" placeholder="Subject" value="<?php echo $edit['subject']; ?>"/>
							<?php echo form_error('tbSubject')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="text" name="tbAbout" id="demo-name" placeholder="About" value="<?php echo $edit['about']; ?>"/>
							<?php echo form_error('tbAbout')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<textarea name="taText" id="demo-name" placeholder="Text"><?php echo $edit['text']; ?></textarea>
							<?php echo form_error('taText')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<select name="opCat">
								<?php foreach($categories as $categorie) :?>
									<option value='<?php echo $categorie['name']; ?>'><?php echo $categorie['name']; ?></option>
								<?php endforeach; ?>
							</select>
							<?php echo form_error('opCat')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="file" name="tbPicture" id="demo-name" placeholder="Name"/>
							<?php echo form_error('tbPicture')?>
						</div>
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" id="btnUsers" value="Update" /></li>
								<li><input type="reset" value="Reset" id="btnReset" /></li>
							</ul>
						</div>
					</div>
				</form>
			</section>
			<?php endforeach; ?>
			<?php endif;?>
		</div>
</div>