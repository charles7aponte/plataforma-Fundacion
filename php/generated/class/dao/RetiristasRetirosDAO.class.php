<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
interface RetiristasRetirosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RetiristasRetiros 
	 */
	public function load($idretiristasRetiros, $retirosIdretiros, $retiristasIdasistenteRetiros);

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
 	 * @param retiristasRetiro primary key
 	 */
	public function delete($idretiristasRetiros, $retirosIdretiros, $retiristasIdasistenteRetiros);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RetiristasRetiros retiristasRetiro
 	 */
	public function insert($retiristasRetiro);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RetiristasRetiros retiristasRetiro
 	 */
	public function update($retiristasRetiro);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>