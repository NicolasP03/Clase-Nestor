<?php

class Persona {
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $edad;
    private $email;
    private $telefono;
    private $genero;

    public function __construct($nombre, $apellido, $fechaNacimiento, $email, $telefono, $genero) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->genero = $genero;
        $this->edad = $this->calcularEdad();
    }

    private function calcularEdad() {
        $nacimiento = new DateTime($this->fechaNacimiento);
        $hoy = new DateTime();
        return $hoy->diff($nacimiento)->y;
    }

    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getNombreCompleto() { return $this->nombre . " " . $this->apellido; }
    public function getFechaNacimiento() { return $this->fechaNacimiento; }
    public function getEdad() { return $this->edad; }
    public function getEmail() { return $this->email; }
    public function getTelefono() { return $this->telefono; }
    public function getGenero() { return $this->genero; }

    // Métodos de acción
    public function comer() { return ["Comiendo arroz", "Comiendo carne", "Comiendo ensalada"]; }
    public function caminar() { return ["Caminando lento", "Caminando rápido", "Caminando al parque"]; }
    public function hablar() { return ["Hablando por teléfono", "Hablando con amigos"]; }
    public function dormir() { return ["Durmiendo 8 horas", "Durmiendo 6 horas"]; }
    public function estudiar() { return ["Estudiando PHP", "Estudiando POO"]; }
}

?>
