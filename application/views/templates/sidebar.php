				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="<?php echo base_url();?>images/logo1.jpg" alt="" /></a>
								<header>
									<h2>Freelancer simple blog</h2>
									<p>Another fine responsive site template in Codeigniter</a></p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">
								<?php foreach($bestVote as $vote) :?>
									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="<?php echo base_url();?>post/show_post/<?php echo $vote['id_post']; ?>/<?php echo $vote['subject']; ?>"><?php echo $vote['subject']; ?></a></h3>
												<time class="published" ><?php print date('F d, Y', $vote['post_date']); ?></time>
												<a href="#" class="author"><img src="<?php echo base_url();?><?php echo $vote['picture']; ?>" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="<?php echo base_url();?><?php echo $vote['cover']; ?>" alt="" /></a>
										</article>
								<?php endforeach;?>
								</div>
							</section>

						<!-- Posts List -->
							<section>
								<ul class="posts">
								<?php foreach($bestCommented as $best) :?>
									<li>
										<article>
											<header>
												<h3><a href="<?php echo base_url();?>post/show_post/<?php echo $best['id_post']; ?>/<?php echo $best['subject']; ?>"><?php echo $best['subject']; ?></a></h3>
												<time class="published"><?php print date('F d, Y', $best['post_date']); ?></time>
											</header>
											<a href="#" class="image"><img src="<?php echo base_url();?><?php echo $best['cover']; ?>" alt="" /></a>
										</article>
									</li>
								<?php endforeach; ?>
								</ul>
							</section>

						<!-- About -->
							<section class="blurb">
								<h2>About</h2>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
								<ul class="actions">
									<li><a href="#" class="button">Learn More</a></li>
								</ul>
							</section>
