<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface RetiristasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Retiristas 
	 */
	public function load($idasistenteRetiros, $organizacionIdorganizacion);

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
 	 * @param retirista primary key
 	 */
	public function delete($idasistenteRetiros, $organizacionIdorganizacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Retiristas retirista
 	 */
	public function insert($retirista);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Retiristas retirista
 	 */
	public function update($retirista);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombres($value);

	public function queryByApellidos($value);

	public function queryByEdad($value);

	public function queryByCiudad($value);

	public function queryByTelefono($value);

	public function queryByCc($value);

	public function queryByEmail($value);


	public function deleteByNombres($value);

	public function deleteByApellidos($value);

	public function deleteByEdad($value);

	public function deleteByCiudad($value);

	public function deleteByTelefono($value);

	public function deleteByCc($value);

	public function deleteByEmail($value);


}
?>