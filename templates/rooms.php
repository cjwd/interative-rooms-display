<?php
$rooms = new WP_Query([
  'post_type' =>  'room',
  'posts_per_page' => -1,
  'status'  => 'publish',
  'order' => 'ASC',
  'orderby' => 'menu_order'
]);

$options = get_option('ird_settings');

?>
<div class="ird-wrapper">
<?php if( $rooms->have_posts() ) : ?>
  <div id="ird-slideshow" class="ird-slideshow" style="max-width:<?= $options['ird_slideshow_width']; ?>px;">
    <?php while( $rooms->have_posts() ) : $rooms->the_post(); ?>
      <div class="ird-slide">
        <h2 class="ird-slide-title"><?php the_title(); ?></h2>
        <div class="ird-scene">
          <div class="ird-views">
            <?php $items = maybe_unserialize( get_post_meta( $post->ID, 'room_items', true ) );  ?>

            <div class="ird-view">
              <?php the_post_thumbnail( 'full', ['class' => 'ird-view__img']); ?>
              <?php foreach( $items as $item ) : ?>
                <div class="ird-item" style="top:<?= $item['item_y_coord']; ?>px; left:<?= $item['item_x_coord']; ?>px;">
                  <img src="<?= $item['item_image'][0]; ?>" alt="" class="ird-item__img">
                  <div class="ird-item__info">
                    <h3 class="ird-item__title"><?= $item['item_name']; ?></h3>
                    <div class="ird-item__desc">
                      <p><?= $item['item_description']; ?></p>
                    </div>
                  </div>
                  <button class="btn btn--close">
                    X
                    <span class="screen-reader-text">Close</span>
                  </button>
                </div>
                <!-- /.ird-item -->
              <?php endforeach; ?>
            </div>
            <!-- /.ird-view -->

          </div>
          <!-- /.ird-views -->
        </div>
        <!-- /.ird-scene -->
      </div>
      <!-- /.ird-slide -->
    <?php endwhile; ?>
  </div>
  <nav class="nav nav--slideshow">
    <?php while( $rooms->have_posts() ) : $rooms->the_post(); ?>
      <button class="nav__item">
        <span class="nav__item-inner">
          <?php the_post_thumbnail('thumbnail', ['class' => 'nav__item-img']); ?>
        </span>
        <span class="nav__item-title"><?php the_title(); ?></span>
      </button>
    <?php endwhile; ?>
  </nav>

  <!-- /#ird-slideshow.ird-slideshow -->
<?php else: ?>
  <p>You haven't set up any interactive rooms yet.</p>
<?php endif; ?>
</div> <!-- /.ird-wrapper -->
