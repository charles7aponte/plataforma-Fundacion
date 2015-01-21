<?php
/**
 * Class that operate on table 'organizacion'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-01-21 03:18
 */
class OrganizacionMySqlDAO implements OrganizacionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OrganizacionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM organizacion WHERE idorganizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM organizacion';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM organizacion ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param organizacion primary key
 	 */
	public function delete($idorganizacion){
		$sql = 'DELETE FROM organizacion WHERE idorganizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idorganizacion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OrganizacionMySql organizacion
 	 */
	public function insert($organizacion){
		$sql = 'INSERT INTO organizacion (nombre, descripcion) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($organizacion->nombre);
		$sqlQuery->set($organizacion->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$organizacion->idorganizacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OrganizacionMySql organizacion
 	 */
	public function update($organizacion){
		$sql = 'UPDATE organizacion SET nombre = ?, descripcion = ? WHERE idorganizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($organizacion->nombre);
		$sqlQuery->set($organizacion->descripcion);

		$sqlQuery->setNumber($organizacion->idorganizacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM organizacion';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM organizacion WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM organizacion WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM organizacion WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM organizacion WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OrganizacionMySql 
	 */
	protected function readRow($row){
		$organizacion = new Organizacion();
		
		$organizacion->idorganizacion = $row['idorganizacion'];
		$organizacion->nombre = $row['nombre'];
		$organizacion->descripcion = $row['descripcion'];

		return $organizacion;
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
	 * @return OrganizacionMySql 
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