<?php /*

**************************************************************************

Plugin Name:  Breadcrumb Titles For Pages
Plugin URI:   http://www.viper007bond.com/wordpress-plugins/page-breadcrumbs-for-wptitle/
Description:  Modifies <code>wp_title()</code> to display the full ancestor list for Pages.
Version:      1.2.0
Author:       Viper007Bond
Author URI:   http://www.viper007bond.com/

**************************************************************************

Copyright (C) 2008 Viper007Bond

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/

// Filter wp_title() to add the ancenstors
add_filter( 'wp_title', 'page_breadcrumb_wptitle', 25, 3 );

// Do the title modification
function page_breadcrumb_wptitle( $title, $sep, $seplocation = null ) {
	global $wp_query;

	// Posts don't have parents
	if ( !is_page() )
		return $title;

	$post = $wp_query->get_queried_object();

	// If this is a top level Page, then there's nothing to modify
	if ( 0 == $post->post_parent )
		return $title;

	$prefix = " $sep ";

	// Figure out where the seperator is since the filter doesn't pass $seplocation pre-WordPress 2.7
	if ( null === $seplocation )
		$seplocation = ( $prefix === substr( $title, strlen( $prefix ) * -1 ) ) ? 'right' : 'left';

	// Copy the ancestors value so we can modify it
	$ancestors = $post->ancestors;

	// Prepend the current page onto the front of the list so it shows up in the title
	array_unshift( $ancestors, $post->ID );

	// If the blog title is not on the right (i.e. the left), then we need to flip the order
	if ( 'right' != $seplocation )
		$ancestors = array_reverse( $ancestors );

	// Get all of the titles
	$titles = array();
	foreach ( $ancestors as $ancestor )
		$titles[] = strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) );

	// Create the breadcrumb list
	$title = implode( $prefix, $titles );

 	// Determines position of the separator
	if ( 'right' == $seplocation )
		$title = $title . $prefix;
	else
		$title = $prefix . $title;

	return $title;
}

?>