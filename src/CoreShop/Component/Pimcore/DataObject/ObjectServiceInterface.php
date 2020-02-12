<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2020 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Component\Pimcore\DataObject;

use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Folder;

interface ObjectServiceInterface
{
    /**
     * @param string $path
     *
     * @return Folder
     */
    public function createFolderByPath($path): Folder;

    /**
     * Copy all fields from $from to $to.
     *
     * @param Concrete $fromObject
     * @param Concrete $toObject
     *
     * @return Concrete
     */
    public function copyObject(Concrete $fromObject, Concrete $toObject): Concrete;
}
