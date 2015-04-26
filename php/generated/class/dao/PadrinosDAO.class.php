<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface PadrinosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Padrinos 
	 */
	public function load($cc, $hojaDeVidaId, $hojaDeVidaOrganizacionIdorganizacion);

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
 	 * @param padrino primary key
 	 */
	public function delete($cc, $hojaDeVidaId, $hojaDeVidaOrganizacionIdorganizacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Padrinos padrino
 	 */
	public function insert($padrino);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Padrinos padrino
 	 */
	public function update($padrino);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByApellidos($value);

	public function queryByFechaNac($value);

	public function queryByTelefono($value);

	public function queryByCelular($value);

	public function queryByDireccion($value);

	public function queryByEmail($value);

	public function queryByAporte($value);


	public function deleteByNombre($value);

	public function deleteByApellidos($value);

	public function deleteByFechaNac($value);

	public function deleteByTelefono($value);

	public function deleteByCelular($value);

	public function deleteByDireccion($value);

	public function deleteByEmail($value);

	public function deleteByAporte($value);


}
?>