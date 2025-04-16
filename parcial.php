<?php
//Clase Persona
class Persona{
    private $persona;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;

    public function __construct($nombreIn, $apellidoIn, $direccionIn, $mailIn, $telefonoIn){
        $this->persona = $nombreIn;
        $this->apellido = $apellidoIn;
        $this->direccion = $direccionIn;
        $this->mail = $mailIn;
        $this->telefono = $telefonoIn;
    }
    //Getters
    public function getNombre(){
        return $this->persona;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    //Setters
    public function setNombre($nombreIn){
        $this->persona = $nombreIn;
    }
    public function setApellido($apellidoIn){
        $this->apellido = $apellidoIn;
    }
    public function setDireccion($direccionIn){
        $this->direccion = $direccionIn;
    }
    public function setMail($mailIn){
        $this->mail = $mailIn;
    }
    public function setTelefono($telefonoIn){
        $this->telefono = $telefonoIn;
    }
    //toString
    public function __toString(){
        return  "Nombre: "      . $this->getNombre() . "\n" .
                "Apellido: "    . $this->getApellido() . "\n" .
                "Direccion: "   . $this->getDireccion() . "\n" .
                "Mail: "        . $this->getMail() . "\n" .
                "Telefono: "    . $this->getTelefono() . "\n";
    }
}
//clase Vuelo
class Vuelo{
    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaArribo;
    private $horaPartida;
    private $cantAsientosTotales;
    private $cantAsientosDisponibles;
    private $refPersonaResponsable;

    //metodo construct
    public function __construct($numeroIn, $importeIn, $fechaIn, $destinoIn, $personaIn, $horaArriboIn, $horaPartidaIn, $cantAsientosTotalesIn, $cantAsientosDisponiblesIn, $refPersonaResponsableIn){
        $this->numero = $numeroIn;
        $this->importe = $importeIn;
        $this->fecha = $fechaIn;
        $this->destino = $destinoIn;
        $this->horaArribo = $horaArriboIn;
        $this->horaPartida = $horaPartidaIn;
        $this->cantAsientosTotales  = $cantAsientosTotalesIn;
        $this->cantAsientosDisponibles = $cantAsientosDisponiblesIn;
        $this->refPersonaResponsable = $refPersonaResponsableIn;

    }
    //Getters
    public function getNumero(){
        return $this->numero;
    }
    public function getImporte(){
        return $this->importe;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getHoraArribo(){
        return $this->horaArribo;
    }
    public function getHoraPartida(){
        return $this->horaPartida;
    }
    public function getCantAsientosTotales(){
        return $this->cantAsientosTotales;
    }
    public function getCantAsientosDisponibles(){
        return $this->cantAsientosDisponibles;
    }
    public function getRefPersonaResponsable(){
        return $this->refPersonaResponsable;
    }
    //Setters
    private function setNumero($numeroIn){
        $this->numero = $numeroIn;
    }
    private function setImporte($importeIn){
        $this->importe = $importeIn;
    }
    private function setFecha($fechaIn){
        $this->fecha = $fechaIn;
    }
    private function setDestino($destinoIn){
        $this->destino = $destinoIn;
    }
    private function setHoraArribo($horaArriboIn){
        $this->horaArribo = $horaArriboIn;
    }
    private function setHoraPartida($horaPartidaIn){
        $this->horaPartida = $horaPartidaIn;
    }
    private function setCantAsientosTotales($cantAsientosTotalesIn){
        $this->cantAsientosTotales = $cantAsientosTotalesIn;
    }
    private function setCantAsientosDisponibles($cantAsientosDisponiblesIn){
        $this->cantAsientosDisponibles = $cantAsientosDisponiblesIn;
    }
    private function setRefPersonaResponsable($refPersonaResponsableIn){
        $this->refPersonaResponsable = $refPersonaResponsableIn;
    }
    //Asignar asientos disponibles. param entrada
    public function asignarAsientosDisponibles($cantPasajerosIn){
        $respuesta = false;
        $cantDisponibles = $this->getCantAsientosDisponibles();

        if($cantPasajerosIn <= $cantDisponibles){
            //Actualizamos la cantidad de asientos disponibles
            $this->setCantAsientosDisponibles($cantDisponibles - $cantPasajerosIn);
            $respuesta = true;
        }
        return $respuesta;
    }

}
//En la clase Aerolíneas se registra la siguiente información: identificación, nombre y la colección de vuelos programados.
class Aerolíneas{
    private $identificacion;
    private $nombre;
    private $coleccionDeVuelosProg;

