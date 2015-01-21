<?php
/**
 * Class that operate on table 'hoja_de_vida'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-01-21 03:18
 */
class HojaDeVidaMySqlDAO implements HojaDeVidaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HojaDeVidaMySql 
	 */
	public function load($id, $organizacionIdorganizacion){
		$sql = 'SELECT * FROM hoja_de_vida WHERE id = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM hoja_de_vida';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM hoja_de_vida ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param hojaDeVida primary key
 	 */
	public function delete($id, $organizacionIdorganizacion){
		$sql = 'DELETE FROM hoja_de_vida WHERE id = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HojaDeVidaMySql hojaDeVida
 	 */
	public function insert($hojaDeVida){
		$sql = 'INSERT INTO hoja_de_vida (nombres, apellidos, fecha_nac, edad, email, direccion, cc, godson, telefono, id, organizacion_idorganizacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($hojaDeVida->nombres);
		$sqlQuery->set($hojaDeVida->apellidos);
		$sqlQuery->set($hojaDeVida->fechaNac);
		$sqlQuery->set($hojaDeVida->edad);
		$sqlQuery->set($hojaDeVida->email);
		$sqlQuery->set($hojaDeVida->direccion);
		$sqlQuery->set($hojaDeVida->cc);
		$sqlQuery->set($hojaDeVida->godson);
		$sqlQuery->set($hojaDeVida->telefono);

		
		$sqlQuery->setNumber($hojaDeVida->id);

		$sqlQuery->setNumber($hojaDeVida->organizacionIdorganizacion);

		$this->executeInsert($sqlQuery);	
		//$hojaDeVida->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HojaDeVidaMySql hojaDeVida
 	 */
	public function update($hojaDeVida){
		$sql = 'UPDATE hoja_de_vida SET nombres = ?, apellidos = ?, fecha_nac = ?, edad = ?, email = ?, direccion = ?, cc = ?, godson = ?, telefono = ? WHERE id = ?  AND organizacion_idorganizacion = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($hojaDeVida->nombres);
		$sqlQuery->set($hojaDeVida->apellidos);
		$sqlQuery->set($hojaDeVida->fechaNac);
		$sqlQuery->set($hojaDeVida->edad);
		$sqlQuery->set($hojaDeVida->email);
		$sqlQuery->set($hojaDeVida->direccion);
		$sqlQuery->set($hojaDeVida->cc);
		$sqlQuery->set($hojaDeVida->godson);
		$sqlQuery->set($hojaDeVida->telefono);

		
		$sqlQuery->setNumber($hojaDeVida->id);

		$sqlQuery->setNumber($hojaDeVida->organizacionIdorganizacion);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM hoja_de_vida';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombres($value){
		$sql = 'SELECT * FROM hoja_de_vida WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidos($value){
		$sql = 'SELECT * FROM hoja_de_vida WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaNac($value){
		$sql = 'SELECT * FROM hoja_de_vida WHERE fecha_nac = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEdad($value){
		$sql = 'SELECT * FROM hoja_de_vida WHERE edad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM hoja_de_vida WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM hoja_de_vida WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCc($value){
		$sql = 'SELECT * FROM hoja_de_vida WHERE cc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGodson($value){
		$sql = 'SELECT * FROM hoja_de_vida WHERE godson = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM hoja_de_vida WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombres($value){
		$sql = 'DELETE FROM hoja_de_vida WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidos($value){
		$sql = 'DELETE FROM hoja_de_vida WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaNac($value){
		$sql = 'DELETE FROM hoja_de_vida WHERE fecha_nac = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEdad($value){
		$sql = 'DELETE FROM hoja_de_vida WHERE edad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM hoja_de_vida WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM hoja_de_vida WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCc($value){
		$sql = 'DELETE FROM hoja_de_vida WHERE cc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGodson($value){
		$sql = 'DELETE FROM hoja_de_vida WHERE godson = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM hoja_de_vida WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HojaDeVidaMySql 
	 */
	protected function readRow($row){
		$hojaDeVida = new HojaDeVida();
		
		$hojaDeVida->id = $row['id'];
		$hojaDeVida->nombres = $row['nombres'];
		$hojaDeVida->apellidos = $row['apellidos'];
		$hojaDeVida->fechaNac = $row['fecha_nac'];
		$hojaDeVida->edad = $row['edad'];
		$hojaDeVida->email = $row['email'];
		$hojaDeVida->direccion = $row['direccion'];
		$hojaDeVida->cc = $row['cc'];
		$hojaDeVida->godson = $row['godson'];
		$hojaDeVida->telefono = $row['telefono'];
		$hojaDeVida->organizacionIdorganizacion = $row['organizacion_idorganizacion'];

		return $hojaDeVida;
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
	 * @return HojaDeVidaMySql 
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