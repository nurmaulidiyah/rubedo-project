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
namespace Rubedo\Interfaces\Collection;

/**
 * Interface of service handling Cache Data
 *
 *
 * @author jbourdin
 * @category Rubedo
 * @package Rubedo
 */
interface ICache extends IAbstractCollection
{

    /**
     * Update object or insert if not present base on the CacheId field
     *
     * @param array $obj
     *            inserted data
     * @param string $cacheId
     *            string parameter of the cache entry
     * @return bool
     */
    public function upsertByCacheId($obj, $cacheId);

    /**
     * Remove expired cache items
     *
     * @return boolean
     */
    public function deleteExpired();

    public function deleteByCacheId($id);

    public function findByCacheId($cacheId, $time = null);
}
