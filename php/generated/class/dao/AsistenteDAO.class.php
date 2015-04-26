<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface AsistenteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Asistente 
	 */
	public function load($idasistente, $organizacionIdorganizacion);

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
 	 * @param asistente primary key
 	 */
	public function delete($idasistente, $organizacionIdorganizacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Asistente asistente
 	 */
	public function insert($asistente);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Asistente asistente
 	 */
	public function update($asistente);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombres($value);

	public function queryByApellidos($value);

	public function queryByEdad($value);

	public function queryByCiudad($value);

	public function queryByEmail($value);


	public function deleteByNombres($value);

	public function deleteByApellidos($value);

	public function deleteByEdad($value);

	public function deleteByCiudad($value);

	public function deleteByEmail($value);


}
?>