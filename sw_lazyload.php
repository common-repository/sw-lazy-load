<?php
/**
 * @package sw_lazyload
 * @version 0.4
 */
/*
Plugin Name: SW Lazy Load
Plugin URI: http://seedworks.pt/wp-plugins/sw-lazyload.zip
Description: A simple image lazy load plugin for wordpress
Author: Jose da Silva
Version: 0.4.0
Author URI: http://blog.josedasilva.net/
License: GPL2

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/


function sw_activation_hook() {
	ob_start();
}

function sw_flush_hook() {


	$content = ob_get_contents();
	ob_end_clean();

	echo sw_replace_html_images($content);
	
}

function sw_replace_html_images($content) {

	$empty_image_url = plugins_url( '/assets/media/b.gif', __FILE__ );
 
	libxml_use_internal_errors(true);
	$doc = new DOMDocument();

	$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8"); 
	$doc->loadHTML( $content );

	$images = $doc->getElementsByTagName('img'); // Find Sections 

	foreach($images as $img) {
		$src = $img->getAttribute("src");

		$data_src = $doc->createAttribute("data-src");
		$data_src->value = str_replace("&","&amp;",$src); // Hack to prevent breaking gravatars
		$img->appendChild($data_src);

		$img->setAttribute("src", $empty_image_url);
		
	}
	libxml_use_internal_errors(false);

	return $doc->saveHTML();
}


/* Leaving admin out of the equation*/
if ( ! is_admin() ) {
	add_action('wp_head','sw_activation_hook');
	add_action('wp_footer','sw_flush_hook');
	wp_enqueue_script( 'jquery.unveil', plugins_url( '/assets/js/jquery.unveil.min.js', __FILE__ ), array( 'jquery' ), "1.0", true );
}