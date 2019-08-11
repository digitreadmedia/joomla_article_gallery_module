<?php defined('_JEXEC') or die; ?>

<div class="dgt-grid-collapse" dgt-grid>
    <div class="dgt-width-1-1 dgt-padding-small dgt-padding-remove-top">
    <?php if($thisArticle['content_type'] == 'all') :?>
        <?php if(($thisArticle['show_full_article_image'] == 1)&&($thisArticle['article']['image_fulltext'])): ?>
            <div class="dgt-align-center dgt-width-expand"><img src="<?= $thisArticle['article']['image_fulltext'] ?>" class="dgt-align-center" title="<?= $thisArticle['article']['image_fulltext_caption'] ?>" alt="<?= $thisArticle['article']['image_fulltext_alt'] ?>"></div>
        <?php endif; ?>
            <div class="dgt-width-expand"><?= $thisArticle['article']['introtext'] ?></div>
            <hr/>
            <div class="dgt-width-expand"><?= $thisArticle['article']['fulltext'] ?></div>
            <?php if($thisArticle['show_article_links'] == 1): ?>
                <ul class="dgt-list dgt-list-striped">
                    <?php if($thisArticle['article']['urla']):
                        $url = $thisArticle['article']['urla'];
                        $alias = $thisArticle['article']['alias'];
                        switch($thisArticle['article']['targeta']) {
                            case 0:
                            case '':
                            default:
                                $target = 'target="_self"';
                                $toggle = "";
                                $link = $thisArticle['article']['urla'];
                                break;
                            case 1:
                                $target = 'target="_blank"';
                                $toggle = "";
                                $link = $thisArticle['article']['urla'];
                                break;   
                            case 2:
                            case 3:
                                $target = 'dgt-toggle';
                                $link = '#'.$thisArticle['article']['alias'].'-a';
                                $toggle = '<div id="'.$thisArticle['article']['alias'].'-a" class="dgt-flex-top" dgt-modal>'
                                    .   '<div class="dgt-modal-dialog dgt-width-auto dgt-margin-auto-vertical">'
                                    .   '<button class="dgt-modal-close-outside" type="button" dgt-close></button>'
                                    .   '<iframe src="'.$url.'" style="width: 90vw; height:80vh; overflow: auto;" frameborder="0"></iframe></div></div>';
                                break;                                                
                        } ?>
                        <li>
                            <?= $toggle ?>
                            <a href="<?= $link ?>" class="article-links" <?= $target ?>><?= $thisArticle['article']['urlatext'] ?></a></li>
                    <?php endif; ?>
                    <?php if($thisArticle['article']['urlb']):
                        $url = $thisArticle['article']['urlb'];
                        $alias = $thisArticle['article']['alias'];
                        switch($thisArticle['article']['targetb']) {
                            case 0:
                            case '':
                            default:
                                $target = 'target="_self"';
                                $toggle = "";
                                $link = $thisArticle['article']['urlb'];
                                break;
                            case 1:
                                $target = 'target="_blank"';
                                $toggle = "";
                                $link = $thisArticle['article']['urlb'];
                                break;   
                            case 2:
                            case 3:
                                $target = 'dgt-toggle';
                                $link = '#'.$thisArticle['article']['alias'].'-b';
                                $toggle = '<div id="'.$thisArticle['article']['alias'].'-b" class="dgt-flex-top" dgt-modal>'
                                    .   '<div class="dgt-modal-dialog dgt-width-auto dgt-margin-auto-vertical">'
                                    .   '<button class="dgt-modal-close-outside" type="button" dgt-close></button>'
                                    .   '<iframe src="'.$url.'" style="width: 90vw; height:80vh; overflow: auto;" frameborder="0"></iframe></div></div>';
                                break;                                                
                        } ?>
                        <li>
                            <?= $toggle ?>
                            <a href="<?= $link ?>" class="article-links" <?= $target ?>><?= $thisArticle['article']['urlbtext'] ?></a></li>
                    <?php endif; ?>
                    <?php if($thisArticle['article']['urlc']):
                        $url = $thisArticle['article']['urlc'];
                        $alias = $thisArticle['article']['alias'];
                        switch($thisArticle['article']['targetc']) {
                            case 0:
                            case '':
                            default:
                                $target = 'target="_self"';
                                $toggle = "";
                                $link = $thisArticle['article']['urlc'];
                                break;
                            case 1:
                                $target = 'target="_blank"';
                                $toggle = "";
                                $link = $thisArticle['article']['urlc'];
                                break;   
                            case 2:
                            case 3:
                                $target = 'dgt-toggle';
                                $link = '#'.$thisArticle['article']['alias'].'-c';
                                $toggle = '<div id="'.$thisArticle['article']['alias'].'-c" class="dgt-flex-top" dgt-modal>'
                                    .   '<div class="dgt-modal-dialog dgt-width-auto dgt-margin-auto-vertical">'
                                    .   '<button class="dgt-modal-close-outside" type="button" dgt-close></button>'
                                    .   '<iframe src="'.$url.'" style="width: 90vw; height:80vh; overflow: auto;" frameborder="0"></iframe></div></div>';
                                break;                                                
                        } ?>
                        <li>
                            <?= $toggle ?>
                            <a href="<?= $link ?>" class="article-links" <?= $target ?>><?= $thisArticle['article']['urlctext'] ?></a></li>
                    <?php endif; ?>                                    
                </ul>
            <?php endif; ?>
    <?php elseif($thisArticle['content_type'] == 'intro') :?>
        <?php if(($thisArticle['show_intro_image'] == 1)&&($thisArticle['article']['image_intro'])): ?>
            <div class="dgt-align-center dgt-width-expand"><img src="<?= $thisArticle['article']['image_intro'] ?>" class="dgt-align-center" title="<?= $thisArticle['article']['image_intro_caption'] ?>" alt="<?= $thisArticle['article']['image_intro_alt'] ?>"></div>
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
        <?php endif; ?>                    
    <?php elseif($thisArticle['content_type'] == 'fulltext') :?>
        <?php if(($thisArticle['show_full_article_image'] == 1)&&($thisArticle['article']['image_fulltext'])): ?>
            <div class="dgt-align-center dgt-width-expand"><img src="<?= $thisArticle['article']['image_fulltext'] ?>" class="dgt-align-center" title="<?= $thisArticle['article']['image_fulltext_caption'] ?>" alt="<?= $thisArticle['article']['image_fulltext_alt'] ?>"></div>
        <?php endif; ?>
        <div class="dgt-width-expand"><?= $thisArticle['article']['fulltext'] ?></div>
    <?php endif; ?>
</div>
    <div class="dgt-width-1-1 dgt-padding-small">
        <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_gallery'); ?>
    </div>
</div>
