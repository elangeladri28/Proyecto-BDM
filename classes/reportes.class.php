<?php
//Modelo para secciones

class Reportes extends Dbh
{

    protected function getReporteNoticias($fechaDesde, $fechaHasta, $idSeccion)
    {

        $fechaDesdeString = " AND publishDate > '" . $fechaDesde . "'";
        $fechaHastaString = " AND publishDate < '" . $fechaHasta . "'";
        if ($idSeccion == ""){

            $idSeccionString = "";
        }
        else{

            $idSeccionString = " AND categoryId = '" . $idSeccion . "'";
        }

        $sql = "SELECT categoryName, publishDate, newsTitle, likes, numberOfComments
        FROM report_by_news WHERE categoryId!=''" . $fechaDesdeString . $fechaHastaString . $idSeccionString;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getReporteSeccion($fechaDesde, $fechaHasta, $idSeccion)
    {

        $sql = "CALL report(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fechaDesde, $fechaHasta, $idSeccion]);
        $results = $stmt->fetchAll();
        return $results;
    }
}