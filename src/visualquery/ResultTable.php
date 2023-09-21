<?php

namespace demo\visualquery;

use \koolreport\dashboard\widgets\Text;
use \koolreport\dashboard\widgets\Table;

class ResultTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(10)
        ->tableHover(true)
        ->tableStriped(true)
        ;
    }

    protected function dataSource()
    {
        $visualQueryDemo = $this->sibling("VisualQueryDemo");
        $qb = $visualQueryDemo->toQueryBuilder();
        $qb->whereRaw("1 > 0");

        $query = \demo\Automaker::new()
        ->querybuilder($qb)
        ->useSqlParams(true)
        ;

        $queryStr = $qb->toMySQL([
            'useSQLParams' => "name",
        ]);
        // echo "queryStr: $queryStr<br>";
        $sqlParams = $qb->getSQLParams();
        $query = \demo\Automaker::new()
        ->directSQL($queryStr)
        ->params($sqlParams)
        ;

        $queryStr = $qb->toMySQL();
        // echo "queryStr: $queryStr<br>";
        // // $query = \demo\AutomakerLocal::rawSQL($queryStr);
        $query = \demo\Automaker::new()
        // $query = \demo\AutoMakerMySQLiLocal::new()
        ->directSQL($queryStr);

        // $query = new \demo\AutoMakerLocal();
        // $query->directSQL($queryStr);
        // $query = \demo\AutoMakerLocal::rawSQL($queryStr);
        
        return $query->run();
    }
}
