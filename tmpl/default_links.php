<?php defined('_JEXEC') or die; ?>
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