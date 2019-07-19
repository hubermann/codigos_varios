<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Eventos extends CI_Migration
{
    public function up()
    {
        //TABLA 
        $this->dbforge->add_field(
            array(
                "id"        =>        array(
                    "type"                =>        "INT",
                    "constraint"        =>        11,
                    "unsigned"            =>        TRUE,
                    "auto_increment"    =>        TRUE,
 
                ),
					"categoria_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"fecha"    		=>        array(
                    "type"                =>        "DATE",
                ),
	
					"hora"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        20,
                ),
	
					"lugar"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        150,
                ),
	
					"precio"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
					"precio_hombres"    		=>   array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
					"edad_minima"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        2,
                ),
	
					"edad_maxima"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        2,
                ),
	
					"edad_minina_hombre"   =>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        2,
                ),
	
					"edad_maxima_hombre"    =>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        2,
                ),
	
					"estado_hombres"  =>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"estado_mujeres"    =>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"coincidencias_habilitadas"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        2,
                ),
	
					"tipo_evento"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"localidad"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"duracion_session"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        3,
                ),
	
					"created_at"    		=>        array(
                    "type"                =>        "TIMESTAMP",
                ),
	
					"updated_at"    		=>        array(
                    "type"                =>        "DATETIME",
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('eventos');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('eventos');
 
    }
}
?>
