<?php namespace Zenit\Bundle\Zuul;

use Zenit\Bundle\Zuul\Interfaces\AuthenticableInterface;
use Zenit\Bundle\Zuul\Interfaces\AuthRepositoryInterface;
use Zenit\Bundle\Zuul\Interfaces\AuthServiceInterface;
use Zenit\Bundle\Zuul\Interfaces\AuthSessionInterface;
use Zenit\Bundle\Zuul\Interfaces\WhoAmIInterface;
use Zenit\Core\Module\Interfaces\ModuleInterface;
use Zenit\Core\ServiceManager\Component\ServiceContainer;

class Module implements ModuleInterface{

	public function load($moduleConfig){
		ServiceContainer::shared(AuthServiceInterface::class)->service(AuthService::class);
		ServiceContainer::shared(AuthSessionInterface::class)->service(AuthSession::class);
		ServiceContainer::shared(WhoAmIInterface::class)->service(WhoAmI::class);

		ServiceContainer::shared(AuthenticableInterface::class)->service($moduleConfig['services']['Authenticable']);
		ServiceContainer::shared(AuthRepositoryInterface::class)->service($moduleConfig['services']['AuthRepository']);
	}


}


