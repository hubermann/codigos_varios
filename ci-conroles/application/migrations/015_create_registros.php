<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Registros extends CI_Migration
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
					"usuario_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"evento_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"pago"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"neto"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
					"comision"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
					"asistio"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"confirmado"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"created_at"    		=>        array(
                    "type"                =>        "DATETIME"
                ),
	
					"updated_at"    		=>        array(
                    "type"                =>        "DATETIME",
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('registros');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('registros');
 
    }
}
?>
