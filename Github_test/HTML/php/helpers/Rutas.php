<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Rutas
{
    
    public $reportesAtendidos = "../HTML/reporte-clientes-atendidos.html";
    
    public function __construct() 
    {
        
        
    }
    
    public function getRutaReportesAtendidos()    
    {
       
        return $this->reportesAtendidos;
    }
            
}

