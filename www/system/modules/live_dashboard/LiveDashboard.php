<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package   LiveDashboard
 * @author    pdir / digital agentur - Mathias Arzberger
 * @license   LGPL-3.0+
 * @copyright pdir / digital agentur - Mathias Arzberger 2016
 */

class LiveDashboard extends \Template
{

    /**
     * Import a library and make it accessible by its name or an optional key
     *
     * @param string  $strClass The class name
     * @param string  $strKey   An optional key to store the object under
     * @param boolean $blnForce If true, existing objects will be overridden
     */
    protected function import($strClass, $strKey=null, $blnForce=false)
    {
        $strKey = $strKey ?: $strClass;

        if ($blnForce || !isset($this->arrObjects[$strKey]))
        {
            $this->arrObjects[$strKey] = (in_array('getInstance', get_class_methods($strClass))) ? call_user_func(array($strClass, 'getInstance')) : new $strClass();
        }
    }

    public function ldParseBackendTemplate($strBuffer, $strTemplate)
    {

        if ($strTemplate == 'be_welcome') {

            $objTemplate = new \BackendTemplate('be_live_dashboard');

            // sample default widget
            $strContent = '
                    <div class="events">Text 1 <a href="#">Link 1</a></div>
                    <div class="events">Text 2 <a href="#">Link 2</a></div>
                    <div class="events">Text 3 <a href="#">Link 3</a></div>';

            $objWidgetTemplate = new \BackendTemplate('be_live_widget');
            $objWidgetTemplate->widgetTitle = 'Neuste Kommentare';
            $objWidgetTemplate->widgetContent = $strContent;
            $strWidget = $objWidgetTemplate->parse();

            $arrWidgets = array($strWidget);

            // HOOK: add dashboard widget
            if (isset($GLOBALS['TL_HOOKS']['addDashboardWidget']) && is_array($GLOBALS['TL_HOOKS']['addDashboardWidget']))
            {
                foreach ($GLOBALS['TL_HOOKS']['addDashboardWidget'] as $callback)
                {
                    $this->import($callback[0]);
                    $strBuffer = $this->$callback[0]->$callback[1]($arrWidgets);

                    if ($strBuffer != '')
                    {
                        $arrWidgets[] = $strBuffer;
                    }
                };
            }

            if (!empty($arrWidgets))
            {
                $objTemplate->widgets = implode("\n", $arrWidgets);
            }

            return $objTemplate->parse();
        }
        return $strBuffer;
    }
}