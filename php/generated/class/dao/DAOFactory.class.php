<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AsistenteDAO
	 */
	public static function getAsistenteDAO(){
		return new AsistenteMySqlExtDAO();
	}

	/**
	 * @return AsistenteEventosDAO
	 */
	public static function getAsistenteEventosDAO(){
		return new AsistenteEventosMySqlExtDAO();
	}

	/**
	 * @return CategoriaDAO
	 */
	public static function getCategoriaDAO(){
		return new CategoriaMySqlExtDAO();
	}

	/**
	 * @return ChequeDAO
	 */
	public static function getChequeDAO(){
		return new ChequeMySqlExtDAO();
	}

	/**
	 * @return DetalleChequeDAO
	 */
	public static function getDetalleChequeDAO(){
		return new DetalleChequeMySqlExtDAO();
	}

	/**
	 * @return DonacionesDAO
	 */
	public static function getDonacionesDAO(){
		return new DonacionesMySqlExtDAO();
	}

	/**
	 * @return EgresosDAO
	 */
	public static function getEgresosDAO(){
		return new EgresosMySqlExtDAO();
	}

	/**
	 * @return ElementosDAO
	 */
	public static function getElementosDAO(){
		return new ElementosMySqlExtDAO();
	}

	/**
	 * @return EventosDAO
	 */
	public static function getEventosDAO(){
		return new EventosMySqlExtDAO();
	}

	/**
	 * @return HojaDeVidaDAO
	 */
	public static function getHojaDeVidaDAO(){
		return new HojaDeVidaMySqlExtDAO();
	}

	/**
	 * @return IngresosDAO
	 */
	public static function getIngresosDAO(){
		return new IngresosMySqlExtDAO();
	}

	/**
	 * @return ModulosDAO
	 */
	public static function getModulosDAO(){
		return new ModulosMySqlExtDAO();
	}

	/**
	 * @return OrganizacionDAO
	 */
	public static function getOrganizacionDAO(){
		return new OrganizacionMySqlExtDAO();
	}

	/**
	 * @return PadrinosDAO
	 */
	public static function getPadrinosDAO(){
		return new PadrinosMySqlExtDAO();
	}

	/**
	 * @return PadrinosDonacionesDAO
	 */
	public static function getPadrinosDonacionesDAO(){
		return new PadrinosDonacionesMySqlExtDAO();
	}

	/**
	 * @return RetiristasDAO
	 */
	public static function getRetiristasDAO(){
		return new RetiristasMySqlExtDAO();
	}

	/**
	 * @return RetiristasRetirosDAO
	 */
	public static function getRetiristasRetirosDAO(){
		return new RetiristasRetirosMySqlExtDAO();
	}

	/**
	 * @return RetirosDAO
	 */
	public static function getRetirosDAO(){
		return new RetirosMySqlExtDAO();
	}

	/**
	 * @return UsuarioDAO
	 */
	public static function getUsuarioDAO(){
		return new UsuarioMySqlExtDAO();
	}

	/**
	 * @return UsuarioHasModulosDAO
	 */
	public static function getUsuarioHasModulosDAO(){
		return new UsuarioHasModulosMySqlExtDAO();
	}


}
?>