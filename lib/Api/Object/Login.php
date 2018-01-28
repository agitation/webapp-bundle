<?php
declare(strict_types=1);
/*
 * @package    agitation/webapp-bundle
 * @link       http://github.com/agitation/webapp-bundle
 * @author     Alexander Günsche
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\WebappBundle\Api\Object;

use Agit\ApiBundle\Annotation\Object\Object;
use Agit\ApiBundle\Annotation\Property;
use Agit\ApiBundle\Api\Object\AbstractRequestObject;

/**
 * @Object(namespace="webapp.v1")
 *
 * Login credentials.
 */
class Login extends AbstractRequestObject
{
    /**
     * @Property\Name("E-mail")
     * @Property\StringType
     *
     * The user’s name (i.e. e-mail address)
     */
    public $email;

    /**
     * @Property\Name("Password")
     * @Property\StringType
     *
     * The password
     */
    public $password;
}
