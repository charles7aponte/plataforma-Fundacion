<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-02-03 03:54
 */
interface UsuarioHasModulosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UsuarioHasModulos 
	 */
	public function load($usuarioIdusuario, $modulosId);

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
 	 * @param usuarioHasModulo primary key
 	 */
	public function delete($usuarioIdusuario, $modulosId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuarioHasModulos usuarioHasModulo
 	 */
	public function insert($usuarioHasModulo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuarioHasModulos usuarioHasModulo
 	 */
	public function update($usuarioHasModulo);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>