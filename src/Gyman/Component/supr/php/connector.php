<?php

error_reporting(0); // Set E_ALL for debuging

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';
// Required for FTP connector support
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeFTP.class.php';


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}

$opts = array(
	// 'debug' => true,
	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
			'path'          => '../files/',         // path to files (REQUIRED)
			'URL'           => dirname($_SERVER['PHP_SELF']) . '/../files/', // URL to files (REQUIRED)
			//'accessControl' => 'access',             // disable and hide dot starting files (OPTIONAL)
			//'uploadAllow'   => array('images/*'),
			'uploadDeny'    => array('all'),
			//'uploadOrder'   => 'deny,allow'
			 'disabled'     => array('delete'),      // list of not allowed commands
			// 'dotFiles'     => false,        // display dot files
			// 'dirSize'      => true,         // count total directories sizes
			// 'fileMode'     => 0666,         // new files mode
			// 'dirMode'      => 0777,         // new folders mode
			// 'mimeDetect'   => 'internal',       // files mimetypes detection method (finfo, mime_content_type, linux (file -ib), bsd (file -Ib), internal (by extensions))
			// 'uploadAllow'  => array(),      // mimetypes which allowed to upload
			// 'uploadDeny'   => array(),      // mimetypes which not allowed to upload
			// 'uploadOrder'  => 'deny,allow', // order to proccess uploadAllow and uploadAllow options
			// 'imgLib'       => 'mogrify',       // image manipulation library (imagick, mogrify, gd)
			// 'tmbDir'       => '.tmb',       // directory name for image thumbnails. Set to "" to avoid thumbnails generation
			// 'tmbCleanProb' => 1,            // how frequiently clean thumbnails dir (0 - never, 100 - every init request)
			// 'tmbAtOnce'    => 5,            // number of thumbnails to generate per request
			// 'tmbSize'      => 48,           // images thumbnails size (px)
			// 'fileURL'      => true,         // display file URL in "get info"
			// 'dateFormat'   => 'j M Y H:i',  // file modification date format
			// 'logger'       => null,         // object logger
			'defaults'     => array(        // default permisions
				'read'   => true,
				'write'  => false,
				'rm'     => false
			),
			'perms' => array( // individual folders/files permisions 
			   '/^test_dir\/.*/' => array(
				  'read'  => true,
				  'write' => true,
				  'rm'    => true
				)
			),
			// 'debug'        => true,         // send debug to client
			// 'archiveMimes' => array(),      // allowed archive's mimetypes to create. Leave empty for all available types.
			// 'archivers'    => array()       // info about archivers to use. See example below. Leave empty for auto detect
			// 'archivers' => array(
			// 	'create' => array(
			// 		'application/x-gzip' => array(
			// 			'cmd' => 'tar',
			// 			'argc' => '-czf',
			// 			'ext'  => 'tar.gz'
			// 			)
			// 		),
			// 	'extract' => array(
			// 		'application/x-gzip' => array(
			// 			'cmd'  => 'tar',
			// 			'argc' => '-xzf',
			// 			'ext'  => 'tar.gz'
			// 			),
			// 		'application/x-bzip2' => array(
			// 			'cmd'  => 'tar',
			// 			'argc' => '-xjf',
			// 			'ext'  => 'tar.bz'
			// 			)
			// 		)
			// 	)
		)
	)
);

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

