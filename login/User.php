<?php

class User {

	// he prefers composition over inheritance
	// he also likes interfaces
  // private is too restrictive most of the time
  // protected or public works better for most of the time
  protected $username;
  protected $password;
  protected $permission;

  public function __construct($username, $password) {
    $this->username = $username;
		$this->password = $password;
		$this->permission = array();
	}

	public function save_user ($username, $password) {
		$file = 'users.txt';
	}
}
