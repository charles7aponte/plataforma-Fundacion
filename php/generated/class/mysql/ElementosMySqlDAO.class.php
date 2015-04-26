<?php
/**
 * Class that operate on table 'elementos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class ElementosMySqlDAO implements ElementosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ElementosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM elementos WHERE idelementos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM elementos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM elementos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param elemento primary key
 	 */
	public function delete($idelementos){
		$sql = 'DELETE FROM elementos WHERE idelementos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idelementos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ElementosMySql elemento
 	 */
	public function insert($elemento){
		$sql = 'INSERT INTO elementos (nombre, activo, precio, categoria, descripcion, cantidad, fecha_ingreso, fecha_compra, medida, categoria_id, organizacion_idorganizacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($elemento->nombre);
		$sqlQuery->setNumber($elemento->activo);
		$sqlQuery->setNumber($elemento->precio);
		$sqlQuery->set($elemento->categoria);
		$sqlQuery->set($elemento->descripcion);
		$sqlQuery->set($elemento->cantidad);
		$sqlQuery->set($elemento->fechaIngreso);
		$sqlQuery->set($elemento->fechaCompra);
		$sqlQuery->set($elemento->medida);
		$sqlQuery->setNumber($elemento->categoriaId);
		$sqlQuery->setNumber($elemento->organizacionIdorganizacion);

		$id = $this->executeInsert($sqlQuery);	
		$elemento->idelementos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ElementosMySql elemento
 	 */
	public function update($elemento){
		$sql = 'UPDATE elementos SET nombre = ?, activo = ?, precio = ?, categoria = ?, descripcion = ?, cantidad = ?, fecha_ingreso = ?, fecha_compra = ?, medida = ?, categoria_id = ?, organizacion_idorganizacion = ? WHERE idelementos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($elemento->nombre);
		$sqlQuery->setNumber($elemento->activo);
		$sqlQuery->setNumber($elemento->precio);
		$sqlQuery->set($elemento->categoria);
		$sqlQuery->set($elemento->descripcion);
		$sqlQuery->set($elemento->cantidad);
		$sqlQuery->set($elemento->fechaIngreso);
		$sqlQuery->set($elemento->fechaCompra);
		$sqlQuery->set($elemento->medida);
		$sqlQuery->setNumber($elemento->categoriaId);
		$sqlQuery->setNumber($elemento->organizacionIdorganizacion);

		$sqlQuery->setNumber($elemento->idelementos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM elementos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM elementos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByActivo($value){
		$sql = 'SELECT * FROM elementos WHERE activo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM elementos WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategoria($value){
		$sql = 'SELECT * FROM elementos WHERE categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM elementos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM elementos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaIngreso($value){
		$sql = 'SELECT * FROM elementos WHERE fecha_ingreso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaCompra($value){
		$sql = 'SELECT * FROM elementos WHERE fecha_compra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMedida($value){
		$sql = 'SELECT * FROM elementos WHERE medida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategoriaId($value){
		$sql = 'SELECT * FROM elementos WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrganizacionIdorganizacion($value){
		$sql = 'SELECT * FROM elementos WHERE organizacion_idorganizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM elementos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByActivo($value){
		$sql = 'DELETE FROM elementos WHERE activo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM elementos WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategoria($value){
		$sql = 'DELETE FROM elementos WHERE categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM elementos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidad($value){
		$sql = 'DELETE FROM elementos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaIngreso($value){
		$sql = 'DELETE FROM elementos WHERE fecha_ingreso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaCompra($value){
		$sql = 'DELETE FROM elementos WHERE fecha_compra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMedida($value){
		$sql = 'DELETE FROM elementos WHERE medida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategoriaId($value){
		$sql = 'DELETE FROM elementos WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrganizacionIdorganizacion($value){
		$sql = 'DELETE FROM elementos WHERE organizacion_idorganizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ElementosMySql 
	 */
	protected function readRow($row){
		$elemento = new Elemento();
		
		$elemento->idelementos = $row['idelementos'];
		$elemento->nombre = $row['nombre'];
		$elemento->activo = $row['activo'];
		$elemento->precio = $row['precio'];
		$elemento->categoria = $row['categoria'];
		$elemento->descripcion = $row['descripcion'];
		$elemento->cantidad = $row['cantidad'];
		$elemento->fechaIngreso = $row['fecha_ingreso'];
		$elemento->fechaCompra = $row['fecha_compra'];
		$elemento->medida = $row['medida'];
		$elemento->categoriaId = $row['categoria_id'];
		$elemento->organizacionIdorganizacion = $row['organizacion_idorganizacion'];

		return $elemento;
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
	 * @return ElementosMySql 
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