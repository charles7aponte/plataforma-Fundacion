<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface HojaDeVidaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HojaDeVida 
	 */
	public function load($id, $organizacionIdorganizacion);

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
 	 * @param hojaDeVida primary key
 	 */
	public function delete($id, $organizacionIdorganizacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HojaDeVida hojaDeVida
 	 */
	public function insert($hojaDeVida);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HojaDeVida hojaDeVida
 	 */
	public function update($hojaDeVida);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombres($value);

	public function queryByApellidos($value);

	public function queryByFechaNac($value);

	public function queryByEdad($value);

	public function queryByEmail($value);

	public function queryByDireccion($value);

	public function queryByCc($value);

	public function queryByGodson($value);

	public function queryByTelefono($value);

	public function queryByFechaVinculacion($value);


	public function deleteByNombres($value);

	public function deleteByApellidos($value);

	public function deleteByFechaNac($value);

	public function deleteByEdad($value);

	public function deleteByEmail($value);

	public function deleteByDireccion($value);

	public function deleteByCc($value);

	public function deleteByGodson($value);

	public function deleteByTelefono($value);

	public function deleteByFechaVinculacion($value);


}
?>