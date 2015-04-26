<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface AsistenteEventosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AsistenteEventos 
	 */
	public function load($asistenteIdasistente, $eventosIdeventos);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param asistenteEvento primary key
 	 */
	public function delete($asistenteIdasistente, $eventosIdeventos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AsistenteEventos asistenteEvento
 	 */
	public function insert($asistenteEvento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AsistenteEventos asistenteEvento
 	 */
	public function update($asistenteEvento);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>