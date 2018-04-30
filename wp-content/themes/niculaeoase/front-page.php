<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

dynamic_sidebar('aristonet_carousel'); 

$container   = get_theme_mod('understrap_container_type');

?>

	<div class="wrapper front-page" id="page-wrapper">

		<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

			<div class="row">

				<main id="home-block-container">
					<div class="hometop blocks">

						<a href="/info" class="about homeblock expanda">
							<span class="fa-icons">
								<i class="fa fa-pagelines"></i>
							</span>
							<h1>Over
								<br>
								<strong>Ons</strong>
							</h1>
							<div class="inner">
							<i class="fa fa-chevron-right align-self-center"></i>
								<ul class="align-self-center">
									<li>Opgericht in 2001</li>
									<li>Inloophuis</li>
									<li>Gevestigd in Goes</li>
									<li>Gezellig</li>
									<li>Mensen zijn belangrijk</li>
								</ul>
							</div>
						</a>
						<div class="hometopright">
							<!-- 2 -->
							<!-- onze_activiteiten-768x576.jpg -->
							<a href="/activiteiten" class="activiteiten homeblock expanda">
								<span class="fa-icons">
									<i class="fa fa-meetup"></i>
								</span>
								<h1>Onze
									<br>
									<strong> Activiteiten</strong>
								</h1>
								<div class="align-self-center under-constrcution">
									<p>Website onder constructie</p>
									<p>Op dit moment wordt er achter de schermen hard gewerkt.</p>
								</div>
							</a>
							<a href="/nieuws" class="nieuws homeblock expanda background-nieuws" style="background-image: url('https://www.inloophuisoasegoes.nl.local/wp-content/uploads/2018/04/onze_activiteiten.jpg');background-size:100%;">
							<!-- <a href="/nieuws" class="nieuws homeblock expanda"> -->
								<span class="fa-icons">
									<i class="fa fa-newspaper-o"></i>
								</span>

								<h1>Laatste
									<br>
									<strong> artikels</strong>
								</h1>
							</a>
						</div>
					</div>
					<div class="offsetcontainer">
						<div class="homebottom blocks">
							<div class="homebottomleft">


								<a href="/fotos" class="fotos homeblock expanda background-fotos" style="background-image: url('https://www.inloophuisoasegoes.nl.local/wp-content/uploads/2018/04/light_the_world-1024x654.jpg');">

								
									<span class="fa-icons">
										<i class="fa fa-camera"></i>
									</span>
									<h1>Onze
										<br>
										<strong>Fotos</strong>
									</h1>
									
									

									
									<?php 
											//$testao = attachment_url_to_postid('https://www.inloophuisoasegoes.nl.local/wp-content/uploads/2018/04/light_the_world.jpg');
											//var_dump($testao);
											//$tn =wp_get_attachment_image_url($testao,'large');
											//var_dump($tn);
											//echo '<img src="' . $tn . '" alt="">';
									?>
									

								</a>
								<a href="/sponsors" class="sponsors homeblock expanda">
									<span class="fa-icons">
										<i class="fa fa-bullhorn"></i>
									</span>
									<h1>Onze
										<br>
										<strong>Sponsors</strong>
									</h1>
								</a>

							</div>

							<a href="/info" class="contact homeblock expanda">
								<span class="fa-icons">
									<i class="fa fa-envelope-square"></i>
								</span>
								<h1>Contact
									<br>
									<strong>Ons</strong>
								</h1>

							</a>
						</div>
						<a href="#" class="to-top">
							<i class="fa fa-angle-up"></i>
						</a>


					</div>
				</main>
				<!-- #main -->

			</div>
			<!-- #primary -->



		</div>
		<!-- .row -->

	</div>
	<!-- Container end -->

	</div>
	<!-- Wrapper end -->

	<?php get_footer();