<?php
/**
 * Class that operate on table 'donaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class DonacionesMySqlDAO implements DonacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DonacionesMySql 
	 */
	public function load($iddonacion, $organizacionIdorganizacion){
		$sql = 'SELECT * FROM donaciones WHERE iddonacion = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddonacion);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM donaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM donaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param donacione primary key
 	 */
	public function delete($iddonacion, $organizacionIdorganizacion){
		$sql = 'DELETE FROM donaciones WHERE iddonacion = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddonacion);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DonacionesMySql donacione
 	 */
	public function insert($donacione){
		$sql = 'INSERT INTO donaciones (valor, fecha, valorletras, nombres, apellidos, direccion, ciudad, email, telefono, concepto, detalle, iddonacion, organizacion_idorganizacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($donacione->valor);
		$sqlQuery->set($donacione->fecha);
		$sqlQuery->set($donacione->valorletras);
		$sqlQuery->set($donacione->nombres);
		$sqlQuery->set($donacione->apellidos);
		$sqlQuery->set($donacione->direccion);
		$sqlQuery->set($donacione->ciudad);
		$sqlQuery->set($donacione->email);
		$sqlQuery->set($donacione->telefono);
		$sqlQuery->set($donacione->concepto);
		$sqlQuery->set($donacione->detalle);

		
		$sqlQuery->setNumber($donacione->iddonacion);

		$sqlQuery->setNumber($donacione->organizacionIdorganizacion);

		$this->executeInsert($sqlQuery);	
		//$donacione->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DonacionesMySql donacione
 	 */
	public function update($donacione){
		$sql = 'UPDATE donaciones SET valor = ?, fecha = ?, valorletras = ?, nombres = ?, apellidos = ?, direccion = ?, ciudad = ?, email = ?, telefono = ?, concepto = ?, detalle = ? WHERE iddonacion = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($donacione->valor);
		$sqlQuery->set($donacione->fecha);
		$sqlQuery->set($donacione->valorletras);
		$sqlQuery->set($donacione->nombres);
		$sqlQuery->set($donacione->apellidos);
		$sqlQuery->set($donacione->direccion);
		$sqlQuery->set($donacione->ciudad);
		$sqlQuery->set($donacione->email);
		$sqlQuery->set($donacione->telefono);
		$sqlQuery->set($donacione->concepto);
		$sqlQuery->set($donacione->detalle);

		
		$sqlQuery->setNumber($donacione->iddonacion);

		$sqlQuery->setNumber($donacione->organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM donaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM donaciones WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM donaciones WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorletras($value){
		$sql = 'SELECT * FROM donaciones WHERE valorletras = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombres($value){
		$sql = 'SELECT * FROM donaciones WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidos($value){
		$sql = 'SELECT * FROM donaciones WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM donaciones WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCiudad($value){
		$sql = 'SELECT * FROM donaciones WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM donaciones WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM donaciones WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConcepto($value){
		$sql = 'SELECT * FROM donaciones WHERE concepto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDetalle($value){
		$sql = 'SELECT * FROM donaciones WHERE detalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByValor($value){
		$sql = 'DELETE FROM donaciones WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM donaciones WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorletras($value){
		$sql = 'DELETE FROM donaciones WHERE valorletras = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombres($value){
		$sql = 'DELETE FROM donaciones WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidos($value){
		$sql = 'DELETE FROM donaciones WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM donaciones WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCiudad($value){
		$sql = 'DELETE FROM donaciones WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM donaciones WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM donaciones WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConcepto($value){
		$sql = 'DELETE FROM donaciones WHERE concepto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDetalle($value){
		$sql = 'DELETE FROM donaciones WHERE detalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DonacionesMySql 
	 */
	protected function readRow($row){
		$donacione = new Donacione();
		
		$donacione->iddonacion = $row['iddonacion'];
		$donacione->valor = $row['valor'];
		$donacione->fecha = $row['fecha'];
		$donacione->valorletras = $row['valorletras'];
		$donacione->nombres = $row['nombres'];
		$donacione->apellidos = $row['apellidos'];
		$donacione->direccion = $row['direccion'];
		$donacione->ciudad = $row['ciudad'];
		$donacione->email = $row['email'];
		$donacione->telefono = $row['telefono'];
		$donacione->concepto = $row['concepto'];
		$donacione->detalle = $row['detalle'];
		$donacione->organizacionIdorganizacion = $row['organizacion_idorganizacion'];

		return $donacione;
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
	 * @return DonacionesMySql 
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