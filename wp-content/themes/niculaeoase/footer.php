<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

	<?php get_sidebar( 'footerfull' ); ?>
	<div class="color-bars d-flex" style="margin-top:30px">
		<div class="cb1"></div>
		<div class="cb2"></div>
		<div class="cb3"></div>
		<div class="cb4"></div>
		<div class="cb5"></div>
	</div>
	<div class="wrapper" id="wrapper-footer">

		<div class="container-fluid">
			<div class="row">

				<div class="col-sm-12">

					<footer class="site-footer" id="colophon">

						<div class="container footer-one">
							<div class="row ">
								<div class="col-sm-12 col-md-5 address">
									<ul>
										<li>
											<h6>
												Inloophuis Oase Goes
											</h6>
										</li>
										<li>Rooseveltlaan 87</li>
										<li>4463 GL GOES</li>
										<li>
											
										</li>
										<li>0114 xxxxxxxxxx </li>
										<li>info@inloophuioasegoest.nl</li>
										<li>IBAN NLXXXXXXXXXXXXXXXXXXX</li>
									</ul>

								</div>
								<div class="col-sm-12 col-md-2 facebook">
									<a href="https://www.facebook.com/profile.php?id=100009451040063" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							
								</div>
								<div class="col-sm-12 col-md-5 openingstijden">
									<ul>
										<li>
											<h6> Openingstijden</h6>
										</li>
										<li>Het inloophuis is in de regel geopend op</li>
										<li>maandagen van 09:30 tot 12:30 en van 13:00 -tot 15:30</li>
										<li>dinsdagen van 09:30 tot 12:30 en van 13:00 tot 16:30</li>
										<li>woensdagen van 09:30 tot 12:30 </li>
										<li>doonderdagen van 09:30 tot 12:30 en van 13:00 tot 16:30</li>
										<li></li>
									</ul>










								</div>
							</div>
						</div>

						<div class="container">

							<div class="site-info">

								<h6>Designed and developed by Niculae Niculae. All rights reserved. </h6>
							</div>
							<!-- .site-info -->
						</div>

					</footer>
					<!-- #colophon -->

				</div>
				<!--col end -->

			</div>
			<!-- row end -->

		</div>
		<!-- container end -->

	</div>
	<!-- wrapper end -->

	</div>
	<!-- #page we need this extra closing tag here -->

	<?php wp_footer(); ?>

	</body>

	</html>