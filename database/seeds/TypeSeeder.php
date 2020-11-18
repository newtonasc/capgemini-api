<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'action' => 'BL',
                'description' => 'Saldo'    
            ],
            [
                'action' => 'DT',
                'description' => 'Débito Transferência' 
            ],
            [
                'action' => 'CT',
                'description' => 'Crédito Transferência' 
            ],
            [
                'action' => 'DB',
                'description' => 'Depósito' 
            ],
            [
                'action' => 'WD',
                'description' => 'Saque' 
            ]
        ];

        foreach ($types as $C => $V) {
            DB::table('types')->insert($V);
        }
    }
}
