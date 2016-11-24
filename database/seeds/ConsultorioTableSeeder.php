<?php

use Illuminate\Database\Seeder;

class ConsultorioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('consultorio')->delete();

        \DB::table('consultorio')->insert(array (
            0 =>
            array (
                'id_consultorio' => 1,
                'medico_id' => 1,
                'telefone' => '1145864444',
                'cep' => '13208056',
                'endereco' => 'Av Nove de Julho',
                'numero' => '1717',
                'complemento' => 'Conj 42 Ed Saint Georges',
                'bairro' => 'Vila Boaventura',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            1 =>
            array (
                'id_consultorio' => 2,
                'medico_id' => 2,
                'telefone' => '1145834776',
                'cep' => '13209000',
                'endereco' => 'Rua do Retiro',
                'numero' => '424',
                'complemento' => NULL,
                'bairro' => 'Vila Virginia',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            2 =>
            array (
                'id_consultorio' => 3,
                'medico_id' => 3,
                'telefone' => '1144970651',
                'cep' => '13201843',
                'endereco' => 'Av Antonio Segre',
                'numero' => '333',
                'complemento' => NULL,
                'bairro' => 'Jardim Brasil',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            3 =>
            array (
                'id_consultorio' => 4,
                'medico_id' => 4,
                'telefone' => '1198367886',
                'cep' => '13208761',
                'endereco' => 'Rua Barão de Teffé',
                'numero' => '1000',
                'complemento' => '2 andar, sala 21',
                'bairro' => 'Jardim Ana Maria',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            4 =>
            array (
                'id_consultorio' => 5,
                'medico_id' => 5,
                'telefone' => '1145869288',
                'cep' => '13207130',
                'endereco' => 'Rua Atilio Vianelo',
                'numero' => '310',
                'complemento' => NULL,
                'bairro' => 'Vianelo',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            5 =>
            array (
                'id_consultorio' => 6,
                'medico_id' => 6,
                'telefone' => '1145227237',
                'cep' => '13208140',
                'endereco' => 'Rua Abilio Figueiredo',
                'numero' => '92',
                'complemento' => NULL,
                'bairro' => 'Anhangabau',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            6 =>
            array (
                'id_consultorio' => 7,
                'medico_id' => 7,
                'telefone' => '1145213155',
                'cep' => '13209000',
                'endereco' => 'Rua do Retiro',
                'numero' => '432',
                'complemento' => NULL,
                'bairro' => 'Anhangabau',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            7 =>
            array (
                'id_consultorio' => 8,
                'medico_id' => 8,
                'telefone' => '1145230595',
                'cep' => '13201098',
                'endereco' => 'Rua Vasco da Gama',
                'numero' => '23',
                'complemento' => NULL,
                'bairro' => 'Vila Municipal',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            8 =>
            array (
                'id_consultorio' => 9,
                'medico_id' => 9,
                'telefone' => '1148071024',
                'cep' => '13201838',
                'endereco' => 'Rua Sócrates Fernandes de Oliveira',
                'numero' => '45',
                'complemento' => NULL,
                'bairro' => 'Chacara Urbana',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            9 =>
            array (
                'id_consultorio' => 10,
                'medico_id' => 10,
                'telefone' => '1145213155',
                'cep' => '13208761',
                'endereco' => 'Rua Barão de Teffé',
                'numero' => '1000',
                'complemento' => 'sala 52',
                'bairro' => 'Jardim Ana Maria',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            10 =>
            array (
                'id_consultorio' => 11,
                'medico_id' => 11,
                'telefone' => '1145834776',
                'cep' => '13209000',
                'endereco' => 'Rua do Retiro',
                'numero' => '424',
                'complemento' => NULL,
                'bairro' => 'Vila Virginia',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            11 =>
            array (
                'id_consultorio' => 12,
                'medico_id' => 12,
                'telefone' => '1148071024',
                'cep' => '13200000',
                'endereco' => 'Rua Socrates Fernandes de Oliveira',
                'numero' => '45',
                'complemento' => NULL,
                'bairro' => 'Chacara Urbana',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            12 =>
            array (
                'id_consultorio' => 13,
                'medico_id' => 13,
                'telefone' => '1145217121',
                'cep' => '13208760',
                'endereco' => 'Rua Barão de Teffe',
                'numero' => '160',
                'complemento' => NULL,
                'bairro' => 'Anhangabau',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            13 =>
            array (
                'id_consultorio' => 14,
                'medico_id' => 14,
                'telefone' => '1148072240',
                'cep' => '13208060',
                'endereco' => 'Av Amadeu Ribeiro',
                'numero' => '265',
                'complemento' => NULL,
                'bairro' => 'Anhangabau',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            14 =>
            array (
                'id_consultorio' => 15,
                'medico_id' => 15,
                'telefone' => '11984974855',
                'cep' => '13201796',
                'endereco' => 'Rua Ademar Pereira de Barros',
                'numero' => '21',
                'complemento' => NULL,
                'bairro' => 'Centro',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            15 =>
            array (
                'id_consultorio' => 16,
                'medico_id' => 16,
                'telefone' => '1148072240',
                'cep' => '13208060',
                'endereco' => 'Av Amadeu Ribeiro',
                'numero' => '265',
                'complemento' => NULL,
                'bairro' => 'Anhangabau',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            16 =>
            array (
                'id_consultorio' => 17,
                'medico_id' => 17,
                'telefone' => '1148052700',
                'cep' => '13201043',
                'endereco' => 'Rua Conrado Augusto Offa',
                'numero' => '80',
                'complemento' => NULL,
                'bairro' => 'Chacara Urbana',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            17 =>
            array (
                'id_consultorio' => 18,
                'medico_id' => 18,
                'telefone' => '11944450022',
                'cep' => '13208056',
                'endereco' => 'Av 9 de julho',
                'numero' => '2575',
                'complemento' => NULL,
                'bairro' => 'Anhangabau',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            18 =>
            array (
                'id_consultorio' => 19,
                'medico_id' => 19,
                'telefone' => '1145211697',
                'cep' => '13209000',
                'endereco' => 'Rua do Retiro',
                'numero' => '424',
                'complemento' => NULL,
                'bairro' => 'Vilia VIirginia',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            19 =>
            array (
                'id_consultorio' => 20,
                'medico_id' => 20,
                'telefone' => '1145261837',
                'cep' => '13206810',
                'endereco' => 'Rua Portugal',
                'numero' => '295',
                'complemento' => NULL,
                'bairro' => 'Jardim Cica',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            20 =>
            array (
                'id_consultorio' => 21,
                'medico_id' => 21,
                'telefone' => '1128162705',
                'cep' => '13207270',
                'endereco' => 'Rua Bom Jesus de Pirapora',
                'numero' => '315',
                'complemento' => NULL,
                'bairro' => 'Vianelo',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            21 =>
            array (
                'id_consultorio' => 22,
                'medico_id' => 22,
                'telefone' => '1148072240',
                'cep' => '13208060',
                'endereco' => 'Rua Amadeu Ribeiro',
                'numero' => '265',
                'complemento' => NULL,
                'bairro' => 'Anhangabau',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            22 =>
            array (
                'id_consultorio' => 23,
                'medico_id' => 23,
                'telefone' => '1144970033',
                'cep' => '13201796',
                'endereco' => 'Av 9 de julho',
                'numero' => '32',
                'complemento' => NULL,
                'bairro' => 'Anhangabau',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            23 =>
            array (
                'id_consultorio' => 24,
                'medico_id' => 24,
                'telefone' => '1145214798',
                'cep' => '13209090',
                'endereco' => 'Rua Eduardo Tomanik',
                'numero' => '900',
                'complemento' => NULL,
                'bairro' => 'Chacara Urbana',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
            24 =>
            array (
                'id_consultorio' => 25,
                'medico_id' => 25,
                'telefone' => '11940130333',
                'cep' => '13207060',
                'endereco' => 'Rua Conde de Monsanto',
                'numero' => '483',
                'complemento' => NULL,
                'bairro' => 'Vianelo',
                'cidade' => 'Jundiai',
                'estado' => 'SP',
                'latitude' => '1',
                'longitude' => '1',
            ),
        ));


    }
}
