<?php namespace Zenit\Bundle\Zuul\Component\Auth\Action;

use Zenit\Bundle\Mission\Module\Web\Responder\JsonResponder;
use Zenit\Bundle\Zuul\Interfaces\AuthServiceInterface;

class Login extends JsonResponder{

	protected $authService;

	public function __construct(AuthServiceInterface $authService){
		$this->authService = $authService;
	}

	protected function respond(){
		if (!$this->authService->login($this->getRequestBag()->get('login'), $this->getRequestBag()->get('password'), 'admin')){
			$this->getResponse()->setStatusCode('401');
		}
	}

}