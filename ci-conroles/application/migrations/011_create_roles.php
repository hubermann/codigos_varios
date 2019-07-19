<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Roles extends CI_Migration
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
	
					"nombre"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        60,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('roles');//crea la tabla
        //creamos role
        $data_roles = array(
            "nombre"        =>        "Superadmin"
        );
        $this->db->insert("roles", $data_roles);
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('roles');
 
    }
}
?>
