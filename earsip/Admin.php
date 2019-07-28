<?php
class Admin{
	private $nama;
	private $username;
	private $password;
	private $session;

	public function setNama($nama){
		$this->nama = $nama;
	}

	public function getNama(){
		return $this->nama;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setPassword($pass){
		$this->password = $pass;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setSession($session){
		$this->session = $session;
	}

	public function getSession(){
		return $this->session;
	}

	public function login(){

	}

	public function logout(){

	}

	public function upload(){

	}

	public function cari(){

	}

	public function baca(){

	}

	public function download(){

	}


}



?>