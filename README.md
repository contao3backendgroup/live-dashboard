Live Dashboard
======================

EARLY Preview

About
-----

Live Dashboard provides a administrative dashboard for users in the backend.
Live Dashboard comes with different widgets you can activate per user or user group.
A hook allow other modules to add custom widgets to the dashboard.

Other features
-------------------
* Session expire info in backend (home screen and overlay)

System requirements
-------------------

* [Contao](https://github.com/contao/core) 3.5.x or higher


Installation & Configuration
----------------------------

* Extract the archive on your server
* Update your database
* Activate widgets per user or user group

Dashboard Hook
----------------------------
```php
// in config.php
$GLOBALS['TL_HOOKS']['addDashboardWidget'][] 	= array('MyClass', 'hookAddDashboardWidget');

// in MyClass.php
class MyClass.php
{
 /*
  * @return void Es wird kein return-Wert erwartet
  */
  public function hookAddDashboardWidget($arrWidgets)
  {
 		$objWidgetTemplate = new \BackendTemplate('be_live_widget');
    $objWidgetTemplate->widgetTitle = ''; // add widget title
    $objWidgetTemplate->widgetContent = ''; // add widget content
    $strWidget = $objWidgetTemplate->parse();
		return $strWidget;
  }
}
```

License
---------------
LGPL-3.0+


ToDo
---------------
* add configuration in backend
* add array support to manipulate other widgets and order


Support & Bugs
---------------
If you run into issues with the module, please open a new issue on https://github.com/contao3backendgroup/live-dashbord/issues
