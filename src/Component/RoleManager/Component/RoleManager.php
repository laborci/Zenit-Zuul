<?php namespace Zenit\Bundle\Zuul\Component\RoleManager\Component;

use Zenit\Bundle\Zuul\Component\RoleManager\Config;
use Zenit\Core\ServiceManager\Component\Service;
use Zenit\Core\ServiceManager\Interfaces\SharedService;

class RoleManager implements SharedService{

	use Service;

	/** @var \Zenit\Bundle\Zuul\Component\RoleManager\Component\GroupManager */
	protected $groupManager;

	public function __construct(){$this->groupManager = new GroupManager(Config::Service()->groups); }

	public function resolveGroups($groups){ return $this->groupManager->resolve($groups); }
	public function getGroups(){ return $this->groupManager->getGroups(); }

}