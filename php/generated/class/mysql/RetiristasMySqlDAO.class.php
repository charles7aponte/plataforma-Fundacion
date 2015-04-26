<?php
/**
 * Class that operate on table 'retiristas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class RetiristasMySqlDAO implements RetiristasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RetiristasMySql 
	 */
	public function load($idasistenteRetiros, $organizacionIdorganizacion){
		$sql = 'SELECT * FROM retiristas WHERE idasistente_retiros = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idasistenteRetiros);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM retiristas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM retiristas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param retirista primary key
 	 */
	public function delete($idasistenteRetiros, $organizacionIdorganizacion){
		$sql = 'DELETE FROM retiristas WHERE idasistente_retiros = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idasistenteRetiros);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RetiristasMySql retirista
 	 */
	public function insert($retirista){
		$sql = 'INSERT INTO retiristas (nombres, apellidos, edad, ciudad, telefono, cc, email, idasistente_retiros, organizacion_idorganizacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($retirista->nombres);
		$sqlQuery->set($retirista->apellidos);
		$sqlQuery->set($retirista->edad);
		$sqlQuery->set($retirista->ciudad);
		$sqlQuery->set($retirista->telefono);
		$sqlQuery->set($retirista->cc);
		$sqlQuery->set($retirista->email);

		
		$sqlQuery->setNumber($retirista->idasistenteRetiros);

		$sqlQuery->setNumber($retirista->organizacionIdorganizacion);

		$this->executeInsert($sqlQuery);	
		//$retirista->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RetiristasMySql retirista
 	 */
	public function update($retirista){
		$sql = 'UPDATE retiristas SET nombres = ?, apellidos = ?, edad = ?, ciudad = ?, telefono = ?, cc = ?, email = ? WHERE idasistente_retiros = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($retirista->nombres);
		$sqlQuery->set($retirista->apellidos);
		$sqlQuery->set($retirista->edad);
		$sqlQuery->set($retirista->ciudad);
		$sqlQuery->set($retirista->telefono);
		$sqlQuery->set($retirista->cc);
		$sqlQuery->set($retirista->email);

		
		$sqlQuery->setNumber($retirista->idasistenteRetiros);

		$sqlQuery->setNumber($retirista->organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM retiristas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombres($value){
		$sql = 'SELECT * FROM retiristas WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidos($value){
		$sql = 'SELECT * FROM retiristas WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEdad($value){
		$sql = 'SELECT * FROM retiristas WHERE edad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCiudad($value){
		$sql = 'SELECT * FROM retiristas WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM retiristas WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCc($value){
		$sql = 'SELECT * FROM retiristas WHERE cc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM retiristas WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombres($value){
		$sql = 'DELETE FROM retiristas WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidos($value){
		$sql = 'DELETE FROM retiristas WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEdad($value){
		$sql = 'DELETE FROM retiristas WHERE edad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCiudad($value){
		$sql = 'DELETE FROM retiristas WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM retiristas WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCc($value){
		$sql = 'DELETE FROM retiristas WHERE cc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM retiristas WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RetiristasMySql 
	 */
	protected function readRow($row){
		$retirista = new Retirista();
		
		$retirista->idasistenteRetiros = $row['idasistente_retiros'];
		$retirista->nombres = $row['nombres'];
		$retirista->apellidos = $row['apellidos'];
		$retirista->edad = $row['edad'];
		$retirista->ciudad = $row['ciudad'];
		$retirista->telefono = $row['telefono'];
		$retirista->cc = $row['cc'];
		$retirista->email = $row['email'];
		$retirista->organizacionIdorganizacion = $row['organizacion_idorganizacion'];

		return $retirista;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return RetiristasMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>