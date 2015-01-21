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
	 * @return CategoriaDAO
	 */
	public static function getCategoriaDAO(){
		return new CategoriaMySqlExtDAO();
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
	 * @return InventariosDAO
	 */
	public static function getInventariosDAO(){
		return new InventariosMySqlExtDAO();
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
	 * @return RolesDAO
	 */
	public static function getRolesDAO(){
		return new RolesMySqlExtDAO();
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