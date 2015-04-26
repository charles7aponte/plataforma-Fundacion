<?php
/**
 * Class that operate on table 'retiristas_retiros'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class RetiristasRetirosMySqlDAO implements RetiristasRetirosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RetiristasRetirosMySql 
	 */
	public function load($idretiristasRetiros, $retirosIdretiros, $retiristasIdasistenteRetiros){
		$sql = 'SELECT * FROM retiristas_retiros WHERE idretiristas_retiros = ?  AND retiros_idretiros = ?  AND retiristas_idasistente_retiros = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idretiristasRetiros);
		$sqlQuery->setNumber($retirosIdretiros);
		$sqlQuery->setNumber($retiristasIdasistenteRetiros);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM retiristas_retiros';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM retiristas_retiros ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param retiristasRetiro primary key
 	 */
	public function delete($idretiristasRetiros, $retirosIdretiros, $retiristasIdasistenteRetiros){
		$sql = 'DELETE FROM retiristas_retiros WHERE idretiristas_retiros = ?  AND retiros_idretiros = ?  AND retiristas_idasistente_retiros = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idretiristasRetiros);
		$sqlQuery->setNumber($retirosIdretiros);
		$sqlQuery->setNumber($retiristasIdasistenteRetiros);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RetiristasRetirosMySql retiristasRetiro
 	 */
	public function insert($retiristasRetiro){
		$sql = 'INSERT INTO retiristas_retiros ( idretiristas_retiros, retiros_idretiros, retiristas_idasistente_retiros) VALUES ( ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($retiristasRetiro->idretiristasRetiros);

		$sqlQuery->setNumber($retiristasRetiro->retirosIdretiros);

		$sqlQuery->setNumber($retiristasRetiro->retiristasIdasistenteRetiros);

		$this->executeInsert($sqlQuery);	
		//$retiristasRetiro->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RetiristasRetirosMySql retiristasRetiro
 	 */
	public function update($retiristasRetiro){
		$sql = 'UPDATE retiristas_retiros SET  WHERE idretiristas_retiros = ?  AND retiros_idretiros = ?  AND retiristas_idasistente_retiros = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($retiristasRetiro->idretiristasRetiros);

		$sqlQuery->setNumber($retiristasRetiro->retirosIdretiros);

		$sqlQuery->setNumber($retiristasRetiro->retiristasIdasistenteRetiros);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM retiristas_retiros';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return RetiristasRetirosMySql 
	 */
	protected function readRow($row){
		$retiristasRetiro = new RetiristasRetiro();
		
		$retiristasRetiro->idretiristasRetiros = $row['idretiristas_retiros'];
		$retiristasRetiro->retirosIdretiros = $row['retiros_idretiros'];
		$retiristasRetiro->retiristasIdasistenteRetiros = $row['retiristas_idasistente_retiros'];

		return $retiristasRetiro;
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
	 * @return RetiristasRetirosMySql 
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