<script>
  AOS.init();
</script>


<footer>
        <?php 
            wp_nav_menu( 
                array(
                'theme_location' => 'footer-col-1',
                'menu_class' =>"footer-nav"
            ) 
                );

        ?>

<?php 
            wp_nav_menu( 
                array(
                'theme_location' => 'footer-col-2',
                'menu_class' =>"footer-nav"
            ) 
                );

        ?>

<?php 
            wp_nav_menu( 
                array(
                'theme_location' => 'footer-col-3',
                'menu_class' =>"footer-nav"
            ) 
                );

        ?>
    </footer>

<?php wp_footer(  )?>
</body>
</html>