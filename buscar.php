<?php
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/searchform.php');
require_once ($CFG->dirroot . '/local/proyecto/tabla.php');
global $PAGE, $CFG, $OUTPUT, $DB, $USER;
 require_login ();
$url = new moodle_url ( '/local/proyecto/buscar.php' );
$context = context_system::instance ();
$PAGE->set_url ( $url );
$PAGE->set_context ( $context );
$PAGE->set_pagelayout ( 'standard' );
$PAGE->set_heading ( 'GEC' );
$PAGE->navbar->add ( 'Busqueda de Cursos' );
$PAGE->navbar->add ( 'INDEX' );
echo $OUTPUT->header ();
echo $OUTPUT->heading ( 'Buscador' );


$formulario = new formu();


if ($formulario->is_cancelled()) {
	
	echo 'Usted no ingreso comentarios'."</br>"."</br>";
	$head=array(' ',' ');
	$data=array($OUTPUT->single_button('buscar.php','Volver a Buscar'),$OUTPUT->single_button('index.php','Volver a Mis Opciones'));
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
	 
$archivos= $DB->get_records('local_proyecto',array('asignatura'=>$fromforms->asignatura,'pais'=>$fromforms->pais,'seccion'=>$fromforms->seccion,'contenido'=>$fromforms->contenido,'tipoderecursos'=>$fromforms->recurso));




if ($archivos !=NULL){
	$myuser=$USER->id;
	
	$tabla= tablas::armartabla($archivos);
	echo html_writer::table($tabla);
	
     echo $OUTPUT->single_button('buscar.php','Volver a Buscar');
    
	
	} 
	
       
       
else
{
	echo "No se han encontrado Archivos";
             $head=array(' ',' ');
	$data=array($OUTPUT->single_button('buscar.php','Volver a Buscar'),$OUTPUT->single_button('index.php','Volver a Mis Opciones'));
	$tabla2= tablas::armarbusqueda($data);
	echo html_writer::table($tabla2);    }
       }



else 
{
	
	$formulario->display();
}





echo $OUTPUT->footer ();

?>