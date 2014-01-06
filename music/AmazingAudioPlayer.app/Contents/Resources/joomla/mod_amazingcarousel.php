<?php

/**

 * @package Amazing Carousel Joomla Module

 * @author Magic Hills Pty Ltd

 * @website http://amazingcarousel.com

 * @copyright 2013 Magic Hills Pty Ltd All Rights Reserved

 **/

//don't allow other scripts to grab and execute our file
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

$document = &JFactory::getDocument();

if (version_compare(JVERSION, '3.0', 'ge')) 
{
   JHtml::_('jquery.framework');
}
else 
{
	if ( !$params->get('is_second') )
		$document->addScript( JURI::base() . 'modules/mod_' . $module->name . '/tmpl/carouselengine/jquery.js' );
}

if ( !$params->get('is_second') )
{	
	$document->addScriptDeclaration( "var joomlaBaseUrl = '" . JURI::base() . "'; " );
	$document->addScript( JURI::base() . 'modules/mod_' . $module->name . '/tmpl/carouselengine/amazingcarousel.js' );
}

$document->addStyleSheet( JURI::base() . 'modules/mod_' . $module->name . '/tmpl/carouselengine/initcarousel-%CAROUSELID%.css' );
$document->addScript( JURI::base() . 'modules/mod_' . $module->name . '/tmpl/carouselengine/initcarousel-%CAROUSELID%.js' );

require(JModuleHelper::getLayoutPath( 'mod_'.$module->name ));