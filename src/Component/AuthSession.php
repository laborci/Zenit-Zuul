<?php namespace Zenit\Bundle\Zuul\Component;

use Zenit\Bundle\Session\Component\Session;
use Zenit\Bundle\Zuul\Interfaces\AuthSessionInterface;

class AuthSession extends Session implements AuthSessionInterface {

	public $userId;
	public function setUserId($userId) {$this->userId = $userId; $this->flush(); }
	public function getUserId() { return $this->userId; }

}