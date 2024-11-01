=== SW Lazy Load ===
Contributors: josedasilva
Donate link: http://blog.josedasilva.net/wordpress-plugin-sw-lazy-load/
Tags: image, lazy load, speed, performance
Requires at least: 3.0.1
Tested up to: 3.9
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

SW Lazy Load is a no brain plugin that allow's you to load only images when they are needed.

== Description ==

This plugin is the a no brain solution to implement lazy loading on your website. After activated the plugin will only load the images when they are needed to be shown to user.

This plugin replaces all your images by a placeholder and it loads the content when gets closer to the browser viewport, when visitor scrolls down.

= Will work on your theme images =

Unlike most of the lazy loading plugins, SW Lazy Load makes a complete page parse for images to apply the rules. This ensures that the images you use on your themes will also be covered with the lazy loading.


The plugin uses the 'unveil.js' as support for the functionality. Credits for this lib on ( https://github.com/luis-almeida/unveil )

Please let me know if you need further help with the plugin.


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `sw-lazy-load` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. All good to go


== Changelog ==

= 0.4.0 =
 * Adding work around to fix gravatars issue reported by users

= 0.3.3 =
 * Removing previous changes, malfunction

= 0.3.2 =
 * Improving the wp_enqueue_script call, removing WP_DEBUG = true warnings

= 0.3.1 =
 * Removing warnings resulting from ivalid html5 headers 

= 0.3 =
* First plugin version

== Upgrade Notice ==

None
