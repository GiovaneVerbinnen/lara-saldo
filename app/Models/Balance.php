<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\DB;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $value): array
    {
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, '.', '');
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                  => 'I',
            'amount'                => $value,
            'total_before'          => $totalBefore,
            'total_after'           => $this->amount,
            'date'                  => date('Ymd'),
        ]);

        if ($deposit && $historic) {

            DB::commit();

            return [
                'success' => true,
                'message' => 'Sucesso ao recarregar'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao recarregar'
            ];
        }
    }

    public function withdraw(float $value): array
    {

        if ($this->amount < $value) {
            return [
                'success' => false,
                'message' => 'Saldo insuficiente',
            ];
        }

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 2, '.', '');
        $withdraw = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                  => 'O',
            'amount'                => $value,
            'total_before'          => $totalBefore,
            'total_after'           => $this->amount,
            'date'                  => date('Ymd'),
        ]);

        if ($withdraw && $historic) {

            DB::commit();

            return [
                'success' => true,
                'message' => 'Sucesso ao sacar'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao sacar'
            ];
        }
    }
    public function transfer(float $value, User $sender): array
    {
        if ($this->amount < $value) {
            return [
                'success' => false,
                'message' => 'Saldo insuficiente',
            ];
        }

        DB::beginTransaction();
        // Debita o saldo do usuário quem está transferindo
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 2, '.', '');
        $transfer = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                  => 'T',
            'amount'                => $value,
            'total_before'          => $totalBefore,
            'total_after'           => $this->amount,
            'date'                  => date('Ymd'),
            'user_id_transaction'   => $sender->id,
        ]);

        // Credita o saldo do usuário quem está recebendo
        $senderBalance = $sender->balance()->firstOrCreate([]);
        $totalBeforeSender = $senderBalance->amount ? $senderBalance->amount : 0;
        $senderBalance->amount += number_format($value, 2, '.', '');
        $transferSender = $senderBalance->save();

        $historicSender = $sender->historics()->create([
            'type'                  => 'I',
            'amount'                => $value,
            'total_before'          => $totalBeforeSender,
            'total_after'           => $senderBalance->amount,
            'date'                  => date('Ymd'),
            'user_id_transaction'   => auth()->user()->id,
        ]);

        if ($transfer && $historic && $transferSender && $historicSender) {

            DB::commit();

            return [
                'success' => true,
                'message' => 'Sucesso ao Transferir'
            ];
        }
        DB::rollback();
        return [
            'success' => false,
            'message' => 'Falha ao Transferir'
        ];
    }
}
