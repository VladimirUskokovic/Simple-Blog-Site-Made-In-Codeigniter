
				<!-- Main -->
					<div id="main">
					<div align='center' class='ispis'> <?php if(isset($poruka)) {echo $poruka; }?></div>
 						<?php    foreach($post as $data) :?>	
						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#"><?php echo $data['subject']; ?></a></h2>
										<p><?php echo $data['about']; ?></p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?php print date('F d, Y', $data['post_date']); ?></time>
										<a href="#" class="author"><span class="name"><?php echo $data['username']; ?></span><img src="<?php echo base_url();?><?php echo $data['picture']; ?>" alt="" /></a>
									</div>
								</header>
								<a  class="image featured"><img src="<?php echo base_url();?><?php  echo $data['cover'];?>" width="840px" height="341px" alt="" /></a>
								<p><?php echo $data['text'];?></p>
								<!-- <?php if($video):?>
							    	<?php foreach($video as $v):?>
							     		<div class="content">
							        		<div id="command"><a class="lightSwitcher" href="#">Lights</a></div>
							           			<div id="movie">
							              			<iframe src="<?php  echo $v['link']; ?>" width="500" height="300" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							    
												</div>
							      		</div>
							     	<?php endforeach;?>
							    <?php endif;?> -->
								<footer>
									<ul class="stats">
										<li><a href="#"><?php echo $data['categorie']; ?></a></li>
										<li><a id="stars" href="#" class="icon fa-heart"><?php echo $data['stars']; ?></a></li>
										<li><a href="<?php echo base_url()."categories/show_com/".$data['id_post']; ?>" class="icon fa-comment disabled"></a><?php echo $number_comments; ?></li>
									</ul>
								</footer>
								<div id='result'></div>
							</article>
						<?php endforeach;?>
						<article class="post">
							<section>
									<h3>Comment</h3>
									<form id="myForm" method="post" action="<?php echo base_url();?>Post/addComment/<?php echo $data['id_post']?>">
										<div class="row uniform">
										
											<div class="6u 12u$(xsmall)">
												<input type="text" name="tbName" id="demo-name" <?php if($this->session->userdata('username')) {echo 'value='.$this->session->userdata('username');}?> placeholder="Name" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="email" name="tbEmail" id="demo-email" <?php if($this->session->userdata('email')) {echo 'value='.$this->session->userdata('email');}?> placeholder="Email" />
											</div>
										
											<input type="hidden" value="<?php echo uri_string();?>" name="tbUrl"/>
											<input type="hidden" value="<?php echo $data['id_post']?>" id="tbIdPost" name="tbIdPost"/>
											<div class="6u$ 12u$(small)">
												<input type="checkbox" id="demo-human" name="chbHuman">
												<label for="demo-human">Not a robot</label>
											</div>
											<div class="12u$">
												<textarea name="taMessage" id="demo-message" placeholder="Enter your comment" rows="6"></textarea>
											</div>
											<div class="12u$">
												<ul class="actions">
													<li><input type="button" id="submit" value="Post comment" /></li>
													<li><input type="reset" value="Reset" id="btnReset" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>
						</article>
						<div id="newCom"></div>
						<?php foreach($comments as $comment) :?>
						<article class="post">
							<div class="meta">
								<time class="published"><?php print date('F d, Y H:i', $comment['comm_date']); ?></time>
								<?php if($comment['id_user'] != null ) : ?>
								<a href="#" class="author disabled"><span class="name"><?php echo $comment['username']; ?></span><img src="<?php echo base_url();?><?php echo $comment['picture']; ?>" alt="" /></a><?php endif;  ?>
								<?php if($comment['id_user'] == null) :?>
								<a href="#" class="author disabled"><span class="name"><?php echo $comment['name']; ?></span><img src="<?php echo base_url();?>/images/user_picture/user.jpg" alt="" /></a>
									<?php endif;?>
							</div>
							<blockquote><?php echo $comment['text']; ?></blockquote>
						</article>
					<?php endforeach; ?>
					</div>
					

