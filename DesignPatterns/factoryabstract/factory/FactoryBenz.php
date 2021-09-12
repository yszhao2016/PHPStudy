<?php


namespace factoryabstract\factory;


use factoryabstract\IFactory;
use factoryabstract\productsportcar\BenzMini;
use factoryabstract\productsportcar\BenzSport;

class FactoryBenz implements IFactory
{
    public function makeSportCar()
    {
        // TODO: Implement makeSportCar() method.
        $sport = new BenzSport();

        return $sport;

    }

    public function makeMiniCar()
    {
        // TODO: Implement makeMiniCar() method.

        $mini = new BenzMini();
        return $mini;
    }

}