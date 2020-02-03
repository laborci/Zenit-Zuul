<?php namespace Zenit\Bundle\Zuul\Component\Auth\Action;

use Zenit\Bundle\Mission\Component\Web\Responder\JsonResponder;
use Zenit\Bundle\Zuul\Interfaces\AuthServiceInterface;

class Logout extends JsonResponder{

	protected $authService;

	public function __construct(AuthServiceInterface $authService){
		$this->authService = $authService;
	}

	protected function respond(){
		$this->authService->logout();
	}

}