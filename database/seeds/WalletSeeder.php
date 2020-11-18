<?php

use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallets = [
            [
                'id_user' => 1,
                'id_type' => 1,
                'transaction_id' => md5(date('d-m-Y H:i:s')),
                'balance' => 0,
                'amount' => 0,
                'transaction_date' => date('d-m-Y H:i:s')
            ],
            [
                'id_user' => 2,
                'id_type' => 1,
                'transaction_id' => md5(date('d-m-Y H:i:s')),
                'balance' => 0,
                'amount' => 0,
                'transaction_date' => date('d-m-Y H:i:s')
            ],
            [
                'id_user' => 3,
                'id_type' => 1,
                'transaction_id' => md5(date('d-m-Y H:i:s')),
                'balance' => 0,
                'amount' => 0,
                'transaction_date' => date('d-m-Y H:i:s')
            ],
            [
                'id_user' => 4,
                'id_type' => 1,
                'transaction_id' => md5(date('d-m-Y H:i:s')),
                'balance' => 0,
                'amount' => 0,
                'transaction_date' => date('d-m-Y H:i:s')
            ]
        ];

        foreach ($wallets as $C => $V) {
            DB::table('wallets')->insert($V);
        }
    }
}
