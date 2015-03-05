<?php
/*footer.php*/
?>
	</div>
	<footer class="clearfix">
		<div id="title-info">
			<h2><?php bloginfo('name');?></h2>
            <p>{Telephone}</p>
			<p>{Address - kjdfhfkfdlkhkjfdhkgkjglkfhlkfjgklfgllgf}</p>
		</div>
        
		<?php 
        $args = array(
            'theme_location'=>'footer',
			'container' => false
        );
        wp_nav_menu($args);
    
        ?>
              
		<div id="copyright" class="clearfix">
			<div class="col1">
            	<p>Copyright &copy; <?php echo date('Y');?> <?php bloginfo('name');?> </p></div>
            <div class="col2">
            	<p>{All Rights Reserved}</p>
            </div>
		</div>
<?php wp_footer();?>
	</footer>

	</body>
</html>