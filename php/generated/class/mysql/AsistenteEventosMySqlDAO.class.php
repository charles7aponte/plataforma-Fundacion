<?php
/**
 * Class that operate on table 'asistente_eventos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class AsistenteEventosMySqlDAO implements AsistenteEventosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AsistenteEventosMySql 
	 */
	public function load($asistenteIdasistente, $eventosIdeventos){
		$sql = 'SELECT * FROM asistente_eventos WHERE asistente_idasistente = ?  AND eventos_ideventos = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($asistenteIdasistente);
		$sqlQuery->setNumber($eventosIdeventos);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM asistente_eventos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM asistente_eventos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param asistenteEvento primary key
 	 */
	public function delete($asistenteIdasistente, $eventosIdeventos){
		$sql = 'DELETE FROM asistente_eventos WHERE asistente_idasistente = ?  AND eventos_ideventos = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($asistenteIdasistente);
		$sqlQuery->setNumber($eventosIdeventos);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AsistenteEventosMySql asistenteEvento
 	 */
	public function insert($asistenteEvento){
		$sql = 'INSERT INTO asistente_eventos ( asistente_idasistente, eventos_ideventos) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($asistenteEvento->asistenteIdasistente);

		$sqlQuery->setNumber($asistenteEvento->eventosIdeventos);

		$this->executeInsert($sqlQuery);	
		//$asistenteEvento->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AsistenteEventosMySql asistenteEvento
 	 */
	public function update($asistenteEvento){
		$sql = 'UPDATE asistente_eventos SET  WHERE asistente_idasistente = ?  AND eventos_ideventos = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($asistenteEvento->asistenteIdasistente);

		$sqlQuery->setNumber($asistenteEvento->eventosIdeventos);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM asistente_eventos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return AsistenteEventosMySql 
	 */
	protected function readRow($row){
		$asistenteEvento = new AsistenteEvento();
		
		$asistenteEvento->asistenteIdasistente = $row['asistente_idasistente'];
		$asistenteEvento->eventosIdeventos = $row['eventos_ideventos'];

		return $asistenteEvento;
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
	 * @return AsistenteEventosMySql 
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