<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WalletService;
use App\Helpers\Helpers;
use App\Http\Controllers\UserController;

class WalletController extends Controller
{
    protected $service;
    protected $helper;
    protected $user;

    public function __construct(WalletService $service, Helpers $helper, UserController $user)
    {
        $this->service = $service;
        $this->helper = $helper;
        $this->user = $user;
    }

    public function getBalance($id) 
    {
        $blClient = $this->validateClient($id);

        if (!$this->validateId($id, $blClient)) {
            return [
                'data' => [],
                'Error' => true,
                'message' => 'Cliente inválido.',
                'response' => 400
            ]; 
        }

        return response()->json($this->service->getBalance($id), 201);
    }

    public function getWallet($id) 
    {
        $blClient = $this->validateClient($id);
        
        if (!$this->validateId($id, $blClient)) {
            return [
                'data' => [],
                'Error' => true,
                'message' => 'Cliente inválido.',
                'response' => 400
            ]; 
        }

        return response()->json($this->service->getWallet($id), 201);
    }

    public function updateWallet($id, Request $obRequest) 
    {
        $blClient = $this->validateClient($id);
        
        if (!$this->validateId($id, $blClient)) {
            return [
                'data' => [],
                'Error' => true,
                'message' => 'Cliente inválido.',
                'response' => 400
            ]; 
        }

        $arData = [
            'id_user' => $id, 
            'id_type' => $obRequest->transaction,
            'user_destination_id' => $obRequest->user_destination_id,
            'amount' => $obRequest->amount
        ];
        
        $arValidate = [
            'id_user' => 'Id do usuário',
            'id_type' => 'Tipo da transação',
            'amount' => 'Valor da transação'
        ];

        if ($arData['id_type'] == 2) { // Transferencia
            $arValidate['user_destination_id'] = 'Destinatário da transação';

            if ($id == $arData['user_destination_id'] || $arData['user_destination_id'] == 0 || empty($arData['user_destination_id']) || is_null($arData['user_destination_id'])) {
                return [
                    'data' => [],
                    'Error' => true,
                    'message' => 'Cliente destinatário da transação é inválido.',
                    'response' => 400
                ]; 
            }            
        }

        $require = $this->helper->requiredFields($arValidate, $arData);

        if(!empty($require)){
            return response()
            ->json(
                [
                    'data' => $require,
                    'error' => true,
                    'message' => 'Campos obrigatórios.',
                    'response' => 412
                ],
                412
            );
        }

        return response()->json($this->service->updateWallet($arData), 201);
    }

    public function getUsersWallet($id)
    {
        $blClient = $this->validateClient($id);

        if (!$this->validateId($id, $blClient)) {
            return [
                'data' => [],
                'Error' => true,
                'message' => 'Cliente inválido.',
                'response' => 400
            ]; 
        }

        return response()->json($this->service->getUsersWallet($id), 201);
    }

    public function validateClient($id) 
    {
        return $this->service->validateClient($id);
    }
    
    public function validateId($id, $blClient)
    {
        $blValidId = ($this->user->getAuthenticatedUser()->getData()->user->id == $id) ? true : false;

        if (empty($id) || is_null($id) || $id == 0 || !$blClient || !$blValidId) {
            return false;
        }

        return true;
    }
}