    //Construct
    public function __construct($identificacionIn, $nombreIn){
        $this->identificacion = $identificacionIn;
        $this->nombre = $nombreIn;
        $this->coleccionDeVuelosProg = [];
    }
    //Getters
    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getColeccionDeVuelosProg(){
        return $this->coleccionDeVuelosProg;
    }
    //Setters
    private function setIdentificacion($identificacionIn){
        $this->identificacion = $identificacionIn;
    }
    private function setNombre($nombreIn){
        $this->nombre = $nombreIn;
    }
    private function setColeccionDeVuelosProg($coleccionDeVuelosProgIn){
        $this->coleccionDeVuelosProg = $coleccionDeVuelosProgIn;
    }
    public function __toString(){
        return "Identificacion: " . $this->getIdentificacion() . "\n" .
                "Nombre: " . $this->getNombre() . "\n" . 
                "Los vuelos: " . $this->getColeccionDeVuelosProg() . "\n";
    }
    //darVueltaADestino $destino y $cantidadAsientos
    public function darVueloADestino($destino, $cant_asientos){
        $colVuelos = [];
        $colVuelosAerolínea = $this->getColeccionDeVuelosProg();
        
        foreach ($colVuelosAerolínea as $unObjVuelo) {
            $elDestino = $unObjVuelo->getDestino();
            $cant_Disponible = $unObjVuelo->getCantAsientosDisponibles();
    
            if ($elDestino == $destino && $cant_Disponible >= $cant_asientos) {
                array_push($colVuelos, $unObjVuelo);
            }
        }
    
        return $colVuelos;
    }
    public function incorporarVuelo($nuevoVuelo) {
        $respuesta = true;
        $coleccion = $this->getColeccionDeVuelosProg();
    
        foreach ($coleccion as $vueloExistente) {
            if ($vueloExistente->getDestino() == $nuevoVuelo->getDestino() &&
                $vueloExistente->getFecha() == $nuevoVuelo->getFecha() &&
                $vueloExistente->getHoraPartida() == $nuevoVuelo->getHoraPartida()){
                $respuesta = false;
            }
        }
        if ($respuesta) {
            $coleccion[] = $nuevoVuelo;
            $this->setColeccionDeVuelosProg($coleccion);
        }
    
        return $respuesta;
    }
    public function venderVueloADestino($cantAsientos, $destino, $fecha){
        $coleccion = $this->getColeccionDeVuelosProg();
        foreach($coleccion as $vuelo){
            if($vuelo->getDestino() == $destino && $vuelo->getFecha()== $fecha){
                $cantAsientosDisponibles = $vuelo->getCantAsientosDisponibles();

                if($cantAsientos <= $cantAsientosDisponibles){
                    //le asignamos la cantidad de asientos disponibles
                    $vuelo->asignarAsientosDisponibles($cantAsientos);
                    return $vuelo;
                }
            }
        }
        return null;
    }
    public function montoPromedioRecaudado(){

    }
}
class Aeropuerto{
    private $denominacion;
    private $direccion;
    private $coleccionDeAerolineas;

    //Construct
    public function __construct($denominacionIn, $direccionIn){
        $this->denominacion = $denominacionIn;
        $this->direccion = $direccionIn;
        $this->coleccionDeAerolineas = [];
    }
    //Getters
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getColeccionDeAerolineas(){
        return $this->coleccionDeAerolineas;
    }
    //Setters
    private function setDenominacion($denominacionIn){
        $this->denominacion = $denominacionIn;
    }
    private function setDireccion($direccionIn){
        $this->direccion = $direccionIn;
    }
    private function setColeccionDeAerolineas($coleccionDeAerolineasIn){
        $this->coleccionDeAerolineas = $coleccionDeAerolineasIn;
    }
    public function __toString(){
        return "Denominacion: " . $this->getDenominacion() . "\n" .
                "Direccion: " . $this->getDireccion() . "\n" . 
                "Las aerolineas: " . $this->getColeccionDeAerolineas() . "\n";
    }
    public function retornarVuelosAerolinea($nombreAerolinea){
        //retornar todos los vuelos asignamos a la aerolina;
        foreach($this->coleccionDeAerolineas as $aerolinea){
            if($aerolinea->getNombre() == $nombreAerolinea){
                return $aerolinea->getColeccionDeVuelosProg();
            }
        }
    }
    public function ventaAutomatica($cantAsientosIn, $fechaIn, $destinoIn) {
        foreach ($this->coleccionDeAerolineas as $aerolinea) {
            $vueloAsignado = $aerolinea->venderVueloADestino($cantAsientosIn, $destinoIn, $fechaIn);
            if ($vueloAsignado !== null) {
                return $vueloAsignado; // Se encontró un vuelo y se realizó la venta
            }
        }
        return null; // No se pudo asignar ningún vuelo
    }
    public function montoPromedioRecaudado(){
        $coleccion = $this->getColeccionDeVuelosProg();
        $sumaTotal = 0;
        $cantidadVuelos = 0;
        
        foreach($coleccion as $vuelo){
            $vendidos = $vuelo->getCantAsientosTotales() - $vuelo->getCantAsientosDisponibles();
            $sumaTotal += $vendidos * $vuelo->getImporte();
            $cantidadVuelos++;
        }
    
        if($cantidadVuelos > 0 ){
            $salida = $sumaTotal / $cantidadVuelos;
        } else {
            $salida = 0;
        }
    
        return $salida;
    }
}
//test
$TestAerolinea1 = new Aerolíneas("A001", "Aerolínea Argentina");
$TestAerolinea2 = new Aerolíneas("A003", "Aerolínea Brasilera");
echo $TestAerolinea1 . " \n " . $TestAerolinea2 . "\n";



?>
