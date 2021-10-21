<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../vendor/autoload.php';

use NoahBuscher\Macaw\Macaw;

Macaw::get('fuck', function() {
  echo "成功！";
});

Macaw::get('(:all)', function($fu) {
  echo '未匹配到路由<br>'.$fu;
});

Macaw::dispatch();