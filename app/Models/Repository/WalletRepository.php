<?php 

namespace App\Models\Repository;

use App\Models\Entity\WalletEntity;
use App\Models\Entity\TypeEntity;
use App\Models\Entity\UserEntity;

class WalletRepository
{
    protected $wallet;
    protected $type;
    protected $user;

    public function __construct(WalletEntity $wallet, TypeEntity $type, UserEntity $user)
    {
        $this->wallet = $wallet;
        $this->type = $type;
        $this->user = $user;
    }

    public function getBalance($id)  
    {
        $maxTransactionId = $this->wallet->where('id_user',$id)->max('wallet_id');
        
        return $this->wallet->select(
                'balance'                
            )
            ->where('id_user',$id)
            ->where('wallet_id', $maxTransactionId)
            ->get();
    }

    public function getWallet($id) 
    {
        return $this->wallet->select(
                'user_destination_id', 
                'transaction_id', 
                'balance', 
                'amount', 
                'transaction_id', 
                'transaction_date', 
                'type_id', 
                'action', 
                'description'
            )
            ->Join('types','type_id','id_type')
            ->where('id_user',$id)
            ->where('type_id', '<>', 1)
            ->get();
    }

    public function updateWallet($arData) 
    {
        $currentBalance = $this->getBalance($arData['id_user'])[0]->balance;
      
        switch ($arData['id_type']) {
            case '2': // Transferência
                $data = [
                    'id_user' => $arData['id_user'],
                    'balance' => ($currentBalance - $arData['amount']),
                    'user_destination_id' => $arData['user_destination_id'],
                    'id_type' => $arData['id_type'],
                    'transaction_id' => md5(date('d-m-Y H:i:s')),
                    'amount' =>  $arData['amount']
                ];

                $currentBalanceDestination = $this->getBalance($arData['user_destination_id'])[0]->balance;
                $dataLoad = [
                    'id_user' => $arData['user_destination_id'],
                    'balance' => ($currentBalanceDestination + $arData['amount']),
                    'user_destination_id' => $arData['id_user'],
                    'id_type' => 3,
                    'transaction_id' => md5(date('d-m-Y H:i:s')),
                    'amount' =>  $arData['amount']
                ];
            case '5': // Saque
                $data = [
                    'id_user' => $arData['id_user'],
                    'balance' => ($currentBalance - $arData['amount']),
                    'user_destination_id' => $arData['user_destination_id'],
                    'id_type' => $arData['id_type'],
                    'transaction_id' => md5(date('d-m-Y H:i:s')),
                    'amount' =>  $arData['amount']
                ];
                break;
            case '4': // Depósito
                $data = [
                    'id_user' => $arData['id_user'],
                    'balance' => ($currentBalance + $arData['amount']),
                    'user_destination_id' => $arData['user_destination_id'],
                    'id_type' => $arData['id_type'],
                    'transaction_id' => md5(date('d-m-Y H:i:s')),
                    'amount' =>  $arData['amount']
                ];
                break;
            default:
                return [];    
        }

        if (isset($dataLoad)) {
            $this->wallet->create($dataLoad);
        }

        return $this->wallet->create($data);
    }

    public function getUsersWallet($id) {
        return $this->user->where('id', '<>', $id)->get();
    }
}
