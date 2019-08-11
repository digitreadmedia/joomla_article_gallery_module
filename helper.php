<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_digitread_article_gallery
 *
 * @copyright	Copyright © 2019 - All rights reserved.
 * @license		MIT
 * @author		Digitread Media
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_digitread_article_gallery
 *
 */
class ModDigitreadArticleGalleryHelper
{
	/**
	 * Retrieve list of article gallery images
	 *
	 * @param   \Joomla\Registry\Registry  &$params  module parameters
	 *
	 * @return  array
	 *
	 */
	public static function getList(&$params)
	{

        //Initiate Variables
	    $id = $params->get("article_id");
        $gallery = [];
        $images = [];
        $thisArticle = [];
        
        //Get Article
        $article = JTable::getInstance("content"); 
        $article->load($id); // Get Article 
        if((!$id)||(!isset($article->state))||($article->state < 1)) {
            return;
        }
        
        $link = JRoute::_(ContentHelperRoute::getArticleRoute($id, $article->catid, $article->language));
        
        //Load Images
        if(isset($article->attribs)) {
            $gallery = json_decode($article->attribs, true);
            if(isset($gallery['images'])) {
                $images = $gallery['images'];
            }
        }
        
        //Prepare Data
        $thisArticle['article_id'] = $id;
        $thisArticle['show_full_article'] = $params->get("show_full_article");
        $thisArticle['autoplay'] = $params->get("autoplay")?$params->get("autoplay"):'yes';
	$thisArticle['interval'] = $params->get("interval")?$params->get("interval"):3000;
		
        if($params->get("show_full_article") == 'yes') {
            $thisArticle['show_content'] = 1;
            $thisArticle['content_type'] = 'all';
            $thisArticle['show_read_more'] = 0;
            $thisArticle['read_more_text'] = '';
            $thisArticle['read_more_class'] = '';
            $thisArticle['show_intro_image'] = 0;
            $thisArticle['max_length'] = '';
        } else {
            $thisArticle['show_content'] = $params->get("show_content");
            $thisArticle['content_type'] = $params->get("content_type");
            $thisArticle['show_read_more'] = $params->get("show_read_more");
            $thisArticle['read_more_text'] = $params->get("read_more_text")?$params->get("read_more_text"):'Read More';
            $thisArticle['read_more_class'] = $params->get("read_more_class");
            $thisArticle['show_intro_image'] = $params->get("show_intro_image");
            $thisArticle['max_length'] = $params->get("max_length");
        }
        
        $thisArticle['gallery_shade'] = $params->get("gallery_shade");
        $thisArticle['max_height'] = $params->get("max_height");
        $thisArticle['show_full_article_image'] = $params->get("show_full_article_image");
        $thisArticle['show_article_links'] = $params->get("show_article_links");
        $thisArticle['gallery_type'] = $params->get("gallery_type");
        $thisArticle['images'] = $images;
        $thisArticle['article']['id'] = $article->id;
        $thisArticle['article']['title'] = $article->title;
        $thisArticle['article']['alias'] = $article->alias;
        $thisArticle['article']['link'] = $link;
        $thisArticle['article']['introtext'] = $article->introtext;
        $thisArticle['article']['fulltext'] = $article->fulltext;
        $thisArticle['article']['state'] = $article->state;
        
        $imgs = json_decode($article->images, true);
        
        $thisArticle['article']['image_intro'] = $imgs['image_intro'];
        $thisArticle['article']['float_intro'] = $imgs['float_intro'];
        $thisArticle['article']['image_intro_alt'] = $imgs['image_intro_alt'];
        $thisArticle['article']['image_intro_caption'] = $imgs['image_intro_caption'];
        $thisArticle['article']['image_fulltext'] = $imgs['image_fulltext'];
        $thisArticle['article']['float_fulltext'] = $imgs['float_fulltext'];
        $thisArticle['article']['image_fulltext_alt'] = $imgs['image_fulltext_alt'];
        $thisArticle['article']['image_fulltext_caption'] = $imgs['image_fulltext_caption'];
        
        $urls = json_decode($article->urls, true);
        
        $thisArticle['article']['urla'] = $urls['urla'];
        $thisArticle['article']['urlatext'] = $urls['urlatext'];
        $thisArticle['article']['targeta'] = $urls['targeta'];
        $thisArticle['article']['urlb'] = $urls['urlb'];
        $thisArticle['article']['urlbtext'] = $urls['urlbtext'];
        $thisArticle['article']['targetb'] = $urls['targetb'];
        $thisArticle['article']['urlc'] = $urls['urlc'];
        $thisArticle['article']['urlctext'] = $urls['urlctext'];
        $thisArticle['article']['targetc'] = $urls['targetc'];

		return $thisArticle;
	}
}
