<?php namespace Zenit\Bundle\Zuul\Component\Auth\Action;

use Zenit\Bundle\Mission\Component\Web\Responder\JsonResponder;
use Zenit\Bundle\Zuul\Interfaces\AuthServiceInterface;

class Login extends JsonResponder{

	protected $authService;

	public function __construct(AuthServiceInterface $authService){
		$this->authService = $authService;
	}

	protected function respond($role = null){
		if (!$this->authService->login($this->getRequestBag()->get('login'), $this->getRequestBag()->get('password'), $role)){
			$this->getResponse()->setStatusCode('401');
		}
	}

}