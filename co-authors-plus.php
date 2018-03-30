<?php
/*
Plugin Name: Co-Authors Plus
Plugin URI: http://wordpress.org/extend/plugins/co-authors-plus/
Description: Allows multiple authors to be assigned to a post. This plugin is an extended version of the Co-Authors plugin developed by Weston Ruter.
Version: 3.2.2
Author: Mohammad Jangda, Daniel Bachhuber, Automattic
Copyright: 2008-2015 Shared and distributed between Mohammad Jangda, Daniel Bachhuber, Weston Ruter

GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

-----------------

Glossary:

User - a WordPress user account
Guest author - a CAP-created co-author
Co-author - in the context of a single post, a guest author or user assigned to the post alongside others
Author - user with the role of author
*/

// Setup PHP Version Requirements
require_once( dirname( __FILE__ ) . '/class-cap-requirements.php' );
$cap_requirements_message = esc_html__( '"Co Authors Plus" plugin was deactivated because it requires PHP 5.6.0. Please upgrade your hosting environment and reactivate the plugin.', 'co-authors-plus' );
$cap_requirements = new CAP_Requirements('5.6.0', plugin_basename( __FILE__ ), $cap_requirements_message  );

// Load the plugin if PHP Requirements are met
if ( $cap_requirements->enviroment_meets_requirements() ) {
	require_once( dirname( __FILE__ ) . '/co-authors-plus-core.php' );
}