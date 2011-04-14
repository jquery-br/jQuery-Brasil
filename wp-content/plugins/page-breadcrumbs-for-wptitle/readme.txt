=== Breadcrumb Titles For Pages ===
Contributors: Viper007Bond
Donate link: http://www.viper007bond.com/donate/
Tags: title, breadcrumb, pages
Requires at least: 2.0.11
Stable tag: trunk

Modifies wp_title() to display the full ancestor list for Pages.

== Description ==

This plugin modifies [`wp_title()`](http://codex.wordpress.org/Template_Tags/wp_title) (the function used to create the title of your website) to output all parent Pages when viewing a child Page (top level Pages obviously won't be affected).

Example: `Grandchild Page « Child Page « Top Level Page « YourSite.com`

It obeys your separator (if you're using a custom one) as well as `wp_title()`'s third parameter which controls the seperator location.

== Installation ==

###Updgrading From A Previous Version###

To upgrade from a previous version of this plugin, delete the entire folder and files from the previous version of the plugin and then follow the installation instructions below.

###Installing The Plugin###

Extract all files from the ZIP file, making sure to keep the file structure intact, and then upload it to `/wp-content/plugins/`.

This should result in the following file structure:

`- wp-content
    - plugins
        - page-breadcrumbs-for-wptitle
            | readme.txt
            | page-breadcrumbs-for-wptitle`

Then just visit your admin area and activate the plugin. That's it!

**See Also:** ["Installing Plugins" article on the WP Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== ChangeLog ==

**Version 1.2.0**

* Fix order when the separator location is on the right.

**Version 1.1.0**

* The post ancestors are stored in the `$post` variable. No need to use `get_post()`.

**Version 1.0.0**

* Initial release.