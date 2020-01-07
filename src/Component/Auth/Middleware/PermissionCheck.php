<?php namespace Zenit\Bundle\Zuul\Component\Auth\Middleware;

use Zenit\Bundle\Mission\Module\Web\Pipeline\Middleware;
use Zenit\Bundle\Zuul\Interfaces\AuthServiceInterface;

class PermissionCheck extends Middleware {

	protected $authService;

	public function __construct(AuthServiceInterface $authService) {
		$this->authService = $authService;
	}

	protected function run() {

		$responder = $this->getArgumentsBag()->get('responder');
		$permission = $this->getArgumentsBag()->get('permission');
		$logoutOnFail = $this->getArgumentsBag()->get('logout-on-fail');

		if (!$this->authService->checkPermission($permission)) {
			if($logoutOnFail) $this->authService->logout();
			$this->break($responder);
		} else {
			$this->next();
		}
	}

	static public function config($responder, $permission, $logoutOnFail){
		return[
			'responder' => $responder,
			'permission'=>$permission,
			'logout-on-fail'=>$logoutOnFail
		];
	}

}
