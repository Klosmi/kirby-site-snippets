<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-carousel
// funct:  twitter bootstap carousel for photos in carousel subpage (folder)

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | jtByt.Pictures@gmail.com
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('plg-carousel', array('currentPage'=>$page,
//                               'preNormal'=>'optional html to add before carousel',
//                               'preAlt'=>'html if snippet is not displayed (for other styles)'))

// version: 1.1.1 (10.01.2015)
// changelog: 
// v1.1.0: all logic now in this snippet
// v1.1.1: bugfix: fix error if no preNormal and preAlt attributes were set
// -------------------------------------------

// display carousel only if there are images
$carouselFolder = $currentPage->children()->find('carousel');
if (!isset($preNormal)) {$preNormal="";}
if (!isset($preAlt)) {$preAlt="";}

// if folder exists
if (!(false==$carouselFolder) && ($carouselFolder->hasImages())) : echo $preNormal
?>
  
  <div id="myCarousel" class="carousel slide">
<?php $carouselfolder = $page->children()->find('carousel') ?>

    <!-- Indicators -->
    <ol class="carousel-indicators">
<?php $n=0; foreach($carouselfolder->images()->sortBy($sort='title', $dir='desc') as $image): $n++; ?>
        <li data-target="#myCarousel" data-slide-to="<?php $n ?>" class="<?php if($n==1) echo ' active' ?>"></li>
<?php endforeach ?>
    </ol>

    <div class="carousel-inner">
<?php $n=0; foreach($carouselfolder->images()->sortBy($sort='title', $dir='desc') as $image): $n++; ?>
      <div class="item<?php if($n==1) echo ' active' ?>">
        <img src="<?php echo $image->url() ?>" alt="<?php echo $image->title()->html() ?>" />
        <div class="carousel-caption">
          <h3><?php echo $image->heading()->kirbytext() ?></h3>
          <?php echo $image->caption()->kirbytext() ?>
        </div>
      </div>
<?php endforeach ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
  </div>

<?php else : echo $preAlt ?>

<?php endif ?>