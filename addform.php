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
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.
// a
/**
 *
* @package local
* @subpackage reservasalas
* @copyright 2014 Francisco GarcÃ­a Ralph (francisco.garcia.ralph@gmail.com)
*            NicolÃ¡s BaÃ±ados Valladares (nbanados@alumnos.uai.cl)
* @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/
require_once (dirname ( __FILE__ ) . '/../../config.php');
require_once ("$CFG->libdir/formslib.php");
class formu extends moodleform {
	function definition() {
		global $CFG, $OUTPUT;
		$mform = $this->_form;
		
		
		
		// Arreglos que contienen datos de select
		$options0 = array (
				'Matematicas' => 'Matematicas',
				'Lenguaje' => 'Lenguaje',
				'Ciencias Naturales' => 'Ciencias Naturales',
				'Historia' => 'Ciencias Sociales'
		);
		$options1 = array (
				'Chile' => 'Chile',
				'Argentina' => 'Argentina',
				'Peru' => 'Peru'
		);
		
		$options4 = array (
				'1' => '1',
				'2' => '2',
				'3' => '3'
		);
		
		$options6 = array (
				'Cont1' => 'Contenido1',
				'Cont2' => 'Contenido2',
				'Cont3' => 'Contenido3'
		);
		$options7 = array (
				'Audio' => 'Audio',
				'Video' => 'Video',
				'Texto' => 'Texto'
		);
	
		// Creacion de selects
		$mform->addElement ( 'static', 'description', get_string ( 'FILTRO DE CONTEXTO', 'exercise' ), get_string ( '', 'exercise', $COURSE->students ) );
		$mform->addElement ( 'select', 'asignatura', "Asignatura", $options0 );
		$mform->addElement ( 'select', 'pais', "Pais", $options1 );
		$mform->addElement ( 'select', 'seccion', "Seccion", $options4 );
		$mform->addElement ( 'select', 'contenido', "Contenido", $options6 );
		$mform->addElement ( 'select', 'recurso', "Tipo de Recurso", $options7 );
		$mform->addElement ('text','nombre',"Nombre de Archivo");
		$this->add_action_buttons ( true, 'Enviar');
	}
}


class check extends moodleform {
	function definition() {
		global $CFG;
		$mform = $this->_form;
		
	}
}
		
?>