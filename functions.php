<?php

function alpha_child_assets(){
    wp_enqueue_style( 'parent-style', get_parent_theme_file_uri( '/style.css' ) );
}
add_action( 'wp_enqueue_scripts','alpha_child_assets' );


function alphaChild_css_enq(){
wp_enqueue_style( "alphaChild-css", get_theme_file_uri( '/style.css' ), null, '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'alphaChild_css_enq',16 );












function alpha_header_image(){
    if(is_page( )){
        $feature_image_url = get_the_post_thumbnail_url( null, "large" );
        ?>
        <style>
            .page-header{
                background-image: url(<?php echo $feature_image_url; ?>);
            }
        </style>
        <?php
        
    }

    if(is_front_page(  )){
        if(current_theme_supports( "custom-header")){
            ?>
            <style>
            .header{
                background-image: url(<?php header_image(  ); ?>);
            }
            .header h3.tagline, .header a h1{
                color: #<?php header_textcolor(  ); ?>;
                <?php
                if(!display_header_text()){
                    echo "display: none;";
                }
                ?>
            }
            .header a h1.heading{
                font-size: 48px;
            }
            </style>
            <?php
        }
    }
}
add_action( 'wp_head', 'alpha_header_image',11);

function alpha_todays_date(){
    echo date("Y/M/d");
}