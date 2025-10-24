		<footer id="colophon" class="site-footer footer-dark">
			<div class="footer-widgets footer-section">
				<div class="container">
					<div class="row footer-widgets">
						<div class="col-lg-3 col-md-6 col-sm-12 ">
							<section id="text-7" class="widget widget_text">
								<h4 class="widget-title font-alt">About US</h4>
								<div class="textwidget">
									<p><?= $footer->tentang ?></p>
								</div>
							</section>
							<section id="softia-social-networks-5" class="widget social_networks">
								<div class="widget_social_networks no-title">
									<ul class="social-networks">
										<li><a href="<?= $footer->facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="<?= $footer->twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="<?= $footer->instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
							</section>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 ">

						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 ">
							<section id="softia_contact_info_widget-5" class="widget widget_contact_info">
								<h4 class="widget-title font-alt">Contact Us</h4>
								<div class="widget_contact_infor">
									<div class="fot-address">
										<p><i class="ti-location-arrow"></i><?= $footer->alamat ?></p>
										<p><i class="fa fa-phone"></i> <?= $footer->telp ?></p>
										<p><i class="fa fa-envelope"></i> <?= $footer->email ?></p>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>

			<div class="site-info text-center">
				<div class="container">
					<div class="footer-copy">
						<p>Copyright © <?php echo date('Y'); ?> <a href="http://diskominfo.lampungtengahkab.go.id" target="_blank"> Diskominfo Kab. Lampung Tengah </a> | All Rights Reserved</p>
					</div>
				</div>
			</div>
		</footer>