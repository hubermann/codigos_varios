<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Eventos_tipos extends CI_Migration
{
    public function up()
    {
        //TABLA
        $this->dbforge->add_field(
            array(
                "id"        =>        array(
                    "type"                =>        "INT",
                    "constraint"        =>        11,
                    "unsigned"            =>        true,
                    "auto_increment"    =>        true,

                ),
                "user_id"        =>        array(
                    "type"                =>        "INT",
                    "constraint"        =>        11

                ),
                "evento_id"        =>        array(
                    "type"                =>        "INT",
                    "constraint"        =>        11

                ),

            )
        );

        $this->dbforge->add_key('id', true); //ID como primary_key
        $this->dbforge->create_table('eventos_tipos');//crea la tabla
    }

    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('eventos_tipos');
    }
}
