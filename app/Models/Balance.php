<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $value): array
    {
        $this->amount += number_format($value, 2, '.', '');
        $deposit = $this->save();

        if ($deposit)
            return [
                'sucess' => true,
                'message' => 'Sucesso ao recarregar'
            ];

        return [
            'sucess' => false,
            'message' => 'Falha ao recarregar'
        ];
    }
}
