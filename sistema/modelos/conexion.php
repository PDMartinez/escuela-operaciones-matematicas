<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=escuela", "root", "");
		// $link = new PDO("mysql:host=localhost;dbname=compumar_escuela", "compumar_escuela", "compumar_escuela123");

		$link->exec("set names utf8");

		return $link;

	}


}