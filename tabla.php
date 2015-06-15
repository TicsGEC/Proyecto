<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
require_once (dirname ( __FILE__ ) . '/../../config.php');
require_once ("$CFG->libdir/formslib.php");

defined('MOODLE_INTERNAL') || die();
class tablas{
	
	public static function armartabla($archivos=null){
		global $DB, $OUTPUT, $USER;
		
		$tabla = new html_table();
		$tabla->head = array('Asignatura','Pais','Seccion','Contenido','Tipo de Recursos','Nombre de Archivo','  ');
		
		foreach ($archivos as $archivo){
    $urll = new moodle_url ( '/local/proyecto/record.php',array('asignatura'=>$archivo->asignatura,'pais'=>$archivo->pais,'seccion'=>$archivo->seccion,'contenido'=>$archivo->contenido,'tipoderecursos'=>$archivo->tipoderecursos,'nombredearchivo'=>$archivo->nombredearchivo,'userid'=>$USER->id));
			$tabla->data[] = array($archivo->asignatura,$archivo->pais,$archivo->seccion,$archivo->contenido,$archivo->tipoderecursos,$archivo->nombredearchivo,$OUTPUT->single_button($urll,'Añadir'));
		
		}
		
		return $tabla;
		
	}
	
	public static function armarbusqueda($data){
		global $DB, $OUTPUT, $USER;
		$tabla2 = new html_table();
		$tabla2->head =$head;
		
			$tabla2->data[] = $data;
	
	
	
		return $tabla2;
	
}


public static function armareleccion($elecciones=null){
	global $DB, $OUTPUT, $USER;
	$tablae = new html_table();
	$tablae->head = array('Asignatura','Pais','Seccion','Contenido','Tipo de Recursos','Nombre de Archivo','  ');
	
	foreach ($elecciones as $eleccion)
	{

		$urldel = new moodle_url ( '/local/proyecto/del.php',array('asignatura'=>$eleccion->asignatura,'pais'=>$eleccion->pais,'seccion'=>$eleccion->seccion,'contenido'=>$eleccion->contenido,'tipoderecursos'=>$eleccion->tipoderecursos,'nombredearchivo'=>$eleccion->nombredearchivo,'userid'=>$USER->id));
		
	 $tablae->data[] = array($eleccion->asignatura,$eleccion->pais,$eleccion->seccion,$eleccion->contenido,$eleccion->tipoderecursos,$eleccion->nombredearchivo,$OUTPUT->single_button($urldel,'Eliminar'));

	}

	return $tablae;

 }


   }