<div id="main">
<div align='center' class='ispis'> <?php $poruka=$this->session->flashdata('poruka'); if(isset($poruka)) {echo $poruka; }?></div>
		<h4>Categories Settings</h4>
		<div class="table-wrapper">
		<?php if(isset($categories)) :?>
			<table class="alt">
				<thead>
					<tr>
						<td><a href="<?php echo base_url();?>admin/admin_category/categorie" class="button small">New Category</a></td>
					</tr>
					<tr>
						<th>Name</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<?php foreach($categories as $category) :?>
				<tbody>
					<tr>
						<td><?php echo $category['name']; ?></td>
						<td><a href="<?php echo base_url();?>admin/admin_category/edit/<?php echo $category['id']; ?>"><img src="<?php echo base_url();?>/images/edit.png" height='20px' width='20px'></a></td>
						<td><a href="<?php echo base_url();?>admin/admin_category/delete/<?php echo $category['id']; ?>"><img src="<?php echo base_url();?>/images/no.png" height='20px' width='20px'></a></td>
					</tr>
				</tbody>
				<?php endforeach;?>
			</table>
		<?php endif;?>
		<?php if(isset($check)) : ?>
		<section>
			<h3>Add Categorie</h3>
				<form id="CategorieForm" method="post" action="<?php echo base_url();?>admin/admin_category/categorie">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="text" name="tbName" id="demo-name" placeholder="Name" value="<?php echo set_value('tbName'); ?>"/>
							<?php echo form_error('tbName')?>
						</div>
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" id="btnCategory" value="Add" /></li>
								<li><input type="reset" value="Reset" id="btnReset" /></li>
							</ul>
						</div>
					</div>
				</form>
		</section>
		<?php endif;?>
		<?php if(isset($categorie)) :?>
			<?php foreach($categorie->result_array() as $category) :?>
		<section>
			<h3>Add Categorie</h3>
				<form id="CategorieForm" method="post" action="<?php echo base_url();?>admin/admin_category/update">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="hidden" name="tbId" value="<?php echo $category['id']; ?>"/>
							<input type="text" name="tbName" id="demo-name" placeholder="Name" value="<?php echo $category['name']; ?>"/>
							<?php echo form_error('tbName')?>
						</div>
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" id="btnCategory" value="Add" /></li>
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