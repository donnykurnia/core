<?php

/**
* ownCloud - ajax frontend
*
* @author Robin Appelman
* @copyright 2010 Robin Appelman icewind1991@gmail.com
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/

// Check if we are a user
OCP\User::checkLoggedIn();

$filename = $_GET["file"];

if(!OC_Filesystem::file_exists($filename)) {
	header("HTTP/1.0 404 Not Found");
	$tmpl = new OCP\Template( '', '404', 'guest' );
	$tmpl->assign('file', $filename);
	$tmpl->printPage();
	exit;
}

$ftype=OC_Filesystem::getMimeType( $filename );

header('Content-Type:'.$ftype);
if ( preg_match( "/MSIE/", $_SERVER["HTTP_USER_AGENT"] ) ) {
	header( 'Content-Disposition: attachment; filename="' . rawurlencode( basename($filename) ) . '"' );
} else {
	header( 'Content-Disposition: attachment; filename*=UTF-8\'\'' . rawurlencode( basename($filename) )
										 . '; filename="' . rawurlencode( basename($filename) ) . '"' );
}
OCP\Response::disableCaching();
header('Content-Length: '.OC_Filesystem::filesize($filename));

OC_Util::obEnd();
OC_Filesystem::readfile( $filename );
