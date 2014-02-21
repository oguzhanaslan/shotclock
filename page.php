<?php get_header(); ?>



    <div id="main ">

          <!-- Bootstrap Column -->
          <div class="col-md-8 centered" >
            
<?php if (have_posts()) : ?>
  
<?php while (have_posts()) : the_post(); ?>
 <!-- Article -->
            <article class="post1">
              <hgroup>
                <header>
                  <h2>
                  <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title(); ?></a></h2>
                </header>
              </hgroup>
              <?php the_content(); ?>
            </article>
  <!-- Article -->
<?php endwhile; ?> <?php endif; ?>

        <?php wp_pagenavi(); ?>
<!-- Comment -->

<!-- Comment -->
          </div>
          <!-- Bootstrap Column -->


    </div>



<?php get_footer(); ?>
