<?php

namespace App\Helpers;

class Util {
    public static function obtenerPrimeraLetra($cadena){
        $caracter = substr($cadena,0,1);
        return $caracter;
    }

    public static function obtenerTipoUsuario($charUsuario){
        if ($charUsuario === 'A'){
            return 'Administradores';
        }elseif ($charUsuario === 'C'){
            return 'Clientes';
        }elseif ($charUsuario === 'E'){
            return 'Empleados';
        }elseif ($charUsuario === 'D'){
            return 'Doctores';
        }else{
            return 'Inhabilitados';
        }
    }

    public static function obtenerTipoUsuarioSingular($charUsuario){
        if ($charUsuario === 'A'){
            return 'Administrador';
        }elseif ($charUsuario === 'C'){
            return 'Cliente';
        }elseif ($charUsuario === 'E'){
            return 'Empleado';
        }elseif($charUsuario === 'D'){
            return 'Doctor';
        }else{
            return 'Inhabilitado';
        }
    }

    public static function colorEstadoProducto($estadoProducto){
        if ($estadoProducto === 'E'){
            $color = 'success';
         }elseif ($estadoProducto === 'N'){
            $color = 'danger';
        }else{
            $color = 'info';
        }
        return $color;
    }
    public static function estadoProducto($estadoProducto){
        if ($estadoProducto === 'E'){
            $texto = 'Existe';
        }elseif ($estadoProducto === 'N'){
            $texto = 'No existe';
        }else{
            $texto = 'Usado';
        }
        return $texto;
    }

    public static function formatoFecha($fecha){
        $fechaEntero = strtotime($fecha);
        $fechaNueva = date('d/m/Y g:i a',$fechaEntero);
        return $fechaNueva;
    }

}


