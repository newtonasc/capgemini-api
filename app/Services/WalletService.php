<?php

namespace App\Services;

use App\Models\Repository\WalletRepository;
use App\Models\Repository\UserRepository;

class WalletService
{
    protected $wallet;
    protected $user;

    public function __construct( WalletRepository $wallet, UserRepository $user) 
    {
        $this->wallet = $wallet;
        $this->user = $user;    
    }

    public function getBalance($id) 
    {
        try {
            return [
                'data' => $this->wallet->getBalance($id),
                'Error' => false,
                'message' => 'Saldo obtido com sucesso.',
                'response' => 201
            ];
        } catch (\Throwable $th) {
            return [
                'data' => [],
                'Error' => true,
                'message' => 'Falha ao obter o saldo.',
                'response' => 500
            ];
        }         
    }

    public function getWallet($id) 
    {
        try {
            return [
                'data' => $this->wallet->getWallet($id),
                'Error' => false,
                'message' => 'Extrato obtido com sucesso.',
                'response' => 201
            ]; 
        } catch (\Throwable $th) {
            return [
                'data' => [],
                'Error' => true,
                'message' => 'Falha ao obter o extrato.',
                'response' => 500
            ];
        }      
    }

    public function updateWallet($arData) 
    {
        try {
            return [
                'data' => $this->wallet->updateWallet($arData),
                'Error' => false,
                'message' => 'Operação realizada com sucesso com sucesso.',
                'response' => 201
            ]; 
        } catch (\Throwable $th) {
            return [
                'data' => [],
                'Error' => true,
                'message' => 'Falha na operação.',
                'response' => 500
            ];
        }      
    }

    public function validateClient($id) 
    {
        return $this->user->validateClient($id);
    }

    public function getUsersWallet($id) 
    {
        try {
            return response()->json($this->wallet->getUsersWallet($id), 201);
            
    
            
        } catch (\Throwable $th) {
            return [
                'data' => [],
                'Error' => true,
                'message' => 'Falha ao obter a lista de clientes.',
                'response' => 500
            ];
        }
    }
}
