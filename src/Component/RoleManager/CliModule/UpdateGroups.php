<?php namespace Zenit\Bundle\Zuul\Component\RoleManager\CliModule;

use Zenit\Bundle\Zuul\Component\RoleManager\Component\RoleManager;
use Zenit\Bundle\Zuul\Component\RoleManager\Config;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zenit\Bundle\Mission\Component\Cli\CliModule;

class UpdateGroups extends CliModule{
	protected function configure(){
		$this->setName('update-groups');
		$this->setAliases(['ug']);
	}

	protected function execute(InputInterface $input, OutputInterface $output){
		$config = Config::Service();
		$roleManager = RoleManager::Service();

		/** @var \Zenit\Bundle\Ghost\Entity\Component\Model $model */
		$model = ($config->userGhost)::$model;

		/** @var \Zenit\Bundle\DBAccess\Interfaces\PDOConnectionInterface $connection */
		$connection = ($config->userGhost)::$model->connection;
		$table = ($config->userGhost)::Table;
		$field = $config->userGroupField;
		$connection->query("ALTER TABLE `".$table."` CHANGE `".$field."` `".$field."` SET('".join("','",$roleManager->getGroups() )."') NULL  DEFAULT NULL;");

	}
}