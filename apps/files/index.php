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

// Load the files we need
OCP\Util::addStyle('files', 'files');
OCP\Util::addscript('files', 'jquery.iframe-transport');
OCP\Util::addscript('files', 'jquery.fileupload');
OCP\Util::addscript('files', 'jquery-visibility');
OCP\Util::addscript('files', 'files');
OCP\Util::addscript('files', 'filelist');
OCP\Util::addscript('files', 'fileactions');
OCP\Util::addscript('files', 'keyboardshortcuts');

OCP\App::setActiveNavigationEntry('files_index');
// Load the files
$dir = isset($_GET['dir']) ? stripslashes($_GET['dir']) : '';
// Redirect if directory does not exist
if (!OC_Filesystem::is_dir($dir . '/')) {
	header('Location: ' . $_SERVER['SCRIPT_NAME'] . '');
	exit();
}

$files = array();
foreach (OC_Files::getdirectorycontent($dir) as $i) {
	$i['date'] = OCP\Util::formatDate($i['mtime']);
	if ($i['type'] == 'file') {
		$fileinfo = pathinfo($i['name']);
		$i['basename'] = $fileinfo['filename'];
		if (!empty($fileinfo['extension'])) {
			$i['extension'] = '.' . $fileinfo['extension'];
		} else {
			$i['extension'] = '';
		}
	}
	if ($i['directory'] == '/') {
		$i['directory'] = '';
	}
	$files[] = $i;
}

// Make breadcrumb
$breadcrumb = array();
$pathtohere = '';
foreach (explode('/', $dir) as $i) {
	if ($i != '') {
		$pathtohere .= '/' . $i;
		$breadcrumb[] = array('dir' => $pathtohere, 'name' => $i);
	}
}

// make breadcrumb und filelist markup
$list = new OCP\Template('files', 'part.list', '');
$list->assign('files', $files, false);
$list->assign('baseURL', OCP\Util::linkTo('files', 'index.php') . '?dir=', false);
$list->assign('downloadURL', OCP\Util::linkTo('files', 'download.php') . '?file=', false);
$list->assign('disableSharing', false);
$breadcrumbNav = new OCP\Template('files', 'part.breadcrumb', '');
$breadcrumbNav->assign('breadcrumb', $breadcrumb, false);
$breadcrumbNav->assign('baseURL', OCP\Util::linkTo('files', 'index.php') . '?dir=', false);

$maxUploadFilesize=OCP\Util::maxUploadFilesize($dir);

$permissions = OCP\PERMISSION_READ;
if (OC_Filesystem::isCreatable($dir . '/')) {
	$permissions |= OCP\PERMISSION_CREATE;
}
if (OC_Filesystem::isUpdatable($dir . '/')) {
	$permissions |= OCP\PERMISSION_UPDATE;
}
if (OC_Filesystem::isDeletable($dir . '/')) {
	$permissions |= OCP\PERMISSION_DELETE;
}
if (OC_Filesystem::isSharable($dir . '/')) {
	$permissions |= OCP\PERMISSION_SHARE;
}

// information about storage capacities
$storageInfo=OC_Helper::getStorageInfo();

$tmpl = new OCP\Template('files', 'index', 'user');
$tmpl->assign('fileList', $list->fetchPage(), false);
$tmpl->assign('breadcrumb', $breadcrumbNav->fetchPage(), false);
$tmpl->assign('dir', OC_Filesystem::normalizePath($dir));
$tmpl->assign('isCreatable', OC_Filesystem::isCreatable($dir . '/'));
$tmpl->assign('permissions', $permissions);
$tmpl->assign('files', $files);
$tmpl->assign('uploadMaxFilesize', $maxUploadFilesize);
$tmpl->assign('uploadMaxHumanFilesize', OCP\Util::humanFileSize($maxUploadFilesize));
$tmpl->assign('allowZipDownload', intval(OCP\Config::getSystemValue('allowZipDownload', true)));
$tmpl->assign('usedSpacePercent', (int)$storageInfo['relative']);
$tmpl->printPage();
