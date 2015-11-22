<?php
/**
* Database engine
*/

use Database\Log;

$path = realpath(dirname());
require($path."/database.connect.php");
require($path."/database.log.php");
class DatabaseEngine extends DatabaseConnect
{
	# @object, Object for logging exceptions	
	public $log;

	# @array, The parameters of the SQL query
	public $parameters;

	# @object, PDO statement object
	public $sQuery;

	public function __construct()
	{
		$this->log = new Log();
		$this->parameters = array();
		self::connect();	
	}


	/*
	*   You can use this little method if you want to close the PDO connection
	*
	*/
 	public function CloseConnection()
 	{
 		# Set the PDO object to null to close the connection
 		# http://www.php.net/manual/en/pdo.connections.php
 		$this->pdo = null;
 	}


    /**
	*   If the SQL query  contains a SELECT or SHOW statement it returns an array containing all of the result set row
	*	If the SQL statement is a DELETE, INSERT, or UPDATE statement it returns the number of affected rows
	*
	*   @param  string $query
	*	@param  array  $params
	*	@param  int    $fetchmode
	*	@return mixed
	*/			
	public function query($query,$params = null, $fetchmode = PDO::FETCH_ASSOC)
	{
		$query = trim($query);
		//print_r($query);

		$this->Init($query,$params);

		$rawStatement = explode(" ", $query);
		
		# Which SQL statement is used 
		$statement = strtolower($rawStatement[0]);
		
		if ($statement === 'select' || $statement === 'show') {
			return $this->sQuery->fetchAll($fetchmode);
		}
		elseif ( $statement === 'insert' ||  $statement === 'update' || $statement === 'delete' ) {
			return $this->sQuery->rowCount();	
		}	
		else {
			return NULL;
		}
	}
		
       
    /**
	*	Every method which needs to execute a SQL query uses this method.
	*	
	*	1. If not connected, connect to the database.
	*	2. Prepare Query.
	*	3. Parameterize Query.
	*	4. Execute Query.	
	*	5. On exception : Write Exception into the log + SQL query.
	*	6. Reset the Parameters.
	*/	
	protected function Init($query,$parameters = "")
	{
		# Connect to database
		if(!$this->bConnected) {
			self::connect();
		}

		try {
			# Prepare query
			$this->sQuery = $this->pdo->prepare($query);
			
			# Add parameters to the parameter array	
			$this->bindMore($parameters);

			# Bind parameters
			if(!empty($this->parameters)) {
				foreach($this->parameters as $param)
				{
					$parameters = explode("\x7F",$param);
					$this->sQuery->bindParam($parameters[0],$parameters[1]);
				}		
			}
			
			# Execute SQL 
			$this->succes 	= $this->sQuery->execute();		
		}
		catch(PDOException $e)
		{
			# Write into log and display Exception
			echo $this->ExceptionLog($e->getMessage(), $query );
			die();
		}

		# Reset the parameters
		$this->parameters = array();
	}
		
    
    /**
	*	@void 
	*
	*	Add the parameter to the parameter array
	*	@param string $para  
	*	@param string $value 
	*/	
	public function bind($para, $value)
	{	
		$this->parameters[sizeof($this->parameters)] = ":" . $para . "\x7F" . utf8_encode($value);
	}


    /**
	*	@void
	*	
	*	Add more parameters to the parameter array
	*	@param array $parray
	*/	
	public function bindMore($parray)
	{
		if(empty($this->parameters) && is_array($parray)) {
			$columns = array_keys($parray);
			foreach($columns as $i => &$column)	{
				$this->bind($column, $parray[$column]);
			}
		}
	}


    /**	
	* Writes the log and returns the exception
	*
	* @param  string $message
	* @param  string $sql
	* @return string
	*/
	private function ExceptionLog($message , $sql = "")
	{
		$exception  = 'Unhandled Exception. <br />';
		$exception .= $message;
		$exception .= "<br /> You can find the error back in the log.";

		if(!empty($sql)) {
			# Add the Raw SQL to the Log
			$message .= "\r\nRaw SQL : "  . $sql;
		}

		# Write into log
		$this->log->write($message);
		return $exception;
	}	
}
?>