<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Usuarios extends CI_Migration
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
					"nickname"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        120,
                ),
	
					"password"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"salt"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        80,
                ),
	
					"email"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        120,
                ),
	
					"apellido"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        60,
                ),
	
					"nombre"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        60,
                ),
	
					"dni"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        25,
                ),
	
					"sexo"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        20,
                ),
	
					"nacimiento"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        80,
                ),
	
					"edad"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        10,
                ),
	
					"telcontacto"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        40,
                ),
	
					"barrio"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"calle"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"numero"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        20,
                ),
	
					"piso"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        20,
                ),
	
					"depto"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        20,
                ),
	
					"conocio"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"profesion"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"localidad"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"fuma"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        1,
                ),
	
					"toma"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        1,
                ),
	
					"descripcion"    		=>        array(
                    "type"                =>        "TEXT"
                ),
	
					"telcelular"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        80,
                ),
	
					"estado_civil"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        1,
                ),
	
					"educacion"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        1,
                ),
	
					"provincia"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        50,
                ),
	
					"zodiaco"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        20,
                ),
	
					"busco"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        2,
                ),
	
					"ocupacion"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        120,
                ),
	
					"celular_cia"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        80,
                ),
	
					"tel_citas"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        80,
                ),
	
					"validado"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        1,
                ),
	
					"hijos"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        2,
                ),
	
					"codigo_verificacion"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        25,
                ),
	
					"negocios"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        180,
                ),
	
					"cod_postal"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        10,
                ),
	
					"religion"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        20,
                ),
	
					"foto_main"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"nacionalidad"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        50,
                ),
	
					"activo"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        1,
                ),
	
					"estatura"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        3,
                ),
	
					"peso"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        3,
                ),
	
					"contextura_fisica"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        11,
                ),
	
					"color_pelo"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        11,
                ),
	
					"color_ojos"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        11,
                ),
	
					"convivencia"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        1,
                ),
	
					"facebook"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"twitter"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"linkedin"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"youtube"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"myspace"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"badoo"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"msn"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"skype"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"whatsapp"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        120,
                ),
	
					"google"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"tipo_busuqeda"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"completa_signin"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"claves_erroneas"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        10,
                ),
	
					"id_paises"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        11,
                ),
	
					"score"    		=>        array(
                    "type"                =>        "INTEGER",
                    "constraint"        	=>        11,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('usuarios');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('usuarios');
 
    }
}
?>
