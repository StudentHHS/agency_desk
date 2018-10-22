<?php

namespace App\Security;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{

    use TargetPathTrait;

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var CsrfTokenManagerInterface
     */
    private $csrfTokenManager;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;


    public function __construct(UserRepository $userRepository, RouterInterface $router, CsrfTokenManagerInterface $csrfTokenManager, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userRepository = $userRepository;
        $this->router = $router;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function supports(Request $request)
    {
        return $request->attributes->get('_route') === 'login_page'
            && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
        $formdata = $request->request->get('login_form');

        $credentials = [
            'email' => $formdata['_username'],
            'password' => $formdata['_password'],
//            'token' => $formdata['_token'],
        ];

//        dd($credentials);

        $request->getSession()->set(
          Security::LAST_USERNAME,
          $credentials['email']
        );

        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
//        $token = new CsrfToken('authenticate', $credentials['token']);
//
////        dd($token);
//
//        if(!$this->csrfTokenManager->isTokenValid($token)){
//            throw new InvalidCsrfTokenException();
//        }

        return $this->userRepository->findOneBy(['email' => $credentials['email']]);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->userPasswordEncoder->isPasswordValid($user, $credentials['password']);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        if($targetPath = $this->getTargetPath($request->getSession(), $providerKey)){
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->router->generate('admin_page'));
    }

    protected function getLoginUrl()
    {
        return $this->router->generate('login_page');
    }


}
