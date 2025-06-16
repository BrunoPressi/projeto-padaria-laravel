<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class Cpf implements Rule
{
    public function passes($attribute, $value)
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/\D/', '', $value);

        // Verifica se tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se todos os dígitos são iguais (CPF inválido)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula o primeiro dígito verificador
        for ($t = 9; $t < 11; $t++) {
            $sum = 0;
            for ($c = 0; $c < $t; $c++) {
                $sum += $cpf[$c] * (($t + 1) - $c);
            }
            $digit = (10 * $sum) % 11;
            $digit = ($digit == 10) ? 0 : $digit;
            if ($cpf[$c] != $digit) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'O campo :attribute não contém um CPF válido.';
    }
}
