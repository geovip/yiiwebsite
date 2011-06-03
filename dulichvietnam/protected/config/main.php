<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'TourVN',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.yiidebugtb.*', //our extension
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'services',
        'admin',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'dulichvn',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    //'defaultController'=>'album/listalbum',
    // application components
    'components' => array(
        'clientScript'=>array(
            'class'=>'application.extensions.CClientScriptMinify',
            'minifyController'=>'/minify',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        
          'urlManager'=>array(
              'urlFormat'=>'path',
              //'urlSuffix' => '.html',
              'showScriptName'=>false,
              'rules'=>array(
              '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
              'minify/<group:[^\/]+>'=>'minify/index',
              ),
          ),
        
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
         */
        // uncomment the following to use a MySQL database

        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=dulichvietnam',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_'
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning, trace',
                ),
                array(// configuration for the toolbar
                    'class' => 'XWebDebugRouter',
                    'config' => 'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
                    'levels' => 'error, warning, trace, profile, info',
                    'allowedIPs' => array('127.0.0.1', '::1', '192.168.1.54', '192\.168\.1[0-5]\.[0-9]{3}'),
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'a12pct@gmail.com',
        'photoPerPage' => 6,
        'albumPerPage' => 6
    ),
);