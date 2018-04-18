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

$container   = get_theme_mod('understrap_container_type');

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">

			<main id="home-block-container">
				<div class="hometop blocks">
					<div class="about expanda">
						About US
					</div>
					<div class="hometopright">
						<!-- 2 -->
						<div class="discover expanda">
							DISCOVER
						</div>
						<div class="blog expanda">
							BLOG
						</div>
					</div>
				</div>
				<div class="offsetcontainer">
					<div class="homebottom blocks">
						<div class="homebottomleft">
							<div class="blocks">
								<div class="fb expanda">Facebook</div>
								<div class="instagram expanda">Instagram</div>
							</div>
							<div class="blocks">
								<div class="worktogether expanda">
									Lets work together
								</div>
							</div>
						</div>
						<div class="services expanda">Our Services </div>

					</div>
					<a href="#" class="to-top"><i class="fas fa-angle-up"></i></a>


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
