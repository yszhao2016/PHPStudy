<?php


namespace factoryabstract\factory;


use factoryabstract\IFactory;
use factoryabstract\productsportcar\BmwMini;
use factoryabstract\productsportcar\BmwSport;

class FactoryBmw implements  IFactory
{
    public function makeMiniCar()
    {
        // TODO: Implement makeMiniCar() method.
        $mini = new BmwMini();
        return $mini;
    }


    public function makeSportCar()
    {
        // TODO: Implement makeSportCar() method.
        $sport = new BmwSport();
        return $sport;
    }
}