<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface DonacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Donaciones 
	 */
	public function load($iddonacion, $organizacionIdorganizacion);

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
 	 * @param donacione primary key
 	 */
	public function delete($iddonacion, $organizacionIdorganizacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Donaciones donacione
 	 */
	public function insert($donacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Donaciones donacione
 	 */
	public function update($donacione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByValor($value);

	public function queryByFecha($value);

	public function queryByValorletras($value);

	public function queryByNombres($value);

	public function queryByApellidos($value);

	public function queryByDireccion($value);

	public function queryByCiudad($value);

	public function queryByEmail($value);

	public function queryByTelefono($value);

	public function queryByConcepto($value);

	public function queryByDetalle($value);


	public function deleteByValor($value);

	public function deleteByFecha($value);

	public function deleteByValorletras($value);

	public function deleteByNombres($value);

	public function deleteByApellidos($value);

	public function deleteByDireccion($value);

	public function deleteByCiudad($value);

	public function deleteByEmail($value);

	public function deleteByTelefono($value);

	public function deleteByConcepto($value);

	public function deleteByDetalle($value);


}
?>