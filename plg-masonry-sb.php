<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-masonry-sb (with SWIPEBOX (http://brutaldesign.github.io/swipebox/))
// funct:  create a image masonry + swipebox (with js from: http://masonry.desandro.com)

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('plg-masonry-sb', array('currentPage'=>$page));

// and set these constants in config.php:
// c::set('photo_lightbox', 'swipebox');
// c::set('enable_masonry', true);
// c::set('masonry_width', 170);       // set a width for masonry images
// c::set('masonry_limit_size', 1300); // limit the source image size (long edge)

// version: 1.2.0 (15.03.2015)
// changelog: 
// v1.0.1: add global parameters
// v1.1.0: all logic now in this snippet
// v1.2.0: option to limit source image size
// -------------------------------------------

$width = c::get('masonry_width');
$limit = c::get('masonry_limit_size');
if($limit != NULL)  $max_size = $limit;

// display masonry if there are pictures to display
if($currentPage->hasImages()) :
?>
<div id="masonry">
<?php foreach($currentPage->images() as $pic): ?>
  <div class="masonryitem">
<?php
if(isset($max_size)) :
  ($pic->width() > $pic->height()) ? $big_img = Thumb($pic, array('width' => $max_size))
                                   : $big_img = Thumb($pic, array('height' => $max_size));
?>
    <a class="swipebox" rel="gallery" href="<?php echo $big_img->url() ?>">
<?php else: ?>
    <a class="swipebox" rel="gallery" href="<?php echo $pic->url() ?>"> 
<?php endif; ?>
      <?php echo ThumbExt($pic, array('width' => $width, 'class' => 'img-rounded', 'srcset' => '2x, 3x')) ?></a>
  </div>
<?php endforeach ?>
</div>
<?php endif ?>