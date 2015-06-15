<?php
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/tabla.php');
global $PAGE, $CFG, $OUTPUT, $DB, $USER;
require_login ();
$context = context_system::instance ();
$PAGE->set_context ( $context );
$PAGE->set_pagelayout ( 'standard' );
$PAGE->set_heading ( 'GEC' );
$PAGE->navbar->add ( 'Record' );
$PAGE->navbar->add ( 'INDEX' );
echo $OUTPUT->header ();
echo $OUTPUT->heading ( 'Record' );


$recordd = new stdClass();
$recordd->seccion = required_param ( 'seccion', PARAM_TEXT );
$recordd->nombredearchivo = required_param ( 'nombredearchivo', PARAM_TEXT);
$recordd->asignatura = required_param ( 'asignatura', PARAM_TEXT );
$recordd->contenido = required_param ( 'contenido', PARAM_TEXT );
$recordd->pais = required_param ( 'pais', PARAM_TEXT );
$recordd->tipoderecursos = required_param ( 'tipoderecursos', PARAM_TEXT );
$recordd->userid= required_param('userid', PARAM_TEXT);



$DB->delete_records('elecciones', array('userid'=>required_param ( 'userid', PARAM_TEXT ),'seccion'=>required_param ( 'seccion', PARAM_TEXT ),'nombredearchivo'=>required_param ( 'nombredearchivo', PARAM_TEXT ),'asignatura'=>required_param ( 'asignatura', PARAM_TEXT ),'contenido'=>required_param ( 'contenido', PARAM_TEXT ),'tipoderecursos'=>required_param ( 'tipoderecursos', PARAM_TEXT ),'pais'=>required_param ( 'pais', PARAM_TEXT )));


echo "Entradas Borradas Exitosamente"."</br>";
$head=array(' ');
$data=array($OUTPUT->single_button('elecciones.php','Volver a Mis Elecciones'));
$tabla2= tablas::armarbusqueda($data);
echo html_writer::table($tabla2);



echo $OUTPUT->footer ();


?>
