<?php

/**
 * AppserverIo\DnsServer\StorageProvider\AbstractStorageProvider
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/dnsserver
 * @link      http://www.appserver.io/
 */

namespace AppserverIo\DnsServer\StorageProvider;

/**
 * Class CoreModule
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/dnsserver
 * @link      http://www.appserver.io/
 */
class StackableResolver
{

    /**
     * @var array
     */
    protected $resolvers;

    public function __construct(array $resolvers = array())
    {
        $this->resolvers = $resolvers;
    }

    public function getAnswer($question)
    {
        foreach ($this->resolvers as $resolver) {
            $answer = $resolver->getAnswer($question);
            if ($answer) {
                return $answer;
            }
        }

        return array();
    }

}
