<?php

namespace samplefactory;


class ShoeFactory
{
    /**
     * @param $type  鞋子类型
     */
    public static function produce($type)
    {
        switch ($type) {
            case 'sports':
                return new SportsShoes();
                break;
            case 'leather':
                return new LeatherShoes();
                break;
            default:
                echo "xxxxxxxx";
                break;
        }
    }
}