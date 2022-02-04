<?php

class CalculadoraService
{
    public function sum($num1, $num2)
    {
        try 
        {
            $result =  $num1 + $num2;
        } 
        catch (\Throwable $th) 
        {
            return 
            [
                'sucess' => false,
                'massage' => 'Erro ao fazer a soma'
            ];
        }
            return 
            [
                'sucess' => true,
                'message' => 'Soma feita com sucesso',
                'data' => $result
            ];
    }

    public function div($num1, $num2)
    {
        try
        {
            if($num2 == 0)
            {
                return 
                [
                    'sucess' => false,
                    'message' => 'Divisão por zero'
                ];
            }

            $result = $num1 / $num2;

            return 
            [
                'sucess' => true,
                'message' => 'Div feita com sucesso',
                'data' => $result
            ];
        }
        catch (\Throwable $th) 
        {
            return 
            [
                'sucess' => false,
                'massage' => 'Erro ao fazer div'
            ];
        }
    }       
}
    ?>