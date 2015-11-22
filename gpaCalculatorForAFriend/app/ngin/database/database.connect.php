<?php
/**
* Database Connection
* @author Nickson Ariemba
*/

class DatabaseConnect
{
	# @object, The PDO object
	public $pdo;

	# @array,  The database connect
	public $connect;

	# @bool ,  Connected to the database
	public $bConnected = false;


	protected function connect()
	{
		$this->connect = [
			'host'=>"localhost", 
			'user'=>"root", 
			'password'=>"root", 
			'dbname'=>"nicksonshoes"
		];

		$dsn = 'mysql:dbname='.$this->connect["dbname"].';host='.$this->connect["host"].'';
		try 
		{
			$this->pdo = new PDO($dsn, $this->connect["user"], $this->connect["password"], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			
			# We can now log any exceptions on Fatal error. 
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			# Disable emulation of prepared statements, use REAL prepared statements instead.
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			
			# Connection succeeded, set the boolean to true.
			$this->bConnected = true;
		}
		catch (PDOException $e) 
		{
			# Write into log
			echo $this->ExceptionLog($e->getMessage());
			die();
		}
	}
}
?>