<?php
/**
 * @copyright	Copyright © 2019 - All rights reserved.
 * @license		MIT
 * @author		Digitread Media
 */
defined('_JEXEC') or die;

JLoader::register('ModDigitreadArticleGalleryHelper', __DIR__ . '/helper.php');

//Get Parameters
$doc = JFactory::getDocument();
$loadCss = $params->get("loadcss");
$loadJs = $params->get("loadjs");
	    
//Load Assets
if(($loadCss == 'yes')||($loadCss == '')) {
    $doc->addStyleSheet(JURI::base(true).'/modules/mod_digitread_article_gallery/assets/css/uikit.min.css');
}
if(($loadJs == 'yes')||($loadJs == '')) {
    $doc->addScript(JURI::base(true).'/modules/mod_digitread_article_gallery/assets/js/uikit.min.js');
    $doc->addScript(JURI::base(true).'/modules/mod_digitread_article_gallery/assets/js/uikit-icons.min.js');
}
        
$moduleclass_sfx    = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$thisArticle        = ModDigitreadArticleGalleryHelper::getList($params);

require JModuleHelper::getLayoutPath('mod_digitread_article_gallery', $params->get('layout', 'default'));
