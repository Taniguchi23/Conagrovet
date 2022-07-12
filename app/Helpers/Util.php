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

    public static function colorEstado($estado){
        if ($estado === 'A'){
            $color = 'success';
        }else{
            $color = 'warning';
        }
        return $color;
    }

    public static function colorMascota($estado){
        if ($estado === 'V'){
            $color = 'success';
        }else{
            $color = 'warning';
        }
        return $color;
    }

    public static function colorConsulta($estado){
        if ($estado === 'P'){
            $color = 'warning';
        }else{
            $color = 'success';
        }
        return $color;
    }

    public static function stringEstado($estado){
        if ($estado === 'A'){
            $texto = 'Activo';
        }else{
            $texto = 'Inactivo';
        }
        return $texto;
    }

    public static function stringMascota($estado){
        if ($estado === 'V'){
            $texto = 'Activo';
        }else{
            $texto = 'Inactivo';
        }
        return $texto;
    }


    public static function consultaEstado($estado){
        if ($estado === 'P'){
            $texto = 'Pendiente';
        }else{
            $texto = 'Revisado';
        }
        return $texto;
    }

    public static function stringSexo($sexo){
        if ($sexo === 'M'){
            $texto = 'Macho';
        }else{
            $texto = 'Hembra';
        }
        return $texto;
    }

    public static function stringEsteril($esteril){
        if ($esteril === 'S'){
            $texto = 'Si';
        }else{
            $texto = 'No';
        }
        return $texto;
    }

    public static function estadoStringCita($estado){
        if ($estado=='A'){
            $texto = 'Activo';
        }elseif ($estado=='D'){
            $texto = 'Reprogramado';
        }elseif ($estado == 'F'){
            $texto = 'Terminado';
        }else{
            $texto = 'Rechazado';
        }
        return $texto;
    }

    public static function estadoColorCita($estado){
        if ($estado=='A'){
            $color = 'success';
        }elseif ($estado=='D'){
            $color = 'info';
        }elseif ($estado == 'F'){
            $color = 'secondary';
        }else{
            $color = 'danger';
        }
        return $color;
    }

    public static function formatoCita($id){
        $string = substr(str_repeat(0, 5).$id, - 10);
        return $string;
    }


}


