<?php
/**
 * Class that operate on table 'padrinos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class PadrinosMySqlDAO implements PadrinosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PadrinosMySql 
	 */
	public function load($cc, $hojaDeVidaId, $hojaDeVidaOrganizacionIdorganizacion){
		$sql = 'SELECT * FROM padrinos WHERE cc = ?  AND hoja_de_vida_id = ?  AND hoja_de_vida_organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($cc);
		$sqlQuery->setNumber($hojaDeVidaId);
		$sqlQuery->setNumber($hojaDeVidaOrganizacionIdorganizacion);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM padrinos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM padrinos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param padrino primary key
 	 */
	public function delete($cc, $hojaDeVidaId, $hojaDeVidaOrganizacionIdorganizacion){
		$sql = 'DELETE FROM padrinos WHERE cc = ?  AND hoja_de_vida_id = ?  AND hoja_de_vida_organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($cc);
		$sqlQuery->setNumber($hojaDeVidaId);
		$sqlQuery->setNumber($hojaDeVidaOrganizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PadrinosMySql padrino
 	 */
	public function insert($padrino){
		$sql = 'INSERT INTO padrinos (nombre, apellidos, fecha_nac, telefono, celular, direccion, email, aporte, cc, hoja_de_vida_id, hoja_de_vida_organizacion_idorganizacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($padrino->nombre);
		$sqlQuery->set($padrino->apellidos);
		$sqlQuery->set($padrino->fechaNac);
		$sqlQuery->set($padrino->telefono);
		$sqlQuery->set($padrino->celular);
		$sqlQuery->set($padrino->direccion);
		$sqlQuery->set($padrino->email);
		$sqlQuery->setNumber($padrino->aporte);

		
		$sqlQuery->setNumber($padrino->cc);

		$sqlQuery->setNumber($padrino->hojaDeVidaId);

		$sqlQuery->setNumber($padrino->hojaDeVidaOrganizacionIdorganizacion);

		$this->executeInsert($sqlQuery);	
		//$padrino->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PadrinosMySql padrino
 	 */
	public function update($padrino){
		$sql = 'UPDATE padrinos SET nombre = ?, apellidos = ?, fecha_nac = ?, telefono = ?, celular = ?, direccion = ?, email = ?, aporte = ? WHERE cc = ?  AND hoja_de_vida_id = ?  AND hoja_de_vida_organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($padrino->nombre);
		$sqlQuery->set($padrino->apellidos);
		$sqlQuery->set($padrino->fechaNac);
		$sqlQuery->set($padrino->telefono);
		$sqlQuery->set($padrino->celular);
		$sqlQuery->set($padrino->direccion);
		$sqlQuery->set($padrino->email);
		$sqlQuery->setNumber($padrino->aporte);

		
		$sqlQuery->setNumber($padrino->cc);

		$sqlQuery->setNumber($padrino->hojaDeVidaId);

		$sqlQuery->setNumber($padrino->hojaDeVidaOrganizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM padrinos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM padrinos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidos($value){
		$sql = 'SELECT * FROM padrinos WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaNac($value){
		$sql = 'SELECT * FROM padrinos WHERE fecha_nac = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM padrinos WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCelular($value){
		$sql = 'SELECT * FROM padrinos WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM padrinos WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM padrinos WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAporte($value){
		$sql = 'SELECT * FROM padrinos WHERE aporte = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM padrinos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidos($value){
		$sql = 'DELETE FROM padrinos WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaNac($value){
		$sql = 'DELETE FROM padrinos WHERE fecha_nac = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM padrinos WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCelular($value){
		$sql = 'DELETE FROM padrinos WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM padrinos WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM padrinos WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAporte($value){
		$sql = 'DELETE FROM padrinos WHERE aporte = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PadrinosMySql 
	 */
	protected function readRow($row){
		$padrino = new Padrino();
		
		$padrino->cc = $row['cc'];
		$padrino->nombre = $row['nombre'];
		$padrino->apellidos = $row['apellidos'];
		$padrino->fechaNac = $row['fecha_nac'];
		$padrino->telefono = $row['telefono'];
		$padrino->celular = $row['celular'];
		$padrino->direccion = $row['direccion'];
		$padrino->email = $row['email'];
		$padrino->aporte = $row['aporte'];
		$padrino->hojaDeVidaId = $row['hoja_de_vida_id'];
		$padrino->hojaDeVidaOrganizacionIdorganizacion = $row['hoja_de_vida_organizacion_idorganizacion'];

		return $padrino;
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
	 * @return PadrinosMySql 
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