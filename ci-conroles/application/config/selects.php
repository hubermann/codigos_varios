<?php
defined('BASEPATH') or exit('No direct script access allowed');



$config['roles_list'] = array(
    '1' => 'something',
    '2' => 'user_simple',
    );

$config['options_sexo'] = [0=> "Mujer", 1=>"Hombre"];



$config['niveles_estudio_list'] = array(
    'Primarios' => 'Primarios',
    'Secundarios' => 'Secundarios',
    'Universitarios' => 'Universitarios',
    'otros' => 'otros',
    );

$config['clasificaciones_citas'] = array(
    '1' => 'Me gusto [cambiar]',
    '2' => 'masomeno[cambiar] ',
    '3' => 'no me agrada [cambiar]',
    );

$config['relaciones_tipo'] = array(
    '1' => 'Nuevas amistades',
    '2' => 'Amistad y despues vemos ',
    '3' => 'Una relacion sin compromiso',
    '4' => 'Una relacion con fines serios',
    '5' => 'Nuevas experiencias',
    );


$config['aprobado_list'] = array('1' => 'Si', '0' => 'No' );

$config['finalizado_list'] = array('1' => 'Si', '0' => 'No' );

$config['color_ojos'] = [0 => 'verdes', 1 => 'marrones', 2 => 'azules', 3 => 'negros'];

$config['color_pelo'] = [0 => 'Castaño claro', 1 => 'Castaño oscuro', 2 => 'negro', 3 => 'marron'];

$config['contextura_fisica'] = [0 => 'Delgado', 1 => 'Atletico', 2 => 'algunos kilos de mas', 3 => 'excedido'];

$config['estatura'] = [
    0 => '130cm a 135cm',
    1 => '135cm a 140cm',
    2 => '140cm a 150cm',
    3 => '...',
    ];

$config['religion'] = [
    0 => 'prefiero no decir',
    1 => 'Ateo',
    2 => 'Catolico',
    3 => 'Judio',
		4 => 'Adventista',
		5 => '...',
    ];

		$config['celular_cia'] = [
		    0 => 'Movistar',
		    1 => 'Personal',
		    2 => 'Claro',
		    3 => '...',
				4 => '...',
				5 => '...',
		    ];

$config['peso'] = [
    0 => 'Entre 40 y 45',
    1 => 'Entre 45 y 50',
    2 => 'Entre 50 y 55',
    3 => 'Entre 55 y 60',
    4 => 'Entre 60 y 65',
    5 => 'Entre 65 y 70',
    6 => 'mas...',
];

$config['options_busco'] = [
    0 => 'Relacion con fines serios',
    1 => 'Amistad y luego vemos',
    2 => 'Amistad',
    3 => '..',
    4 => '...',
];

$config['finalizado_list'] = [
  '1' => 'Si',
  '0' => 'No'
];

$config['options_fuma'] = [
  '0' => 'No',
  '1' => 'Si',
  '3' => 'Socialmente'
];

$config['toma_alcohol'] = [
  '0' => 'Socialmente',
  '1' => 'Si',
  '2' => 'No',
  '3' => 'Ocasionalmente',
  '4' => '...'
];


$config['duracion_list'] = array(
    '1' => '1 días',
    '2' => '2 días',
    '3' => '3 días',
    '4' => '4 días',
    '5' => '5 días',
    '6' => '6 días',
    '7' => '7 días',
    '10' => '10 días',
    '15' => '15 días',
    '20' => '20 días',
    '30' => '30 días',
    '45' => '45 días'
    );

$config['provincias_list'] = array(
    '1' =>'Ciudad Autonoma de Buenos Aires',
    '2' => 'Provincia de Buenos Aires',
    '3' => 'Catamarca',
    '4' => 'Chaco',
    '5' => 'Chubut',
    '6' => 'Córdoba',
    '7' => 'Corrientes',
    '8' => 'Entre Ríos',
    '9' => 'Formosa',
    '10' => 'Jujuy',
    '11' => 'La Pampa',
    '12' => 'La Rioja',
    '13' => 'Mendoza',
    '14' => 'Misiones',
    '15' => 'Neuquén',
    '16' => 'Río Negro',
    '17' => 'Salta',
    '18' => 'San Juan',
    '19' => 'San Luis',
    '20' => 'Santa Cruz',
    '21' => 'Santa Fe',
    '22' => 'Santiago del Estero',
    '23' => 'Tierra del Fuego',
    '24' => 'Tucumán',
    '25' => 'Otro'
    );

$config['options_estado_civil'] = [0=> "Soltero", 1=>"Casado", 2=>"Separado", 3=>"Viudo"];

$config['options_zodiaco'] = ["Aries","Tauro","Géminis","Cáncer","Leo","Virgo","Libra","Escorpio","Sagitario","Capricornio","Acuario","Piscis"];

$config['options_provincia'] =[
        0 => '-',
        1 => 'Buenos Aires',
        2 => 'Capital Federal',
        3 =>'Catamarca',
        4 =>'Chaco',
        5 =>'Chubut',
        6 =>'Córdoba',
        7 =>'Corrientes',
        8 =>'Entre Ríos',
        9 =>'Formosa',
        10 =>'Jujuy',
        11 =>'La Pampa',
        12 =>'La Rioja',
        13 =>'Mendoza',
        14 =>'Misiones',
        15 =>'Neuquén',
        16 =>'Río Negro',
        17 =>'Salta',
        18 =>'San Juan',
        19 =>'San Luis',
        20 =>'Santa Cruz',
        21 =>'Santa Fe',
        22 =>'Santiago del Estero',
        23=>'Tierra del Fuego',
        24 =>'Tucumán'];

$config['paises_list'] = array(
    '1' =>'Argentina',
    '2' => 'Bolivia',
    '3' => 'Brazil',
    '4' => 'Chile',
    '5' => 'Colombia',
    '6' => 'Ecuador',
    '7' => 'Paraguay',
    '8' => 'Peru',
    '9' => 'Uruguay',
    '10' => 'Venezuela',
    '11' => 'Mexico',
    '12' => 'España',
    '13' => 'Otro'
    );
