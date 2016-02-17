<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   liveDashboard
 * @author    pdir / digital agentur - Mathias Arzberger
 * @license   LGPL-3.0+
 * @copyright pdir / digital agentur - Mathias Arzberger 2016
 */

// Version
define('LIVE_DASHBOARD', '0.0.1alpha');

/**
 * HOOKS
 */
$GLOBALS['TL_HOOKS']['parseBackendTemplate'][] = array('LiveDashboard', 'ldParseBackendTemplate');

/**
 * JS & CSS
 */
if(TL_MODE == 'BE')
{
    $strSessionTimeout = \Contao\Config::get('sessionTimeout');
    $GLOBALS['TL_MOOTOOLS'][] = '<script>var ldSessionTimeout = '.$strSessionTimeout.';</script>'.
        '<div id="ldScreen">Achtung: Ihre Session ist abgelaufen.<br><br>
            SessionTime s(sec): <span class="session-time">'.$strSessionTimeout.'</span><br><br>
            TimeLeft: <span class="time-left">-</span><br><br>
            <button onclick="document.getElementById(\'ldCover\').style.display = \'\';document.getElementById(\'ldScreen\').style.display = \'\';">Schließen</button>
        </div>
        <div id="ldCover"></div>';
    $GLOBALS['TL_CSS'][] = 'system/modules/live_dashboard/assets/css/app.css';
    $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/live_dashboard/assets/js/app.js';
}