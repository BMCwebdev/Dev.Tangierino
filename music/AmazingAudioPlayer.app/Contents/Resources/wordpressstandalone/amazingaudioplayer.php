<?php
/*
Plugin Name: Amazing Audio Player %AUDIOPLAYERID%
Plugin URI: http://amazingaudioplayer.com
Description: Amazing Audio Player WordPress Plugin %AUDIOPLAYERID%
Version: 1.3
Author: Magic Hills Pty Ltd
Author URI: http://amazingaudioplayer.com
License: Copyright 2013 Magic Hills Pty Ltd, All Rights Reserved
*/

define('AMAZINGAUDIOPLAYER_VERSION_%AUDIOPLAYERID%', '1.3');

define('AMAZINGAUDIOPLAYER_URL_%AUDIOPLAYERID%', plugin_dir_url( __FILE__ ));

define('AMAZINGAUDIOPLAYER_PATH_%AUDIOPLAYERID%', plugin_dir_path( __FILE__ ));

class AmazingAudioPlayer_Plugin_%AUDIOPLAYERID%
{
		
	function __construct() {
		
		$this->init();
	}
	
	public function init()
	{
				
		add_action( 'admin_menu', array($this, 'register_menu') );
		
		add_shortcode( 'amazingaudioplayer%AUDIOPLAYERID%', array($this, 'shortcode_handler') );
		
		add_action( 'init', array($this, 'register_script') );
	}
		
	function register_script()
	{
		$script_url = AMAZINGAUDIOPLAYER_URL_%AUDIOPLAYERID% . '/data/audioplayerengine/amazingaudioplayer.js';
		wp_register_script('amazingaudioplayer-script-%AUDIOPLAYERID%', $script_url, array('jquery'), AMAZINGAUDIOPLAYER_VERSION_%AUDIOPLAYERID%, false);
		wp_enqueue_script('amazingaudioplayer-script-%AUDIOPLAYERID%');
		
		$initscript_url = AMAZINGAUDIOPLAYER_URL_%AUDIOPLAYERID% . '/data/audioplayerengine/initaudioplayer-%AUDIOPLAYERID%.js';
		wp_register_script('amazingaudioplayer-initscript-%AUDIOPLAYERID%', $initscript_url, array('jquery'), AMAZINGAUDIOPLAYER_VERSION_%AUDIOPLAYERID%, false);
		wp_enqueue_script('amazingaudioplayer-initscript-%AUDIOPLAYERID%');
		
		$style_url = AMAZINGAUDIOPLAYER_URL_%AUDIOPLAYERID% . 'data/audioplayerengine/initaudioplayer-%AUDIOPLAYERID%.css';
		wp_register_style('amazingaudioplayer-style-%AUDIOPLAYERID%', $style_url);
		wp_enqueue_style('amazingaudioplayer-style-%AUDIOPLAYERID%');
		
		if ( is_admin() )
		{
			wp_register_style('amazingaudioplayer-admin-style-%AUDIOPLAYERID%', AMAZINGAUDIOPLAYER_URL_%AUDIOPLAYERID% . 'amazingaudioplayer.css');
			wp_enqueue_style('amazingaudioplayer-admin-style-%AUDIOPLAYERID%');
		}
	}
	
	function shortcode_handler($atts)
	{
		return $this->generate_codes();
	}
	
	function generate_codes()
	{
		$file = AMAZINGAUDIOPLAYER_PATH_%AUDIOPLAYERID% . '/data/audioplayer.html';
		$content = file_get_contents($file);
		
		$dest_url = AMAZINGAUDIOPLAYER_URL_%AUDIOPLAYERID% . '/data/';
		
		$audioplayercode = "";
		$pattern = '/<!-- Insert to your webpage where you want to display the audio player -->(.*)<!-- End of body section HTML codes -->/s';
		if ( preg_match($pattern, $content, $matches) )
			$audioplayercode = str_replace("%DESTURL%", $dest_url, $matches[1]);
		
		return $audioplayercode;
	}
	
	function register_menu()
	{
		add_menu_page( 
				__('Amazing Audio Player %AUDIOPLAYERID%', 'amazingaudioplayer%AUDIOPLAYERID%'), 
				__('Amazing Audio Player %AUDIOPLAYERID%', 'amazingaudioplayer%AUDIOPLAYERID%'), 
				'manage_options', 
				'amazingaudioplayer%AUDIOPLAYERID%_show_audioplayer', 
				array($this, 'show_audioplayer'),
				AMAZINGAUDIOPLAYER_URL_%AUDIOPLAYERID% . 'images/logo-16.png' );
				
	}
	
	public function show_audioplayer()
	{
		
		?>
		<div class="wrap">
		<div id="icon-amazingaudioplayer" class="icon32"><br /></div>
			
		<h2><?php _e( 'View Audio Player', 'amazingaudioplayer%AUDIOPLAYERID%' ); ?></h2>
				
		<div class="updated"><p style="text-align:center;"> To embed the audio player into your page, use shortcode <strong><?php echo esc_attr('[amazingaudioplayer%AUDIOPLAYERID%]'); ?></strong></p></div>
		
		<div class="updated"><p style="text-align:center;"> To embed the audio player into your template, use php code <strong><?php echo esc_attr('<?php echo do_shortcode(\'[amazingaudioplayer%AUDIOPLAYERID%]\'); ?>'); ?></strong></p></div>
				
		<?php
			echo $this->generate_codes();
		?>	 
		
		</div>
		
		<?php
	}
	
}

$amazingaudioplayer_plugin_%AUDIOPLAYERID% = new AmazingAudioPlayer_Plugin_%AUDIOPLAYERID%();
