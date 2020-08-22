<div class="header">
    <div class="container">
        <div class="row">

        <?php if(current_theme_supports( "custom-logo")):?>
        <div class="header-logo">
                    <?php
                    the_custom_logo( );
                    ?>
            </div>
        <?php endif; ?>

            <div class="col-md-12">
                <h3 class="tagline"><?php bloginfo("description");?></h3>
                <a href="<?php echo site_url(); ?>"><h1 class="align-self-center display-1 text-center heading"><?php bloginfo("name")?></h1></a>
                <p class="text-center">
                    <?php alpha_todays_date(); ?>
                </p>
            </div>

            <div class="col-md-12">
            <div class="navigation">
            <?php
            wp_nav_menu( 
                array(
                    'theme_location'  => 'topmenu',
                    'menu_id'         => 'topmenucontainer',
                    'menu_class'      => 'list-inline text-center',
                ) )
            ?>
            </div>
            </div>
        </div>
    </div>




<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
                    <?php echo get_search_form(  ); ?>
        </div>
    </div>
</div>

</div>