<?php defined('_JEXEC') or die; ?>

<div class="dgt-child-width-1-4@m" dgt-grid dgt-lightbox="animation: slide">
    <?php foreach($thisArticle['images'] as $key=>$val): ?>
    <div>
        <a class="dgt-inline" href="<?= $val['image'] ?>" data-caption="<?= $val['title'] ?>" style="max-height:<?= $val['max_height']?$val['max_height']:110 ?>px; overflow:hidden;">
            <img src="<?= $val['image'] ?>" alt="<?= $val['seo'] ?>" style="width: 100%; height:auto;">
        </a>
    </div>
    <?php endforeach; ?>
</div>