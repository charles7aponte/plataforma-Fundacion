<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-02-03 03:54
 */
interface InventariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Inventarios 
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
 	 * @param inventario primary key
 	 */
	public function delete($idinventarios);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Inventarios inventario
 	 */
	public function insert($inventario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Inventarios inventario
 	 */
	public function update($inventario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFechaEntrada($value);

	public function queryByFechaSalida($value);

	public function queryByIdelementos($value);


	public function deleteByFechaEntrada($value);

	public function deleteByFechaSalida($value);

	public function deleteByIdelementos($value);


}
?>