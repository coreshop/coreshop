<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Bundle\OrderBundle\Factory;

use CoreShop\Bundle\OrderBundle\DTO\AddMultipleToCartInterface;
use CoreShop\Bundle\OrderBundle\DTO\AddToCartInterface;
use CoreShop\Component\Order\Model\CartInterface;
use CoreShop\Component\Order\Model\CartItemInterface;

interface AddMultipleToCartFactoryInterface
{
    /**
     * @param AddToCartInterface[] $addToCarts
     *
     * @return AddMultipleToCartInterface
     */
    public function createWithMultipleAddToCarts(array $addToCarts);
}
