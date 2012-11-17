        </section>
        <footer>
        	<div class="menu-wrapper">
            	<?php wp_nav_menu(array('theme_location'=>sanitize_title('Footer Menu'),'container'=>false)); ?>
            </div>
        </footer>
    </div>
<?php wp_footer(); ?>

<?php 
$options = get_option( 'dupage_habitat_options' ); 
$sharethis_key = $options['sharethis_key'];
if($sharethis_key && strlen($sharethis_key) > 0) {
 ?>
  <script>
  var options={ "publisher": "<?php echo $sharethis_key; ?>", "position": "right", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
  var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
  </script>
<?php } ?> 

</body>
</html>