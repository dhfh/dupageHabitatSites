        </section>
        <footer>
        	<div class="menu-wrapper">
            	<?php wp_nav_menu(array('theme_location'=>sanitize_title('Footer Menu'),'container'=>false)); ?>
            </div>
        </footer>
    </div>
<?php wp_footer(); ?>
<script>
var options={ "publisher": "<?php $options = get_option( 'dupage_habitat_options' ); echo $options['sharethis_key'] ?>", "position": "right", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>
</body>
</html>