<?php
/**
 * Class that operate on table 'retiros'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class RetirosMySqlDAO implements RetirosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RetirosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM retiros WHERE idretiros = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM retiros';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM retiros ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param retiro primary key
 	 */
	public function delete($idretiros){
		$sql = 'DELETE FROM retiros WHERE idretiros = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idretiros);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RetirosMySql retiro
 	 */
	public function insert($retiro){
		$sql = 'INSERT INTO retiros (nombre, descripcion, fecha_inicio, fecha_final) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($retiro->nombre);
		$sqlQuery->set($retiro->descripcion);
		$sqlQuery->set($retiro->fechaInicio);
		$sqlQuery->set($retiro->fechaFinal);

		$id = $this->executeInsert($sqlQuery);	
		$retiro->idretiros = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RetirosMySql retiro
 	 */
	public function update($retiro){
		$sql = 'UPDATE retiros SET nombre = ?, descripcion = ?, fecha_inicio = ?, fecha_final = ? WHERE idretiros = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($retiro->nombre);
		$sqlQuery->set($retiro->descripcion);
		$sqlQuery->set($retiro->fechaInicio);
		$sqlQuery->set($retiro->fechaFinal);

		$sqlQuery->setNumber($retiro->idretiros);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM retiros';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM retiros WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM retiros WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaInicio($value){
		$sql = 'SELECT * FROM retiros WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaFinal($value){
		$sql = 'SELECT * FROM retiros WHERE fecha_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM retiros WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM retiros WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaInicio($value){
		$sql = 'DELETE FROM retiros WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaFinal($value){
		$sql = 'DELETE FROM retiros WHERE fecha_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RetirosMySql 
	 */
	protected function readRow($row){
		$retiro = new Retiro();
		
		$retiro->idretiros = $row['idretiros'];
		$retiro->nombre = $row['nombre'];
		$retiro->descripcion = $row['descripcion'];
		$retiro->fechaInicio = $row['fecha_inicio'];
		$retiro->fechaFinal = $row['fecha_final'];

		return $retiro;
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
	 * @return RetirosMySql 
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