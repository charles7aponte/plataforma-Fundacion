<?php
/**
 * Class that operate on table 'egresos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-16 05:12
 */
class EgresosMySqlDAO implements EgresosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgresosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egresos WHERE idegresos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egresos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egresos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
        
        
               //comprobante egresos
        public function queryById($id){
            $sql = 'SELECT * FROM egresos WHERE idegresos = ?';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($id);
            return $this->getRow($sqlQuery);
        }
  ///
        
	
	/**
 	 * Delete record from table
 	 * @param egreso primary key
 	 */
	public function delete($idegresos){
		$sql = 'DELETE FROM egresos WHERE idegresos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idegresos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgresosMySql egreso
 	 */
	public function insert($egreso){
		$sql = 'INSERT INTO egresos (ciudad, fecha, valor, pagado_a, concepto_de, modalidad, beneficiario, cc, forma_pago, aprobado, organizacion_idorganizacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreso->ciudad);
		$sqlQuery->set($egreso->fecha);
		$sqlQuery->setNumber($egreso->valor);
		$sqlQuery->set($egreso->pagadoA);
		$sqlQuery->set($egreso->conceptoDe);
		$sqlQuery->set($egreso->modalidad);
		$sqlQuery->set($egreso->beneficiario);
		$sqlQuery->set($egreso->cc);
		$sqlQuery->setNumber($egreso->formaPago);
		$sqlQuery->set($egreso->aprobado);
		$sqlQuery->setNumber($egreso->organizacionIdorganizacion);

		$id = $this->executeInsert($sqlQuery);	
		$egreso->idegresos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgresosMySql egreso
 	 */
	public function update($egreso){
		$sql = 'UPDATE egresos SET ciudad = ?, fecha = ?, valor = ?, pagado_a = ?, concepto_de = ?, modalidad = ?, beneficiario = ?, cc = ?, forma_pago = ?, aprobado = ?, organizacion_idorganizacion = ? WHERE idegresos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreso->ciudad);
		$sqlQuery->set($egreso->fecha);
		$sqlQuery->setNumber($egreso->valor);
		$sqlQuery->set($egreso->pagadoA);
		$sqlQuery->set($egreso->conceptoDe);
		$sqlQuery->set($egreso->modalidad);
		$sqlQuery->set($egreso->beneficiario);
		$sqlQuery->set($egreso->cc);
		$sqlQuery->setNumber($egreso->formaPago);
		$sqlQuery->set($egreso->aprobado);
		$sqlQuery->setNumber($egreso->organizacionIdorganizacion);

		$sqlQuery->setNumber($egreso->idegresos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egresos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}
        
        
        

        //////////////////////////
        public function queryByMes($mes_inicial, $mes_final) {
            $where = "";

            if ($mes_inicial != "" && $mes_final != "") {
                $where = $where . 'e.fecha BETWEEN STR_TO_DATE("' . $mes_inicial . '", "%Y-%m-%d")  AND STR_TO_DATE("' . $mes_final . '", "%Y-%m-%d") AND MONTH(e.fecha) BETWEEN MONTH("' . $mes_inicial . '") AND MONTH("' . $mes_final . '")';
            }
            if ($where == "")
                $sql = "SELECT MONTH(e.fecha) mes, YEAR(e.fecha) year ,sum(e.valor) valor
                          FROM egresos e"
                        . " GROUP BY MONTH(e.fecha)";
            else {
                $sql = "SELECT MONTH(e.fecha) mes, YEAR(e.fecha) year ,sum(e.valor) valor
                          FROM egresos e WHERE " . $where
                        . " GROUP BY MONTH(e.fecha)";
            }
            $sqlQuery = new SqlQuery($sql);
            $tab = QueryExecutor::execute($sqlQuery);
            return $tab;
        }

        ////////////////////////////

        public function queryByFechasDetalle($where) {
            if ($where != "")
                $sql = 'SELECT * FROM egresos WHERE ' . $where;
            else
                $sql = 'SELECT * FROM egresos';

            $sqlQuery = new SqlQuery($sql);
            $tab = QueryExecutor::execute($sqlQuery);
            return $tab;
        }
        

	public function queryByCiudad($value){
		$sql = 'SELECT * FROM egresos WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM egresos WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM egresos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPagadoA($value){
		$sql = 'SELECT * FROM egresos WHERE pagado_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConceptoDe($value){
		$sql = 'SELECT * FROM egresos WHERE concepto_de = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModalidad($value){
		$sql = 'SELECT * FROM egresos WHERE modalidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBeneficiario($value){
		$sql = 'SELECT * FROM egresos WHERE beneficiario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCc($value){
		$sql = 'SELECT * FROM egresos WHERE cc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormaPago($value){
		$sql = 'SELECT * FROM egresos WHERE forma_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAprobado($value){
		$sql = 'SELECT * FROM egresos WHERE aprobado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrganizacionIdorganizacion($value){
		$sql = 'SELECT * FROM egresos WHERE organizacion_idorganizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCiudad($value){
		$sql = 'DELETE FROM egresos WHERE ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM egresos WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM egresos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPagadoA($value){
		$sql = 'DELETE FROM egresos WHERE pagado_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConceptoDe($value){
		$sql = 'DELETE FROM egresos WHERE concepto_de = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModalidad($value){
		$sql = 'DELETE FROM egresos WHERE modalidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBeneficiario($value){
		$sql = 'DELETE FROM egresos WHERE beneficiario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCc($value){
		$sql = 'DELETE FROM egresos WHERE cc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormaPago($value){
		$sql = 'DELETE FROM egresos WHERE forma_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAprobado($value){
		$sql = 'DELETE FROM egresos WHERE aprobado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrganizacionIdorganizacion($value){
		$sql = 'DELETE FROM egresos WHERE organizacion_idorganizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgresosMySql 
	 */
	protected function readRow($row){
		$egreso = new Egreso();
		
		$egreso->idegresos = $row['idegresos'];
		$egreso->ciudad = $row['ciudad'];
		$egreso->fecha = $row['fecha'];
		$egreso->valor = $row['valor'];
		$egreso->pagadoA = $row['pagado_a'];
		$egreso->conceptoDe = $row['concepto_de'];
		$egreso->modalidad = $row['modalidad'];
		$egreso->beneficiario = $row['beneficiario'];
		$egreso->cc = $row['cc'];
		$egreso->formaPago = $row['forma_pago'];
		$egreso->aprobado = $row['aprobado'];
		$egreso->organizacionIdorganizacion = $row['organizacion_idorganizacion'];

		return $egreso;
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
	 * @return EgresosMySql 
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