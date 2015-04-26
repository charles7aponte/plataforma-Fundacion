<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface DetalleChequeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DetalleCheque 
	 */
	public function load($iddetalleCheque, $chequeIdcheque);

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
 	 * @param detalleCheque primary key
 	 */
	public function delete($iddetalleCheque, $chequeIdcheque);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DetalleCheque detalleCheque
 	 */
	public function insert($detalleCheque);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DetalleCheque detalleCheque
 	 */
	public function update($detalleCheque);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByValor($value);


	public function deleteByValor($value);


}
?>