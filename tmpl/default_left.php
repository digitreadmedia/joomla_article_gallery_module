<?php defined('_JEXEC') or die; ?>

<div class="dgt-grid-collapse" dgt-grid>
    <?php if(count($thisArticle['images']) > 0) : ?>
        <div class="dgt-width-1-2@m dgt-margin-small-bottom">
            <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_slideshow'); ?>
        </div>
    <?php endif; ?>
    <div class="dgt-width-expand@m dgt-padding-small dgt-padding-remove-top">
        <?php if($thisArticle['content_type'] == 'all') :?>
            <?php if(($thisArticle['show_full_article_image'] == 1)&&(strlen($thisArticle['article']['image_fulltext']) > 0)): ?>
                <div class="dgt-align-center dgt-width-expand"><img src="<?= $thisArticle['article']['image_fulltext'] ?>" class="dgt-align-center" title="<?= $thisArticle['article']['image_fulltext_caption'] ?>" alt="<?= $thisArticle['article']['image_fulltext_alt'] ?>"></div>
            <?php endif; ?>
                <div class="dgt-width-expand"><?= $thisArticle['article']['introtext'] ?></div>
                <hr/>
                <div class="dgt-width-expand"><?= $thisArticle['article']['fulltext'] ?></div>
                <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_links'); ?>
        <?php elseif($thisArticle['content_type'] == 'intro') :?>
            <?php if(($thisArticle['show_intro_image'] == 1)&&(strlen($thisArticle['article']['image_intro']) > 0)): ?>
                <div class="dgt-align-center dgt-width-expand"><img src="<?= $thisArticle['article']['image_intro'] ?>" class="dgt-align-center" title="<?= $thisArticle['article']['image_intro_caption'] ?>" alt="<?= $thisArticle['article']['image_intro_alt'] ?>"></div>
            <?php endif; ?>    
                <div class="dgt-width-expand">
                    <?php if($thisArticle['max_length'] > 0) {
                        echo substr($thisArticle['article']['introtext'],0,$thisArticle['max_length']);
                        } else { 
                        echo $thisArticle['article']['introtext'];
                    } ?></div>
                <?php if($thisArticle['show_read_more'] == 1): ?>
                <div class="dgt-width-expand read-more">
                    <a href="<?= $thisArticle['article']['link'] ?>" class="<?= $thisArticle['read_more_class'] ?>"><?= $thisArticle['read_more_text'] ?></a>
                </div>
            <?php endif; ?>                    
        <?php elseif($thisArticle['content_type'] == 'full') :?>
            <?php if(($thisArticle['show_full_article_image'] == 1)&&(strlen($thisArticle['article']['image_fulltext']) > 0)): ?>
                <div class="dgt-align-center dgt-width-expand"><img src="<?= $thisArticle['article']['image_fulltext'] ?>" class="dgt-align-center" title="<?= $thisArticle['article']['image_fulltext_caption'] ?>" alt="<?= $thisArticle['article']['image_fulltext_alt'] ?>"></div>
            <?php endif; ?>
            <div class="dgt-width-expand"><?= $thisArticle['article']['fulltext'] ?></div>
            <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_links'); ?>
        <?php endif; ?>
    </div>
</div>
