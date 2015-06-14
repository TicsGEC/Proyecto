<?php
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/addform.php');
require_once ($CFG->dirroot . '/local/proyecto/tabla.php');
global $PAGE, $CFG, $OUTPUT, $DB, $USER;
$url = new moodle_url ( '/local/proyecto/elecciones.php' );
$context = context_system::instance ();
$PAGE->set_url ( $url );
$PAGE->set_context ( $context );
$PAGE->set_pagelayout ( 'standard' );
$PAGE->set_heading ( 'GEC' );
$PAGE->navbar->add ( 'Busqueda de Cursos' );
$PAGE->navbar->add ( 'INDEX' );
echo $OUTPUT->header ('Mis Elecciones');
echo $OUTPUT->heading ('Mis Elecciones');

$myuser=$USER->id;
//Busca los Datos añadidos al carro de compra según el ID
$elecciones= $DB->get_records('elecciones',array('userid'=>$myuser));

//Si encuentra datos los despliega
if($elecciones!=null)
{
	
	$tablaelecciones= tablas::armartabla($elecciones);
	echo html_writer::table($tablaelecciones);
	
	$head=array(' ');
	$data=array($OUTPUT->single_button('index.php','Volver a Mis Opciones'));
	$tabla2= tablas::armarbusqueda($data);
	echo html_writer::table($tabla2);
	
}


//SI no encuentra los datos
else 
{
	
	echo "Usted no tiene ninguna eleccion hasta el momento";
	$head=array(' ');
	$data=array($OUTPUT->single_button('index.php','Volver a Mis Opciones'));
	$tabla2= tablas::armarbusqueda($data);
	echo html_writer::table($tabla2);
	
}


echo $OUTPUT->footer();


?>