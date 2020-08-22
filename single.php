<?php get_header(); ?>

<body <?php body_class(array("first_class","second_class"));?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>


<div class="container">
    <div class="row">

    <?php if(is_active_sidebar( "sidebar-1" )):?>

        <div class="col-md-8">

    <?php else: ?>

        <div class="col-md-12">

    <?php endif; ?>

<div class="posts">

<?php 
while (have_posts()) {
    the_post(  );

?>
    <div <?php post_class(array("first_class","second_class"));?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title">
                    <?php the_title();?>
                    </h2>
                    <h2><?php the_author_posts_link(); ?></h2>
                    <?php echo get_the_date("jS F Y"); ?>

                        <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>"); ?>
                </div>
            </div>
            <div class="row">
               
                <div class="col-md-12">
                <div class="slider">


<?php
if(class_exists( 'Attachments' )){
    $attachments = new Attachments( 'slider' );
    if ($attachments->exist()) {
        while ($attachments->get()) {
            ?>
            <div>
                <?php echo $attachments->image("image"); ?>
            </div>
            <?php
        }
    }
}

?>
                </div>
                    <div>
                    <p>
                        <?php
                            if(!class_exists( "Attachments" )){

                                if(has_post_thumbnail( )){
                                    //$post_thumbnail_url = get_the_post_thumbnail_url( null, 'large' );
                                    echo '<a class="popup" href="#" data-featherlight="image">';
                                    the_post_thumbnail( "large", array('class' => 'img-fluid'));
                                    echo '</a>';
                                }
                            }
                            the_content( );

                    
                        ?>
                    </p> 
                    </div>
                        <?php 
                            

                            next_post_link( );
                            echo "<br>";
                            previous_post_link();
                        ?>
                    

                </div>
               
            </div>

        </div>
    </div>

<?php
}
?>

<div class="authorsection border p-4">
    <div class="row">
        <div class="col-md-2 authorimage">
        <?php echo get_avatar( get_the_author_meta( "id" ) ); ?>
        </div>
        <div class="col-md-10">
        <h4>
        <?php echo get_the_author_meta( "display_name" );?>
        </h4>
        <p>
           <?php echo get_the_author_meta( "description" ); ?>
        </p>
        </div>
    </div>
</div>





<?php if(comments_open( )): ?>
    
<div class="col-md-10 offset-md-1">
<?php comments_template( ); ?>
</div>

<?php endif; ?>


</div>
        </div>
        <?php if(is_active_sidebar( "sidebar-1" )): ?>
        <div class="col-md-4">
        
            <?php
            if (is_active_sidebar( "sidebar-1" )) {
                dynamic_sidebar("sidebar-1");
            }
            ?>

        </div>
        <?php endif; ?>
    </div>
</div>



<?php get_footer(); ?>
