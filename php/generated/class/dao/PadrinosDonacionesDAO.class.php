<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface PadrinosDonacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PadrinosDonaciones 
	 */
	public function load($padrinosCc, $donacionesIddonacion);

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
 	 * @param padrinosDonacione primary key
 	 */
	public function delete($padrinosCc, $donacionesIddonacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PadrinosDonaciones padrinosDonacione
 	 */
	public function insert($padrinosDonacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PadrinosDonaciones padrinosDonacione
 	 */
	public function update($padrinosDonacione);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>