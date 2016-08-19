<?php
/**
 * Rubedo -- ECM solution
 * Copyright (c) 2014, WebTales (http://www.webtales.fr/).
 * All rights reserved.
 * licensing@webtales.fr
 *
 * Open Source License
 * ------------------------------------------------------------------------------------------
 * Rubedo is licensed under the terms of the Open Source GPL 3.0 license.
 *
 * @category   Rubedo
 * @package    Rubedo
 * @copyright  Copyright (c) 2012-2014 WebTales (http://www.webtales.fr)
 * @license    http://www.gnu.org/licenses/gpl.html Open Source GPL 3.0 license
 */
namespace Rubedo\Backoffice\Controller;

use Rubedo\Services\Manager;
use WebTales\MongoFilters\Filter;

/**
 * Controller providing CRUD API for the themes JSON
 *
 * Receveive Ajax Calls for read & write from the UI to the Mongo DB
 *
 *
 * @author jbourdin
 * @category Rubedo
 * @package Rubedo
 *
 */
class ThemesController extends DataAccessController
{

    public function __construct()
    {
        parent::__construct();

        // init the data access service
        $this->_dataService = Manager::getService('Themes');
    }

    protected function _buildFilter($filters = null)
    {
        $mongoFilters = parent::_buildFilter($filters);
        $contextExist = Filter::factory('OperatorToValue')
            ->setName('context')
            ->setOperator('$exists')
            ->setValue(false);
        $boContext = Filter::factory('Value')
            ->setName('context')
            ->setValue('back');
        $mongoFilters->addFilter(
            Filter::factory('Or')
                ->addFilter($contextExist)
                ->addFilter($boContext)
        );
        return $mongoFilters;
    }
}