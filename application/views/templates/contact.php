<div id="main">
<div align='center' class='ispis'> <?php $poruka=$this->session->flashdata('poruka'); if(isset($poruka)) {echo $poruka; }?></div>
		<h4>Contact</h4>
		<form id="ContactForm" method="post" action="<?php echo base_url();?>home/show_contact">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="text" name="tbName" id="demo-name" placeholder="Name" value="<?php echo set_value('tbName'); ?>"/>
							<?php echo form_error('tbName')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="email" name="tbEmail" id="demo-name" placeholder="Email" value="<?php echo set_value('tbEmail'); ?>"/>
							<?php echo form_error('tbEmail')?>
						</div>
						<div class="6u 12u$(xsmall)">
							<textarea name="taDescription" id="demo-name"><?php echo set_value('taDescription'); ?></textarea>
							<?php echo form_error('taDescription')?>
						</div>
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" id="btnContact" value="Add" /></li>
								<li><input type="reset" value="Reset" id="btnReset" /></li>
							</ul>
						</div>
					</div>
				</form>
		</section>
</div>