<?php

declare(strict_types=1);

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

namespace Pimcore\Bundle\DataHubBundle\GraphQL\Query\Operator\Factory;

use Pimcore\Bundle\DataHubBundle\GraphQL\Query\Operator\OperatorInterface;

interface OperatorFactoryInterface
{
    /**
     * @param array|null $context
     *
     */
    public function build(array $configElement, $context = null): OperatorInterface;
}
