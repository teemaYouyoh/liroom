<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package liroom
 */
?>
		</div> <!--content-inside-->
	</div><!--content -->
	<div class="footer-shadow container">
    <div class="sticky-stopper"></div>
		<div class="row">
			<div class="col-md-12">
				<img src="<?php echo get_template_directory_uri().'/assets/images/footer-shadow.png' ?>" alt="" />
			</div>
		</div>
	</div>
	<footer id="colophon" class="site-footer" >
		<div class="container">
			<div class="row">
				<div class="col-md-9 copyright col-sm-12">
					<?php liroom_copyright(); ?>
				</div>
				<div class="col-md-3 footer-social col-sm-12">
					<?php liroom_social(); ?>
				</div>
			</div>

		</div>
	</footer><!-- colophon -->
</div><!--page -->
<div id="go-top-button" class="fa go-top fa-angle-up" title="Scroll To Top"></div>

<div class="overlay" title="окно"></div>
<div class="popup">
<div class="close_window"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
	<div class="popup_conten_text"></div>
</div>

<?php wp_footer(); ?>

</body>
</html>
