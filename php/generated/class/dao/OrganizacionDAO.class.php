<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-02-04 22:29
 */
interface OrganizacionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Organizacion 
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
 	 * @param organizacion primary key
 	 */
	public function delete($idorganizacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Organizacion organizacion
 	 */
	public function insert($organizacion);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Organizacion organizacion
 	 */
	public function update($organizacion);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByDescripcion($value);


	public function deleteByNombre($value);

	public function deleteByDescripcion($value);


}
?>