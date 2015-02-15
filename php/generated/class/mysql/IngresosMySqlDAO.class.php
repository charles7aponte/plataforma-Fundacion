<?php
/**
 * Class that operate on table 'ingresos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-02-13 23:50
 */
class IngresosMySqlDAO implements IngresosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return IngresosMySql 
	 */
	public function load($idingresos, $organizacionIdorganizacion){
		$sql = 'SELECT * FROM ingresos WHERE idingresos = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idingresos);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ingresos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ingresos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param ingreso primary key
 	 */
	public function delete($idingresos, $organizacionIdorganizacion){
		$sql = 'DELETE FROM ingresos WHERE idingresos = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idingresos);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param IngresosMySql ingreso
 	 */
	public function insert($ingreso){
		$sql = 'INSERT INTO ingresos (ciudad, fecha, valor, recibido_de, concepto_de, modalidad, beneficiario, cc, forma_pago, aprobado, idingresos, organizacion_idorganizacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($ingreso->ciudad);
		$sqlQuery->set($ingreso->fecha);
		$sqlQuery->setNumber($ingreso->valor);
		$sqlQuery->set($ingreso->recibidoDe);
		$sqlQuery->set($ingreso->conceptoDe);
		$sqlQuery->set($ingreso->modalidad);
		$sqlQuery->set($ingreso->beneficiario);
		$sqlQuery->set($ingreso->cc);
		$sqlQuery->setNumber($ingreso->formaPago);
		$sqlQuery->set($ingreso->aprobado);

		
		$sqlQuery->setNumber($ingreso->idingresos);

		$sqlQuery->setNumber($ingreso->organizacionIdorganizacion);

		$this->executeInsert($sqlQuery);	
		//$ingreso->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param IngresosMySql ingreso
 	 */
	public function update($ingreso){
		$sql = 'UPDATE ingresos SET ciudad = ?, fecha = ?, valor = ?, recibido_de = ?, concepto_de = ?, modalidad = ?, beneficiario = ?, cc = ?, forma_pago = ?, aprobado = ? WHERE idingresos = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($ingreso->ciudad);
		$sqlQuery->set($ingreso->fecha);
		$sqlQuery->setNumber($ingreso->valor);
		$sqlQuery->set($ingreso->recibidoDe);
		$sqlQuery->set($ingreso->conceptoDe);
		$sqlQuery->set($ingreso->modalidad);
		$sqlQuery->set($ingreso->beneficiario);
		$sqlQuery->set($ingreso->cc);
		$sqlQuery->setNumber($ingreso->formaPago);
		$sqlQuery->set($ingreso->aprobado);

		
		$sqlQuery->setNumber($ingreso->idingresos);

		$sqlQuery->setNumber($ingreso->organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ingresos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCiudad($value){
		$sql = 'SELECT * FROM ingresos WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM ingresos WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM ingresos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRecibidoDe($value){
		$sql = 'SELECT * FROM ingresos WHERE recibido_de = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConceptoDe($value){
		$sql = 'SELECT * FROM ingresos WHERE concepto_de = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModalidad($value){
		$sql = 'SELECT * FROM ingresos WHERE modalidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBeneficiario($value){
		$sql = 'SELECT * FROM ingresos WHERE beneficiario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCc($value){
		$sql = 'SELECT * FROM ingresos WHERE cc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormaPago($value){
		$sql = 'SELECT * FROM ingresos WHERE forma_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAprobado($value){
		$sql = 'SELECT * FROM ingresos WHERE aprobado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCiudad($value){
		$sql = 'DELETE FROM ingresos WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM ingresos WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM ingresos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRecibidoDe($value){
		$sql = 'DELETE FROM ingresos WHERE recibido_de = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConceptoDe($value){
		$sql = 'DELETE FROM ingresos WHERE concepto_de = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModalidad($value){
		$sql = 'DELETE FROM ingresos WHERE modalidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBeneficiario($value){
		$sql = 'DELETE FROM ingresos WHERE beneficiario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCc($value){
		$sql = 'DELETE FROM ingresos WHERE cc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormaPago($value){
		$sql = 'DELETE FROM ingresos WHERE forma_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAprobado($value){
		$sql = 'DELETE FROM ingresos WHERE aprobado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return IngresosMySql 
	 */
	protected function readRow($row){
		$ingreso = new Ingreso();
		
		$ingreso->idingresos = $row['idingresos'];
		$ingreso->ciudad = $row['ciudad'];
		$ingreso->fecha = $row['fecha'];
		$ingreso->valor = $row['valor'];
		$ingreso->recibidoDe = $row['recibido_de'];
		$ingreso->conceptoDe = $row['concepto_de'];
		$ingreso->modalidad = $row['modalidad'];
		$ingreso->beneficiario = $row['beneficiario'];
		$ingreso->cc = $row['cc'];
		$ingreso->formaPago = $row['forma_pago'];
		$ingreso->aprobado = $row['aprobado'];
		$ingreso->organizacionIdorganizacion = $row['organizacion_idorganizacion'];

		return $ingreso;
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
	 * @return IngresosMySql 
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