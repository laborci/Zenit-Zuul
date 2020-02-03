<?php namespace Zenit\Bundle\Zuul\Component\Auth\Middleware;

use Zenit\Bundle\Mission\Component\Web\Pipeline\Middleware;
use Zenit\Bundle\Zuul\Interfaces\AuthServiceInterface;

class AuthCheck extends Middleware {

	protected $authService;

	public function __construct(AuthServiceInterface $authService) {
		$this->authService = $authService;
	}

	protected function run() {
		$responder = $this->getArgumentsBag()->get('responder');
		if (!$this->authService->isAuthenticated()){
			$this->authService->logout();
			$this->break($responder);
		} else {
			$this->next();
		}
	}

	static public function config($responder){
		return ['responder'=>$responder];
	}


}
