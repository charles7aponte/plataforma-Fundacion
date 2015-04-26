<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface ChequeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cheque 
	 */
	public function load($id);

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
 	 * @param cheque primary key
 	 */
	public function delete($idcheque);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cheque cheque
 	 */
	public function insert($cheque);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cheque cheque
 	 */
	public function update($cheque);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCheque($value);

	public function queryByBanco($value);

	public function queryBySucursal($value);

	public function queryByCodigo($value);

	public function queryByCuenta($value);

	public function queryByTipoCheque($value);

	public function queryByIngresosIdingresos($value);

	public function queryByEgresosIdegresos($value);


	public function deleteByCheque($value);

	public function deleteByBanco($value);

	public function deleteBySucursal($value);

	public function deleteByCodigo($value);

	public function deleteByCuenta($value);

	public function deleteByTipoCheque($value);

	public function deleteByIngresosIdingresos($value);

	public function deleteByEgresosIdegresos($value);


}
?>