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


// En caso de no enviarse el Formulario
if ($formulario->is_cancelled())
 {
	echo 'Usted no Ingreso Datos'."</br>"."</br>";
	
	//Crea tabla con los Botones para Volver
	$head=array(' ',' ');
	$data=array($OUTPUT->single_button('agregar.php','Volver a Ingresar'),$OUTPUT->single_button('index.php','Volver a Mis Opciones'));
	$tabla2= tablas::armarbusqueda($data);
	echo html_writer::table($tabla2);
	
}

//En caso de enviarse el formulario

 else if ($fromforms = $formulario->get_data()) {
 	
 	//Si el nombre del archivo no es nulo
 	if($fromforms->nombre != null)
 	{
 		
	$record = new stdClass();
	$record->asignatura =$fromforms->asignatura ;
	 $record->pais = $fromforms->pais;
	$record->seccion = $fromforms->seccion;
	 $record->contenido = $fromforms->contenido;
	 $record->tipoderecursos = $fromforms->recurso;
$record->nombredearchivo = $fromforms->nombre;

$cont= $DB->count_records('local_proyecto',array('asignatura'=>$fromforms->asignatura,'pais'=>$fromforms->pais,'seccion'=>$fromforms->seccion,'contenido'=>$fromforms->contenido,'tipoderecursos'=>$fromforms->recurso,'nombredearchivo'=>$fromforms->nombre));

 //Cuenta en la base de datos si ya existe esa entrada, en caso de existir No deja ingresar Datos
 If($cont==0)
 {
 	$lastinsertid= $DB->insert_record('local_proyecto',$record);
 echo "Datos Guardados Correctamente"."</br>";
 $head=array(' ',' ');
 $data=array($OUTPUT->single_button('agregar.php','Volver a Ingresar'),$OUTPUT->single_button('index.php','Volver a Mis Opciones'));
 $tabla2= tablas::armarbusqueda($data);
 echo html_writer::table($tabla2);
 }

 
 
 //Si detecto que ya existe en la base de datos
 else 
 {
 	echo 'Entrada Duplicada, Pruebe con otro Nombre'."</br>"."</br>";
 		
 	$head=array(' ',' ');
 	$data=array($OUTPUT->single_button('agregar.php','Volver a Ingresar'),$OUTPUT->single_button('index.php','Volver a Mis Opciones'));
 	$tabla2= tablas::armarbusqueda($data);
 	echo html_writer::table($tabla2);
 }
  
 	}
 	
 	
 	//En caso de no Escribirse Nada en el Campo de Nombre de archivo
 	else 
 	{
 		echo 'Tiene que Ingresar Nombre de Archivo'."</br>"."</br>";
 		
 		$head=array(' ',' ');
 		$data=array($OUTPUT->single_button('agregar.php','Volver a Ingresar'),$OUTPUT->single_button('index.php','Volver a Mis Opciones'));
 		$tabla2= tablas::armarbusqueda($data);
 		echo html_writer::table($tabla2);
 	}

 } 

// Despliega el formulario 
else {
	$formulario->display();
}




echo $OUTPUT->footer ();
?>