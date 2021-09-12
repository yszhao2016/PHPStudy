<?php

namespace samplefactory;

class SportsShoes implements ShoeInterface
{

    public function useMaterials()
    {
        echo 'SportsShoes useMaterials'."\n";
    }

    public function create()
    {
        echo 'SportsShoes create'."\n";
    }

}