<?php

/**

 * @package Amazing Audio Player Joomla Module

 * @author Magic Hills Pty Ltd

 * @website http://amazingaudioplayer.com

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
	if ( $params->get('loadjquery') )
		$document->addScript( JURI::base() . 'modules/mod_' . $module->name . '/tmpl/audioplayerengine/jquery.js' );
}

if ( !$params->get('is_second') )
{	
	$document->addScriptDeclaration( "var joomlaBaseUrl = '" . JURI::base() . "'; " );
	$document->addScript( JURI::base() . 'modules/mod_' . $module->name . '/tmpl/audioplayerengine/amazingaudioplayer.js' );
}

$document->addStyleSheet( JURI::base() . 'modules/mod_' . $module->name . '/tmpl/audioplayerengine/initaudioplayer-%AUDIOPLAYERID%.css' );
$document->addScript( JURI::base() . 'modules/mod_' . $module->name . '/tmpl/audioplayerengine/initaudioplayer-%AUDIOPLAYERID%.js' );

require(JModuleHelper::getLayoutPath( 'mod_'.$module->name ));