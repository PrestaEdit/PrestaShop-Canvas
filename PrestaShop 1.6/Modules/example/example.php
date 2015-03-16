<?php
/**
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2015 PrestaShop SA
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class Example extends Module
{

	public function __construct()
	{
		// Author of the module
		$this->author = 'PrestaEdit';
		// Name of the module ; the same that the directory and the module ClassName
		$this->name = 'example';
		// Tab where it's the module (administration, front_office_features, ...)
		$this->tab = 'others';
		// Current version of the module
		$this->version = '1.0.0';

		//	Min version of PrestaShop wich the module can be install
		$this->ps_versions_compliancy['min'] = '1.6';
		// Max version of PrestaShop wich the module can be install
		$this->ps_versions_compliancy['max'] = PS_VERSION;
		// OR $this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.6');

		//	The need_instance flag indicates whether to load the module's class when displaying the "Modules" page
		//	in the back-office. If set at 0, the module will not be loaded, and therefore will spend less resources
		//	to generate the page module. If your modules needs to display a warning message in the "Modules" page,
		//	then you must set this attribute to 1.
		$this->need_instance = 0;

		// Modules needed for install
		$this->dependencies = array();
		// e.g. $this->dependencies = array('blockcart', 'blockcms');

		// Limited country
		$this->limited_countries = array();
		// e.g. $this->limited_countries = array('fr', 'us');

		parent::__construct();

		// Name in the modules list
		$this->displayName = $this->l('Example');
		// A little description of the module
		$this->description = $this->l('Module Example');

		// Message show when you wan to delete the module
		$this->confirmUninstall = $this->l('Are you sure you want to delete this module ?');

		if ($this->active && Configuration::get('EXAMPLE_CONF') == '')
			$this->warning = $this->l('You have to configure your module');
	}
}