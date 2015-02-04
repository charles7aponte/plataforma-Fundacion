<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-02-04 22:29
 */
interface EgresosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Egresos 
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
 	 * @param egreso primary key
 	 */
	public function delete($idegresos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Egresos egreso
 	 */
	public function insert($egreso);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Egresos egreso
 	 */
	public function update($egreso);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCiudad($value);

	public function queryByFecha($value);

	public function queryByValor($value);

	public function queryByPagadoA($value);

	public function queryByConceptoDe($value);

	public function queryByModalidad($value);

	public function queryByBeneficiario($value);

	public function queryByCc($value);

	public function queryByAprobado($value);

	public function queryByOrganizacionIdorganizacion($value);


	public function deleteByCiudad($value);

	public function deleteByFecha($value);

	public function deleteByValor($value);

	public function deleteByPagadoA($value);

	public function deleteByConceptoDe($value);

	public function deleteByModalidad($value);

	public function deleteByBeneficiario($value);

	public function deleteByCc($value);

	public function deleteByAprobado($value);

	public function deleteByOrganizacionIdorganizacion($value);


}
?>