<?php namespace Zenit\Bundle\Zuul\Interfaces;

interface AuthRepositoryInterface {

	public function authLookup($id):?AuthenticableInterface;
	public function authLoginLookup($login):?AuthenticableInterface;

}