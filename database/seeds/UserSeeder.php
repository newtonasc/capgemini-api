<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Olivia Flávia Márcia Figueiredo', 
                'agency' => '0001',
                'account' => '123654',
                'cpf' => '918.631.199-90',
                'cellPhone' => '(41) 98619-8957',
                'email' => 'oliviaflaviamarciafigueiredo__oliviaflaviamarciafigueiredo@vemarbrasil.com.br',
                'birthday' => '1992-04-23',
                'streetAddress' => 'Rua David de Souza Camargo, 935 - Prado Velho',
                'city' => 'Curitiba',
                'state' => 'PR',
                'postal' => '80220-470',
                'gender' => 'F',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Carlos Eduardo Enrico Silva', 
                'agency' => '0001',
                'account' => '123984',
                'cpf' => '496.685.549-73',
                'cellPhone' => '(41) 99353-3744',
                'email' => 'carloseduardoenricosilva_@jglima.com.br',
                'birthday' => '1997-11-12',
                'streetAddress' => 'Rua Ottília Maria Carlotta Frank, - 519 - Cidade Industrial',
                'city' => 'Curitiba',
                'state' => 'PR',
                'postal' => '81250-488',
                'gender' => 'M', 
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Silvana Bianca Maria Silveira', 
                'agency' => '0002',
                'account' => '234123',
                'cpf' => '670.519.719-64',
                'cellPhone' => '(43) 98203-7791',
                'email' => 'silvanabiancamariasilveira-81@depotit.com.br',
                'birthday' => '1992-04-24',
                'streetAddress' => 'Avenida Irati, 842 - Barra Funda',
                'city' => 'Apucarana',
                'state' => 'PR',
                'postal' => '86800-220',
                'gender' => 'F', 
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Felipe Diogo Cláudio Costa', 
                'agency' => '0002',
                'account' => '234552',
                'cpf' => '395.694.419-41',
                'cellPhone' => '(43) 98903-2996',
                'email' => 'felipediogoclaudiocosta-94@rubens.adm.br',
                'birthday' => '1950-03-23',
                'streetAddress' => 'Rua Capistrano de Abreu, 736 - Vila Shangri-La',
                'city' => 'Apucarana',
                'state' => 'PR',
                'postal' => '86812-190',
                'gender' => 'M',  
                'password' => Hash::make('password')
            ]
        ];

        foreach ($users as $C => $V) {
            DB::table('users')->insert($V);
        }
    }
}
