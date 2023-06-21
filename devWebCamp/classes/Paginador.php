<?php 

namespace Classes; 

class Paginador {
    private $paginaActual;
    private $registrosPorPagina; 
    private $numRegistros; 

    public function __construct($paginaActual = 1, $registrosPorPagina = 10, $numRegistros = 0){
        $this->paginaActual = (int) $paginaActual;
        $this->registrosPorPagina = (int) $registrosPorPagina;
        $this->numRegistros = (int) $numRegistros;
    }

    public function offset(){
        return $this->registrosPorPagina * ($this->paginaActual - 1);
    }

    public function totalPaginas(){
        return ceil($this->numRegistros / $this->registrosPorPagina);
    }

    public function paginaAnterior(){
        return $this->paginaActual === 1 ? false : $this->paginaActual - 1;
    }

    public function paginaSiguiente(){
        $paginaSiguiente = $this->paginaActual + 1; 
        return $this->paginaActual < $this->totalPaginas() ? $paginaSiguiente : false;  
    }

    public function enlaceAnterior(){
        $html = '';
        if ($this->paginaAnterior()){
            $html .= "<a class='pagination__link pagination__link--text' href='?page=" . $this->paginaAnterior() . "'>Anterior</a>"; 
        }
    
        return $html; 

    }

    public function numerosPaginas(){
        $html = '';

        for ($i = 1; $i<= $this->totalPaginas(); $i++){
            if ($i === $this->paginaActual){
                $html .= "<p class='pagination__link pagination__link--current pagination__link--number'>$i</p>";
            } else {
                $html .= "<a class='pagination__link pagination__link--number' href='?page=$i'>$i</a> ";
            }
        }
        return $html; 
    }

    public function enlaceSiguiente(){
        $html = '';
        if ($this->paginaSiguiente()){
            $html .= "<a class='pagination__link pagination__link--text' href='?page=" . $this->paginaSiguiente() . "'>Siguiente</a>"; 
        }

        return $html; 
    }

    public function paginar(){

        $html = '';

        if ($this->numRegistros > 1){
            $html .= "<div class='pagination'>"; 
            $html .= $this->enlaceAnterior();
            $html .= $this->numerosPaginas();
            $html .= $this->enlaceSiguiente();
            $html .= "</div>";
        }
        return $html;
    }






}