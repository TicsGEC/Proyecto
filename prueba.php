<?php
require_once(dirname(__FILE__) . '/../../config.php'); //obligatorio
global $PAGE, $CFG, $OUTPUT, $DB, $USER;
$url = new moodle_url('/local/proyecto/prueba.php');
$context = context_system::instance();
$PAGE->set_url($url);
$PAGE->set_context($context);
$PAGE->set_pagelayout('standard');
$PAGE->set_heading('Titulo');
$PAGE->navbar->add('Titulo');
$PAGE->navbar->add('index');
echo $OUTPUT->header();
echo $OUTPUT->heading('RESULTADO ALPHA');
$formulario -> get_data();
if($fromforms = $formulario->get_data()){
$record = new stdClass();
echo $record->asignatura = $fromforms->asignatura ;
echo ("<br>");
echo $record->pais = $fromforms->pais;
echo ("<br>");
echo $record->plataforma = $fromforms->plataforma;
echo ("<br>");
echo $record->grado = $fromforms->grado;
echo ("<br>");
echo $record->seccion = $fromforms->seccion;
echo ("<br>");
echo $record->eje = $fromforms->eje;
echo ("<br>");
echo $record->contenido = $fromforms->contenido;
echo ("<br>");
echo $record->recurso = $fromforms->recurso;
echo ("<br>");
echo $record->estilo = $fromforms->estilo;
echo ("<br>");
echo $record->localizacion = $fromforms->localizacion;
echo ("<br>");
echo $record->responsive = $fromforms->responsive;
echo ("<br>");
echo $record->skin = $fromforms->skin;
echo ("<br>");
}

echo $OUTPUT->footer();
?>