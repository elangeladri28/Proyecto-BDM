<?php
//Vista para secciones

class ReportesView extends Reportes
{
    public function showReporteNoticias($fechaDesde, $fechaHasta, $idSeccion)
    {
        
        $results = $this->getReporteNoticias($fechaDesde, $fechaHasta, $idSeccion);
        return $results;
    }

    public function showReporteSeccion($fechaDesde, $fechaHasta, $idSeccion)
    {
        
        $results = $this->getReporteSeccion($fechaDesde, $fechaHasta, $idSeccion);
        return $results;
    }
}