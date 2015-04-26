<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface RetirosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Retiros 
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
 	 * @param retiro primary key
 	 */
	public function delete($idretiros);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Retiros retiro
 	 */
	public function insert($retiro);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Retiros retiro
 	 */
	public function update($retiro);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByDescripcion($value);

	public function queryByFechaInicio($value);

	public function queryByFechaFinal($value);


	public function deleteByNombre($value);

	public function deleteByDescripcion($value);

	public function deleteByFechaInicio($value);

	public function deleteByFechaFinal($value);


}
?>