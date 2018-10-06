<?php
/**
 * Base Config Url 
//--------------------------------------------

/**
 * Base Css Path
 * 
 * @access public
 * @return string
 */
if( !function_exists("base_css") ) {
	function base_css() {
		$CI	=& get_instance();
		return $CI->config->item('base_css');
	}
}

/**
 * Base Image Path
 * 
 * @access public
 * @return string
 */
if( !function_exists("base_img") ) {
	function base_img() {
		$CI	=& get_instance();
		return $CI->config->item('base_img');
	}
}

/**
 * Base Javascript Path
 * 
 * @access public
 * @return string
 */
if( !function_exists("base_js") ) {
	function base_js() {
		$CI	=& get_instance();
		return $CI->config->item('base_js');
	}
}

?>