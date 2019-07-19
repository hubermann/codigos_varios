<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Notas extends CI_Migration
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
					"titulo"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),


					"categoria_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"descripcion"    		=>        array(
                    "type"                =>        "TEXT"
                ),
	
					"fecha_desde"    		=>        array(
                    "type"                =>        "DATE"
                ),
	
					"fecha_hasta"    		=>        array(
                    "type"                =>        "DATE"
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('notas');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('notas');
 
    }
}
?>
