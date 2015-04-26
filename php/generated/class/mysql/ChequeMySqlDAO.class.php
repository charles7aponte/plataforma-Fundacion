<?php
/**
 * Class that operate on table 'cheque'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class ChequeMySqlDAO implements ChequeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ChequeMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cheque WHERE idcheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cheque';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cheque ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cheque primary key
 	 */
	public function delete($idcheque){
		$sql = 'DELETE FROM cheque WHERE idcheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idcheque);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ChequeMySql cheque
 	 */
	public function insert($cheque){
		$sql = 'INSERT INTO cheque (cheque, banco, sucursal, codigo, cuenta, tipo_cheque, ingresos_idingresos, egresos_idegresos) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cheque->cheque);
		$sqlQuery->set($cheque->banco);
		$sqlQuery->set($cheque->sucursal);
		$sqlQuery->set($cheque->codigo);
		$sqlQuery->set($cheque->cuenta);
		$sqlQuery->set($cheque->tipoCheque);
		$sqlQuery->setNumber($cheque->ingresosIdingresos);
		$sqlQuery->setNumber($cheque->egresosIdegresos);

		$id = $this->executeInsert($sqlQuery);	
		$cheque->idcheque = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ChequeMySql cheque
 	 */
	public function update($cheque){
		$sql = 'UPDATE cheque SET cheque = ?, banco = ?, sucursal = ?, codigo = ?, cuenta = ?, tipo_cheque = ?, ingresos_idingresos = ?, egresos_idegresos = ? WHERE idcheque = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cheque->cheque);
		$sqlQuery->set($cheque->banco);
		$sqlQuery->set($cheque->sucursal);
		$sqlQuery->set($cheque->codigo);
		$sqlQuery->set($cheque->cuenta);
		$sqlQuery->set($cheque->tipoCheque);
		$sqlQuery->setNumber($cheque->ingresosIdingresos);
		$sqlQuery->setNumber($cheque->egresosIdegresos);

		$sqlQuery->setNumber($cheque->idcheque);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cheque';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCheque($value){
		$sql = 'SELECT * FROM cheque WHERE cheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBanco($value){
		$sql = 'SELECT * FROM cheque WHERE banco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySucursal($value){
		$sql = 'SELECT * FROM cheque WHERE sucursal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM cheque WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCuenta($value){
		$sql = 'SELECT * FROM cheque WHERE cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoCheque($value){
		$sql = 'SELECT * FROM cheque WHERE tipo_cheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIngresosIdingresos($value){
		$sql = 'SELECT * FROM cheque WHERE ingresos_idingresos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEgresosIdegresos($value){
		$sql = 'SELECT * FROM cheque WHERE egresos_idegresos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCheque($value){
		$sql = 'DELETE FROM cheque WHERE cheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBanco($value){
		$sql = 'DELETE FROM cheque WHERE banco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySucursal($value){
		$sql = 'DELETE FROM cheque WHERE sucursal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM cheque WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCuenta($value){
		$sql = 'DELETE FROM cheque WHERE cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoCheque($value){
		$sql = 'DELETE FROM cheque WHERE tipo_cheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIngresosIdingresos($value){
		$sql = 'DELETE FROM cheque WHERE ingresos_idingresos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEgresosIdegresos($value){
		$sql = 'DELETE FROM cheque WHERE egresos_idegresos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ChequeMySql 
	 */
	protected function readRow($row){
		$cheque = new Cheque();
		
		$cheque->idcheque = $row['idcheque'];
		$cheque->cheque = $row['cheque'];
		$cheque->banco = $row['banco'];
		$cheque->sucursal = $row['sucursal'];
		$cheque->codigo = $row['codigo'];
		$cheque->cuenta = $row['cuenta'];
		$cheque->tipoCheque = $row['tipo_cheque'];
		$cheque->ingresosIdingresos = $row['ingresos_idingresos'];
		$cheque->egresosIdegresos = $row['egresos_idegresos'];

		return $cheque;
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
	 * @return ChequeMySql 
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