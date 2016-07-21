=== Just Headline ===
Plugin Name: Just Headline
Description: Widget to easy add single html heading tag
Tags: heading tag, heading, widget
Version: 1.0
Contributors: aprokopenko
Author: JustCoded
Author URI: http://justcoded.com/
License: GPL2
Requires at least: 4.3
Tested up to: 4.6
Stable tag: trunk

Widget to easy add single html heading tag

== Description ==

After installation you will have new widget available "Just Headline".

It can insert html heading tag h1-h6 into sidebar or any other widgetized areas (like Page Builders).

Furthermore you can select a style for it (by default - several pre-defined html tag class names).

**Customization**
You can change available heading sizes and styles with filter hooks. Please check FAQ for more information


== Installation ==

1. Download, unzip and upload to your WordPress plugins directory
2. Activate the plugin within you WordPress Administration Backend
3. You can use the widget now.

== Upgrade Notice ==
* Remove old plugin folder.
* Follow installation steps 1-2. All settings will be safe.


== Frequently asked questions ==

= Q: How can I edit Heading sizes list? =
A: You can add filter hook "jhl_tags_list" from your theme or plugin. You will have simple key-value pairs array, which you can modify.

= Q: How can I edit Heading styles list? =
A: You can add filter hook "jhl_styles_list" from your theme or plugin. You will have simple key-value pairs array, which you can modify.

= Q: Can I modify default classes for styles? =
A: You can add filter hook "jhl_styles_attributes" from your theme or plugin. You will have simple key-value pairs array, which you can modify.

= Q: Can I add additional wrappers for title inside heading tag? =
A: You can add filter hook "jhl_title" from your theme or plugin. You will have a title value string as parameter.


== Screenshots ==

1. Widget options

== Changelog ==
* Version 1.0
	* First version of the plugin
