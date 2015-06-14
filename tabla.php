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
		global $DB, $OUTPUT;
		$tabla = new html_table();
		$tabla->head = array('Asignatura','Pais','Seccion','Contenido','Tipo de Recursos','Nombre de Archivo','  ');
		echo"<form method=POST'>";
		foreach ($archivos as $archivo){
			$recordd = new stdClass();
	$recordd->asignatura =$archivo->asignatura ;
	 $recordd->pais = $archivo->pais;
	$recordd->seccion = $archivo->seccion;
	 $recordd->contenido = $archivo->contenido;
	 $recordd->tipoderecursos = $archivo->recurso;
   $recordd->nombredearchivo = $archivo->nombredearchivo;
    $recordd->userid=$myuser;
    
$action = optional_param('añadir',' ', PARAM_TEXT);
			$tabla->data[] = array($archivo->asignatura,$archivo->pais,$archivo->seccion,$archivo->contenido,$archivo->tipoderecursos,$archivo->nombredearchivo,$OUTPUT->single_button(' ','Añadir'));
		
		if ($action=='anadir'){
			
			$DB->insert_record('elecciones',$recordd);
		}
		}
		
		return $tabla;
		
	}
	
	public static function armarbusqueda($data){
		global $DB, $OUTPUT;
		$tabla2 = new html_table();
		$tabla2->head =$head;
		
			$tabla2->data[] = $data;
	
	
	
		return $tabla2;
	
}
}