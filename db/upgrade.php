 <?php
 function xmldb_local_proyecto_upgrade($oldversion) {
 	global $CFG, $DB;
 	
 	if ($oldversion < 2015061301){
 		  $field = new xmldb_field('nombredearchivo', XMLDB_TYPE_CHAR, '1333', null, XMLDB_NOTNULL, null, null, 'seccion');
 	}
    if ($oldversion <2015061300 ) {

        // Define field id to be added to local_proyecto.
        $table = new xmldb_table('local_proyecto');
        $field = new xmldb_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);

        // Conditionally launch add field id.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Proyecto savepoint reached.
        upgrade_plugin_savepoint(true, 2015061300, 'local', 'proyecto');
    }
 }
 return true;