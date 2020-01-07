<?php namespace Zenit\Bundle\Zuul\Component;

use Zenit\Bundle\Zuul\Interfaces\AuthServiceInterface;
use Zenit\Bundle\Zuul\Interfaces\WhoAmIInterface;

class WhoAmI implements WhoAmIInterface{

	private $authService;
	public function __construct(AuthServiceInterface $authService){ $this->authService = $authService; }

	public function checkPermission($permission):bool{ return $this->authService->checkPermission($permission); }
	public function isAuthenticated():bool{ return $this->authService->isAuthenticated(); }
	public function logout(){ return $this->authService->logout(); }
	public function __invoke(): ?int{return $this->authService->getAuthenticatedId(); }

}