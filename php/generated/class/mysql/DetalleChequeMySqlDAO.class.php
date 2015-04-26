<?php
/**
 * Class that operate on table 'detalle_cheque'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class DetalleChequeMySqlDAO implements DetalleChequeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DetalleChequeMySql 
	 */
	public function load($iddetalleCheque, $chequeIdcheque){
		$sql = 'SELECT * FROM detalle_cheque WHERE iddetalle_cheque = ?  AND cheque_idcheque = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetalleCheque);
		$sqlQuery->setNumber($chequeIdcheque);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM detalle_cheque';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM detalle_cheque ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param detalleCheque primary key
 	 */
	public function delete($iddetalleCheque, $chequeIdcheque){
		$sql = 'DELETE FROM detalle_cheque WHERE iddetalle_cheque = ?  AND cheque_idcheque = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetalleCheque);
		$sqlQuery->setNumber($chequeIdcheque);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DetalleChequeMySql detalleCheque
 	 */
	public function insert($detalleCheque){
		$sql = 'INSERT INTO detalle_cheque (valor, iddetalle_cheque, cheque_idcheque) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($detalleCheque->valor);

		
		$sqlQuery->setNumber($detalleCheque->iddetalleCheque);

		$sqlQuery->setNumber($detalleCheque->chequeIdcheque);

		$this->executeInsert($sqlQuery);	
		//$detalleCheque->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DetalleChequeMySql detalleCheque
 	 */
	public function update($detalleCheque){
		$sql = 'UPDATE detalle_cheque SET valor = ? WHERE iddetalle_cheque = ?  AND cheque_idcheque = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($detalleCheque->valor);

		
		$sqlQuery->setNumber($detalleCheque->iddetalleCheque);

		$sqlQuery->setNumber($detalleCheque->chequeIdcheque);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM detalle_cheque';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM detalle_cheque WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByValor($value){
		$sql = 'DELETE FROM detalle_cheque WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DetalleChequeMySql 
	 */
	protected function readRow($row){
		$detalleCheque = new DetalleCheque();
		
		$detalleCheque->iddetalleCheque = $row['iddetalle_cheque'];
		$detalleCheque->valor = $row['valor'];
		$detalleCheque->chequeIdcheque = $row['cheque_idcheque'];

		return $detalleCheque;
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
	 * @return DetalleChequeMySql 
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