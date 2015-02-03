<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-02-03 03:54
 */
interface AsistenteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Asistente 
	 */
	public function load($email, $organizacionIdorganizacion);

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
	public function delete($email, $organizacionIdorganizacion);
	
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


	public function deleteByNombres($value);

	public function deleteByApellidos($value);

	public function deleteByEdad($value);

	public function deleteByCiudad($value);


}
?>