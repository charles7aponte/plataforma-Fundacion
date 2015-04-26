<?php
/**
 * Class that operate on table 'padrinos_donaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class PadrinosDonacionesMySqlDAO implements PadrinosDonacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PadrinosDonacionesMySql 
	 */
	public function load($padrinosCc, $donacionesIddonacion){
		$sql = 'SELECT * FROM padrinos_donaciones WHERE padrinos_cc = ?  AND donaciones_iddonacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($padrinosCc);
		$sqlQuery->setNumber($donacionesIddonacion);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM padrinos_donaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM padrinos_donaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param padrinosDonacione primary key
 	 */
	public function delete($padrinosCc, $donacionesIddonacion){
		$sql = 'DELETE FROM padrinos_donaciones WHERE padrinos_cc = ?  AND donaciones_iddonacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($padrinosCc);
		$sqlQuery->setNumber($donacionesIddonacion);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PadrinosDonacionesMySql padrinosDonacione
 	 */
	public function insert($padrinosDonacione){
		$sql = 'INSERT INTO padrinos_donaciones ( padrinos_cc, donaciones_iddonacion) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($padrinosDonacione->padrinosCc);

		$sqlQuery->setNumber($padrinosDonacione->donacionesIddonacion);

		$this->executeInsert($sqlQuery);	
		//$padrinosDonacione->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PadrinosDonacionesMySql padrinosDonacione
 	 */
	public function update($padrinosDonacione){
		$sql = 'UPDATE padrinos_donaciones SET  WHERE padrinos_cc = ?  AND donaciones_iddonacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($padrinosDonacione->padrinosCc);

		$sqlQuery->setNumber($padrinosDonacione->donacionesIddonacion);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM padrinos_donaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return PadrinosDonacionesMySql 
	 */
	protected function readRow($row){
		$padrinosDonacione = new PadrinosDonacione();
		
		$padrinosDonacione->padrinosCc = $row['padrinos_cc'];
		$padrinosDonacione->donacionesIddonacion = $row['donaciones_iddonacion'];

		return $padrinosDonacione;
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
	 * @return PadrinosDonacionesMySql 
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