<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface EventosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Eventos 
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
 	 * @param evento primary key
 	 */
	public function delete($ideventos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Eventos evento
 	 */
	public function insert($evento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Eventos evento
 	 */
	public function update($evento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByDescripcion($value);

	public function queryByFechaInicio($value);

	public function queryByFechaFinal($value);


	public function deleteByNombre($value);

	public function deleteByDescripcion($value);

	public function deleteByFechaInicio($value);

	public function deleteByFechaFinal($value);


}
?>