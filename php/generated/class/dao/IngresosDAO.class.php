<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-01-21 03:18
 */
interface IngresosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Ingresos 
	 */
	public function load($idingresos, $organizacionIdorganizacion);

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
 	 * @param ingreso primary key
 	 */
	public function delete($idingresos, $organizacionIdorganizacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Ingresos ingreso
 	 */
	public function insert($ingreso);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Ingresos ingreso
 	 */
	public function update($ingreso);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCiudad($value);

	public function queryByFecha($value);

	public function queryByValor($value);

	public function queryByRecibidoDe($value);

	public function queryByConceptoDe($value);

	public function queryByModalidad($value);

	public function queryByBeneficiario($value);

	public function queryByCc($value);

	public function queryByAprobado($value);


	public function deleteByCiudad($value);

	public function deleteByFecha($value);

	public function deleteByValor($value);

	public function deleteByRecibidoDe($value);

	public function deleteByConceptoDe($value);

	public function deleteByModalidad($value);

	public function deleteByBeneficiario($value);

	public function deleteByCc($value);

	public function deleteByAprobado($value);


}
?>