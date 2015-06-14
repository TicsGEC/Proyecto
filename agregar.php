<?php
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/addform.php');
require_once ($CFG->dirroot . '/local/proyecto/tabla.php');
global $PAGE, $CFG, $OUTPUT, $DB, $USER;
 
require_login ();

 
 $url = new moodle_url ( '/local/proyecto/agregar.php' );
$context = context_system::instance ();
$PAGE->set_url ( $url );
$PAGE->set_context ( $context );
$PAGE->set_pagelayout ( 'standard' );
$PAGE->set_heading ( 'GEC' );
$PAGE->navbar->add ( 'Busqueda de Cursos' );
$PAGE->navbar->add ( 'INDEX' );
echo $OUTPUT->header ('Ingreso de Datos');
echo $OUTPUT->heading ( 'Ingreso de Datos' );



$formulario = new formu();
if ($formulario->is_cancelled()) {
	echo 'Usted no Ingreso Datos'."</br>"."</br>";
	
	$head=array(' ',' ');
	$data=array($OUTPUT->single_button('agregar.php','Volver a Ingresar'),$OUTPUT->single_button('index.php','Volver a Mis Opciones'));
	$tabla2= tablas::armarbusqueda($data);
	echo html_writer::table($tabla2);
	
}

 else if ($fromforms = $formulario->get_data()) {
	$record = new stdClass();
	$record->asignatura =$fromforms->asignatura ;
	 $record->pais = $fromforms->pais;
	$record->seccion = $fromforms->seccion;
	 $record->contenido = $fromforms->contenido;
	 $record->tipoderecursos = $fromforms->recurso;
$record->nombredearchivo = $fromforms->nombre;
 $lastinsertid= $DB->insert_record('local_proyecto',$record);

 echo "Datos Guardados Correctamente"."</br>";
 $head=array(' ',' ');
 $data=array($OUTPUT->single_button('agregar.php','Volver a Ingresar'),$OUTPUT->single_button('index.php','Volver a Mis Opciones'));
 $tabla2= tablas::armarbusqueda($data);
 echo html_writer::table($tabla2);

 } 


else {
	$formulario->display();
}




echo $OUTPUT->footer ();
?>