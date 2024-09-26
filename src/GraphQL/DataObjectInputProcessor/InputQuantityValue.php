<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\DataHubBundle\GraphQL\DataObjectInputProcessor;

use GraphQL\Type\Definition\ResolveInfo;
use Pimcore\Bundle\DataHubBundle\GraphQL\Service;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Fieldcollection\Data\AbstractData;

class InputQuantityValue extends Base
{
    /**
     * @param Concrete|AbstractData $object
     * @param array $newValue
     * @param array $args
     * @param array $context
     *
     * @throws \Exception
     */
    public function process($object, $newValue, $args, $context, ResolveInfo $info)
    {
        $attribute = $this->getAttribute();
        Service::setValue($object, $attribute, function ($container, $setter) use ($newValue) {
            if ($newValue) {
                $unit = null;
                if (isset($newValue['unitId'])) {
                    $unit = \Pimcore\Model\DataObject\QuantityValue\Unit::getById($newValue['unitId']);
                } elseif (isset($newValue['unit'])) {
                    $unit = \Pimcore\Model\DataObject\QuantityValue\Unit::getByAbbreviation($newValue['unit']);
                }
                $inputQuantityValue = new \Pimcore\Model\DataObject\Data\InputQuantityValue($newValue['value'], $unit);

                return $container->$setter($inputQuantityValue);
            }

            return null;
        });
    }
}