<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'LiveDashboard' => 'system/modules/live_dashboard/LiveDashboard.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_live_dashboard' => 'system/modules/live_dashboard/templates',
	'be_live_widget' 	=> 'system/modules/live_dashboard/templates',
));
