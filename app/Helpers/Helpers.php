<?php

namespace App\Helpers;

class Helpers
{
    public function requiredFields($arrValidate, $arrData)
    {
        $message = [];
        $i = 0;

        foreach($arrValidate as $C => $V)
        {
            if(!isset($arrData[$C]))
            {
                $message[$i] = 'O campo ' . $V . ' é obrigatório.';
                $i++;
            }
        }

        return $message;
    }
}
