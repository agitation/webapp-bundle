<?php
declare(strict_types=1);

/*
 * @package    agitation/webapp-bundle
 * @link       http://github.com/agitation/webapp-bundle
 * @author     Alexander Günsche
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\WebappBundle\Api\Controller;

use Agit\ApiBundle\Annotation\Controller\Controller;
use Agit\ApiBundle\Annotation\Depends;
use Agit\ApiBundle\Annotation\Endpoint;
use Agit\ApiBundle\Api\Controller\AbstractController;
use Agit\ApiBundle\Api\Object\RequestObjectInterface;
use Agit\ApiBundle\Exception\BadRequestException;
use Agit\UserBundle\Exception\UnauthorizedException;
use Agit\UserBundle\Service\UserService;

/**
 * @Controller(namespace="app.v1")
 * @Depends({"@agit.user"})
 */
class Session extends AbstractController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @Endpoint\Endpoint(request="Login",response="null")
     * @Endpoint\Security(capability="")
     *
     * Authenticate to the server and start a session.
     */
    public function login(RequestObjectInterface $requestObject)
    {
        try
        {
            $this->userService->login(
                $requestObject->get('email'),
                $requestObject->get('password')
            );
        }
        catch (UnauthorizedException $e)
        {
            throw new BadRequestException($e->getMessage());
        }
    }

    /**
     * @Endpoint\Endpoint(request="null",response="null")
     * @Endpoint\Security(capability="")
     *
     * Terminate an authenticated session.
     */
    public function logout()
    {
        $this->userService->logout();
    }
}
