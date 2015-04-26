<?php
/**
 * Class that operate on table 'asistente'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class AsistenteMySqlDAO implements AsistenteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AsistenteMySql 
	 */
	public function load($idasistente, $organizacionIdorganizacion){
		$sql = 'SELECT * FROM asistente WHERE idasistente = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idasistente);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM asistente';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM asistente ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param asistente primary key
 	 */
	public function delete($idasistente, $organizacionIdorganizacion){
		$sql = 'DELETE FROM asistente WHERE idasistente = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idasistente);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AsistenteMySql asistente
 	 */
	public function insert($asistente){
		$sql = 'INSERT INTO asistente (nombres, apellidos, edad, ciudad, email, idasistente, organizacion_idorganizacion) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($asistente->nombres);
		$sqlQuery->set($asistente->apellidos);
		$sqlQuery->set($asistente->edad);
		$sqlQuery->set($asistente->ciudad);
		$sqlQuery->set($asistente->email);

		
		$sqlQuery->setNumber($asistente->idasistente);

		$sqlQuery->setNumber($asistente->organizacionIdorganizacion);

		$this->executeInsert($sqlQuery);	
		//$asistente->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AsistenteMySql asistente
 	 */
	public function update($asistente){
		$sql = 'UPDATE asistente SET nombres = ?, apellidos = ?, edad = ?, ciudad = ?, email = ? WHERE idasistente = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($asistente->nombres);
		$sqlQuery->set($asistente->apellidos);
		$sqlQuery->set($asistente->edad);
		$sqlQuery->set($asistente->ciudad);
		$sqlQuery->set($asistente->email);

		
		$sqlQuery->setNumber($asistente->idasistente);

		$sqlQuery->setNumber($asistente->organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM asistente';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombres($value){
		$sql = 'SELECT * FROM asistente WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidos($value){
		$sql = 'SELECT * FROM asistente WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEdad($value){
		$sql = 'SELECT * FROM asistente WHERE edad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCiudad($value){
		$sql = 'SELECT * FROM asistente WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM asistente WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombres($value){
		$sql = 'DELETE FROM asistente WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidos($value){
		$sql = 'DELETE FROM asistente WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEdad($value){
		$sql = 'DELETE FROM asistente WHERE edad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCiudad($value){
		$sql = 'DELETE FROM asistente WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM asistente WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AsistenteMySql 
	 */
	protected function readRow($row){
		$asistente = new Asistente();
		
		$asistente->idasistente = $row['idasistente'];
		$asistente->nombres = $row['nombres'];
		$asistente->apellidos = $row['apellidos'];
		$asistente->edad = $row['edad'];
		$asistente->ciudad = $row['ciudad'];
		$asistente->email = $row['email'];
		$asistente->organizacionIdorganizacion = $row['organizacion_idorganizacion'];

		return $asistente;
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
	 * @return AsistenteMySql 
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