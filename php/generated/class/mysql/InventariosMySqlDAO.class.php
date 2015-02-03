<?php
/**
 * Class that operate on table 'inventarios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-02-03 03:54
 */
class InventariosMySqlDAO implements InventariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return InventariosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM inventarios WHERE idinventarios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM inventarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM inventarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param inventario primary key
 	 */
	public function delete($idinventarios){
		$sql = 'DELETE FROM inventarios WHERE idinventarios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idinventarios);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InventariosMySql inventario
 	 */
	public function insert($inventario){
		$sql = 'INSERT INTO inventarios (fecha_entrada, fecha_salida, idelementos) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($inventario->fechaEntrada);
		$sqlQuery->set($inventario->fechaSalida);
		$sqlQuery->setNumber($inventario->idelementos);

		$id = $this->executeInsert($sqlQuery);	
		$inventario->idinventarios = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param InventariosMySql inventario
 	 */
	public function update($inventario){
		$sql = 'UPDATE inventarios SET fecha_entrada = ?, fecha_salida = ?, idelementos = ? WHERE idinventarios = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($inventario->fechaEntrada);
		$sqlQuery->set($inventario->fechaSalida);
		$sqlQuery->setNumber($inventario->idelementos);

		$sqlQuery->setNumber($inventario->idinventarios);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM inventarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFechaEntrada($value){
		$sql = 'SELECT * FROM inventarios WHERE fecha_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaSalida($value){
		$sql = 'SELECT * FROM inventarios WHERE fecha_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdelementos($value){
		$sql = 'SELECT * FROM inventarios WHERE idelementos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFechaEntrada($value){
		$sql = 'DELETE FROM inventarios WHERE fecha_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaSalida($value){
		$sql = 'DELETE FROM inventarios WHERE fecha_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdelementos($value){
		$sql = 'DELETE FROM inventarios WHERE idelementos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return InventariosMySql 
	 */
	protected function readRow($row){
		$inventario = new Inventario();
		
		$inventario->idinventarios = $row['idinventarios'];
		$inventario->fechaEntrada = $row['fecha_entrada'];
		$inventario->fechaSalida = $row['fecha_salida'];
		$inventario->idelementos = $row['idelementos'];

		return $inventario;
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
	 * @return InventariosMySql 
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