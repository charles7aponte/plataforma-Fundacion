<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface ElementosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Elementos 
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
 	 * @param elemento primary key
 	 */
	public function delete($idelementos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Elementos elemento
 	 */
	public function insert($elemento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Elementos elemento
 	 */
	public function update($elemento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByActivo($value);

	public function queryByPrecio($value);

	public function queryByCategoria($value);

	public function queryByDescripcion($value);

	public function queryByCantidad($value);

	public function queryByFechaIngreso($value);

	public function queryByFechaCompra($value);

	public function queryByMedida($value);

	public function queryByCategoriaId($value);

	public function queryByOrganizacionIdorganizacion($value);


	public function deleteByNombre($value);

	public function deleteByActivo($value);

	public function deleteByPrecio($value);

	public function deleteByCategoria($value);

	public function deleteByDescripcion($value);

	public function deleteByCantidad($value);

	public function deleteByFechaIngreso($value);

	public function deleteByFechaCompra($value);

	public function deleteByMedida($value);

	public function deleteByCategoriaId($value);

	public function deleteByOrganizacionIdorganizacion($value);


}
?>