<?php namespace Zenit\Bundle\Zuul\Component\RoleManager;

use Zenit\Core\Env\Component\ConfigReader;

class Config extends ConfigReader{
	public $groups = 'bundle.role-manager.groups';
	public $userGhost = 'bundle.role-manager.user-ghost';
	public $userGroupField = 'bundle.role-manager.user-group-field';
}