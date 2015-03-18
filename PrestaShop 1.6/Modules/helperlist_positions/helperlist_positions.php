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

class HelperList_Positions extends Module
{
	public function __construct()
	{
		// Author of the module
		$this->author = 'PrestaEdit';
		// Name of the module ; the same that the directory and the module ClassName
		$this->name = 'helperlist_positions';
		// Tab where it's the module (administration, front_office_features, ...)
		$this->tab = 'others';
		// Current version of the module
		$this->version = '1.0.0';

		//	Min version of PrestaShop wich the module can be install
		$this->ps_versions_compliancy['min'] = '1.6.1.0'; // En fait, la version qui prendra en charge ce PR: https://github.com/PrestaShop/PrestaShop/pull/2686

		parent::__construct();

		// Permet de prendre le style "bootstrap" de la version 1.6 de PrestaShop
		$this->bootstrap = true;

		// Name in the modules list
		$this->displayName = $this->l('HelperList_Positions (Example)');
		// A little description of the module
		$this->description = $this->l('HelperList with Positions Example');
	}

	public function getContent()
	{
		if (Tools::isSubmit('updatePositions'))
			$this->updatePositionsDnd();

		$helper = new HelperList();

		// Obligatoire
		$helper->shopLinkType = '';


		// Obligatoire. Correspondant souvent à id_*
		$helper->identifier = 'id_example_data';

		// Permet de ne pas afficher le header complet.
		$helper->simple_header = true;

		//
		$helper->module = $this;

		// Important.
		$helper->token = Tools::getAdminTokenLite('AdminModules');

		// Permet de définir le champ sur lequel est associé les positions.
		$helper->position_identifier = 'position';

		// Si utilisation des positions, obligatoire.
		$helper->orderBy = 'position';
		$helper->orderWay = 'ASC';

		// Permet de définir l'ID de la table. Le terme "module-" en préfixe est TRES important.
		$helper->table_id = 'module-helperlist_positions';
		// Ou encore
		$helper->table_id = 'module-'.$this->name;

		// Permet de récupérer les champs/headers de la liste. On passe par une méthode, par lisitibilité du code.
		$fields_list = $this->getListHeader();
		// Permet de récupérer les enregistrements/lignes de la liste. On passe par une méthode, par lisibilité du code.
		$values = $this->getListValues();

		return $helper->generateList($values, $fields_list);
	}

	private function getListHeader()
	{
		$fields_list = array();

		$fields_list['id_example_data'] = array(
			'title' => $this->l('ID')
		);

		$fields_list['lorem'] = array(
			'title' => $this->l('Lorem')
		);

		$fields_list['position'] = array(
			'title' => $this->l('Position'),
			'position' => 'true' // Permet de définir le fait que le champ est lié aux positions (et avoir le Drag & Drop)
		);

		return $fields_list;
	}

	private function getListValues()
	{
		$values = array();

		$values[] = array('id_example_data' => 1, 'lorem' => 'Ipsum 01', 'position' => 1);
		$values[] = array('id_example_data' => 2, 'lorem' => 'Ipsum 02', 'position' => 2);
		$values[] = array('id_example_data' => 3, 'lorem' => 'Ipsum 03', 'position' => 3);

		return $values;
	}

	private function updatePositionsDnd()
	{
		$positions = Tools::getValue('module-helperlist_positions');

		ddd($positions);
	}
}