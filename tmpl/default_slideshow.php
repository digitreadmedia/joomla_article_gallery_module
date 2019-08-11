<?php defined('_JEXEC') or die; ?>
<div class="dgt-position-relative dgt-visible-toggle dgt-<?= $thisArticle['gallery_shade']?$thisArticle['gallery_shade']:'light' ?>" tabindex="-1" dgt-slideshow="<?php if($thisArticle['autoplay'] == 'yes') {?>autoplay: true; <?php } ?><?php if($thisArticle['interval'] > 0) {?>autoplay-interval: <?= $thisArticle['interval'] ?>;<?php } ?>pause-on-hover: true;">

    <ul class="dgt-slideshow-items">
        <?php foreach($thisArticle['images'] as $key=>$val): ?>
        <li>
            <img src="<?= $val['image'] ?>" title="<?= $val['title'] ?>" alt="<?= $val['seo'] ?>" dgt-cover>
        </li>
        <?php endforeach; ?>
    </ul>

    <a class="dgt-position-center-left dgt-position-small dgt-hidden-hover dgt-slidenav-large" href="#" dgt-slidenav-previous dgt-slideshow-item="previous"></a>
    <a class="dgt-position-center-right dgt-position-small dgt-hidden-hover dgt-slidenav-large" href="#" dgt-slidenav-next dgt-slideshow-item="next"></a>

</div>
