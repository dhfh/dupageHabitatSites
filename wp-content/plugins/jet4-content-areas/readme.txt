=== JET4 Content Areas ===
Contributors: jet4
Donate link: http://jet4plugins.com/donate/
Tags: content, widget, shortcode, draggable, template tags, cms
Requires at least: 3.0
Tested up to: 3.2.1

Simple. Flexible. Versatile. This plugin will not get in your way.  Place your content anywhere on your site.

== Description ==

JET4 Content Areas allows you to create content which you can drag into a widget area, show in your template files, or place into your other posts and/or pages.
This plugin also has many hooks, including filters for almost everything as well as actions so you can modify its behavior to fit your needs painlessly.

= Recent Bug Fixes: =
* Widget Checkboxes: Checkboxes now stay checked when they are turned on.

= Plugin's Official Site =
JET4 Plugins ([http://jet4plugins.com/content-areas](http://jet4plugins.com/content-areas/))
<br />Please comment here for issues/complaints/suggestions.

== Installation ==

1. Upload the whole `jet4-content-areas` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

= Using the Shortcode =
Here is a simple example:
<br />[jet4-content-area name=content-area-slug-or-id]
<br />or it has two available attributes:
<br />[jet4-content-area name=content-area-slug-or-id show_title=true show_image=true]

= Using the Template Tag =
This is very similar to the shortcode option:
<br />&lt;?php jet4_show_content_area('content-area-slug-or-id'); ?&gt;
<br />or
<br />&lt;?php jet4_show_content_area('content-area-slug-or-id',true,true); ?&gt;
<br />The first 'true' is to show the title, and the second 'true' is show the featured image
<br />(if your theme supports them and you have one assigned to the content area).

== Frequently Asked Questions ==

Coming Soon.

== Screenshots ==

1. screenshot-1.png