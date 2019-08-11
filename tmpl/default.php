<?php
defined('_JEXEC') or die;

if($thisArticle['show_content'] == 1):
?>
<div class="dgt-section dgt-padding-remove">
    <div class="dgt-container dgt-padding-small">
        <?php if(count($thisArticle['images']) > 0): ?>
            <?php if($thisArticle['gallery_type'] == 'left'):?>
                <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_left'); ?>
            <?php elseif($thisArticle['gallery_type'] == 'right'): ?>
                <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_right'); ?>
            <?php else: ?>
                <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_bottom'); ?>            
            <?php endif; ?>
        <?php else: ?>
            <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_noimages'); ?>            
        <?php endif;?>
    </div>
</div>
<?php else: ?>
    <?php if(count($thisArticle['images']) > 0):
        $show = null;
        switch($thisArticle['gallery_type']) {
            case 'left':
            case 'right':
            default:
                $show = 'slideshow';
                break;
            case 'bottom':
                $show = 'thumbs';
                break;
        }
        
        if($show == 'slideshow'):
    ?>
            <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_slideshow'); ?>
        <?php else: ?>
            <?php require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default') . '_gallery'); ?>
        <?php endif ?>
    <?php else: ?>
        <div class="dgt-section dgt-padding-small">
            <div class="dgt-container">
                <h3>No Content Available</h3>
                <hr/>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>