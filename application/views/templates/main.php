
				<!-- Main -->
					<div id="main">
					<div align='center' class='ispis'><?php if(isset($poruka)) {echo $poruka; }?></div>
 						<?php    foreach($results as $data) :?>	
						<!-- Post -->
							<article class="post">
							<form id="myForm">
							<input type="hidden" value="<?php echo $data['id_post']?>" name="tbIdPost"/>
							</form>
								<header>
									<div class="title">
										<h2><a href="<?php echo base_url()."post/show_post/".$data['id_post']?>/<?php echo $data['subject']; ?>"><?php echo $data['subject']; ?></a></h2>
										<p><?php echo $data['about']; ?></p>
									</div>
									<div class="meta">
										<time class="published"><?php print date('F d, Y', $data['post_date']); ?></time>
										<a href="#" class="author"><span class="name"><?php echo $data['username']; ?></span><img src="<?php echo base_url();?><?php echo $data['picture']; ?>" alt="" /></a>
									</div>
								</header>
								<a href="<?php echo base_url()."post/show_post/".$data['id_post']?>/<?php echo $data['subject']; ?>" class="image featured"><img src="<?php echo base_url();?><?php  echo $data['cover'];?>" width="840px" height="341px" alt="" /></a>
								<p><?php echo word_limiter($data['text'],20); ?></p>
								<footer>
									<ul class="actions">
										<li><a href="<?php echo base_url()."post/show_post/".$data['id_post']?>/<?php echo $data['subject']; ?>" class="button big">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#"><?php echo $data['categorie']; ?></a></li>
										<li><a href="#" id="stars"  class="icon fa-heart disabled"><?php echo $data['stars']; ?></a></li>
										<li><a href="<?php echo base_url()."post/show_com/".$data['id_post']; ?>" class="icon fa-comment disabled"><?php echo $data['broj']; ?></a></li>
									</ul>
								</footer>
							</article>
						<?php endforeach;?>


						<?php if(isset($links)) : ?>
							<ul class="actions pagination">
								<?php echo $links; ?>
							</ul>
						<?php endif;?>		
					</div>
