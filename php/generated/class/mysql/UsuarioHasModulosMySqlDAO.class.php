<?php
/**
 * Class that operate on table 'usuario_has_modulos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-02-03 03:54
 */
class UsuarioHasModulosMySqlDAO implements UsuarioHasModulosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuarioHasModulosMySql 
	 */
	public function load($usuarioIdusuario, $modulosId){
		$sql = 'SELECT * FROM usuario_has_modulos WHERE usuario_idusuario = ?  AND modulos_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($usuarioIdusuario);
		$sqlQuery->setNumber($modulosId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuario_has_modulos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuario_has_modulos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuarioHasModulo primary key
 	 */
	public function delete($usuarioIdusuario, $modulosId){
		$sql = 'DELETE FROM usuario_has_modulos WHERE usuario_idusuario = ?  AND modulos_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($usuarioIdusuario);
		$sqlQuery->setNumber($modulosId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuarioHasModulosMySql usuarioHasModulo
 	 */
	public function insert($usuarioHasModulo){
		$sql = 'INSERT INTO usuario_has_modulos ( usuario_idusuario, modulos_id) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($usuarioHasModulo->usuarioIdusuario);

		$sqlQuery->setNumber($usuarioHasModulo->modulosId);

		$this->executeInsert($sqlQuery);	
		//$usuarioHasModulo->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuarioHasModulosMySql usuarioHasModulo
 	 */
	public function update($usuarioHasModulo){
		$sql = 'UPDATE usuario_has_modulos SET  WHERE usuario_idusuario = ?  AND modulos_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($usuarioHasModulo->usuarioIdusuario);

		$sqlQuery->setNumber($usuarioHasModulo->modulosId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuario_has_modulos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return UsuarioHasModulosMySql 
	 */
	protected function readRow($row){
		$usuarioHasModulo = new UsuarioHasModulo();
		
		$usuarioHasModulo->usuarioIdusuario = $row['usuario_idusuario'];
		$usuarioHasModulo->modulosId = $row['modulos_id'];

		return $usuarioHasModulo;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return UsuarioHasModulosMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>