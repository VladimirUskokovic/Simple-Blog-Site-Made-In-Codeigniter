<div id="main">
<div align='center' class='ispis'> <?php $poruka=$this->session->flashdata('poruka'); if(isset($poruka)) {echo $poruka; }?></div>
		<h4>Users Settings</h4>
		<div class="table-wrapper">
		<?php if(isset($users)) :?>
			<table class="alt">
				<thead>
					<tr>
						<td><a href="<?php echo base_url();?>admin/admin_users/add" class="button small">Add User</a></td>
					</tr>
					<tr>
						<th>User</th>
						<th>Email</th>
						<th>Role</th>
						<th>Status</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<?php foreach($users as $user) :?>
				<tbody>
					<tr>
						<td><?php echo $user['username']; ?></td>
						<td><?php echo $user['email']; ?></td>
						<td><?php echo $user['role_name']; ?></td>
						<td><?php  if($user['user_status'] == 1){echo 'Active'; }else{echo 'Disabled'; }; ?></td>
						<td><a href="<?php echo base_url();?>admin/admin_users/edit/<?php echo $user['id_user']; ?>"><img src="<?php echo base_url();?>/images/edit.png" height='20px' width='20px'></a></td>
						<td><a href="<?php echo base_url();?>admin/admin_users/delete/<?php echo $user['id_user']; ?>"><img src="<?php echo base_url();?>/images/no.png" height='20px' width='20px'></a></td>
					</tr>
				</tbody>
				<?php endforeach;?>
			</table>
			<?php endif;?>
			<?php if(isset($check)) : ?>
			<section>
				<h3>Add User</h3>
				<form id="UsersForm" method="post" action="<?php echo base_url();?>admin/admin_users/add" enctype="multipart/form-data">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="text" name="tbName" id="demo-name" placeholder="Username" value="<?php echo set_value('tbName'); ?>"/>
							<?php echo form_error('tbName')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="password" name="tbPassword" id="demo-name" placeholder="Password" value="<?php echo set_value('tbPassword'); ?>"/>
							<?php echo form_error('tbPassword')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="email" name="tbEmail" id="demo-name" placeholder="Email" value="<?php echo set_value('tbEmail'); ?>"/>
							<?php echo form_error('tbEmail')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="file" name="tbPicture" id="demo-name" placeholder="Name"/>
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
			<?php if(isset($oneUser)) :?>
			<?php foreach($oneUser->result_array() as $one) :?>
			<section>
			<h3>Edit User</h3>
				<form id="UsersForm" method="post" action="<?php echo base_url();?>admin/admin_users/update" enctype="multipart/form-data">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="hidden" name="tbId" value="<?php echo $one['id_user']; ?>"/>
							<input type="hidden" name="tbFname" value="<?php echo $one['username']; ?>"/>
							<input type="text" name="tbName" id="demo-name" placeholder="Username" value="<?php echo $one['username']; ?>"/>
							<?php echo form_error('tbName')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="password" name="tbPassword" id="demo-name" placeholder="Password" value="<?php echo $one['password']; ?>"/>
							<?php echo form_error('tbPassword')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="email" name="tbEmail" id="demo-name" placeholder="Email" value="<?php echo $one['email']; ?>"/>
							<?php echo form_error('tbEmail')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<select name="opRole">
								<?php foreach($role as $r) :?>
									<option value='<?php echo $r['id_role']; ?>'><?php echo $r['role_name']; ?></option>
								<?php endforeach; ?>
							</select>
							<?php echo form_error('opRole')?>
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