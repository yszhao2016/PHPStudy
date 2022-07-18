require.config({
    baseUrl: 'js',
    paths: {
        jquery: 'lib/jquery-1.11.1',
    },
    shim: {
        'backbone': {
            deps: ['underscore', 'jquery'],
            exports: 'Backbone'
        },
        'underscore': {
            exports: '_'
        },
        'modal': {//模态框插件不是模块化
            deps: ['jquery'],
            export: "modal"
        },
    },
    map: {
        'script/newmodule': {
            'foo': 'foo1.2'
        },
        'script/oldmodule': {
            'foo': 'foo1.0'
        }
    },
    config: {
        'script/bar': {
            size: 'large'
        },
        'script/baz': {
            color: 'blue'
        }
    }
});

require(['jquery', 'script/hello'], function ($, hello) {
    $("#btn").click(function () {
        hello.showMessage("hangge.com");

    });
    alert(hello.version);
    alert(hello.moduleName);
});


require(['jquery'],function($){
    require(['mtWindow'],function(mtWindow){
        mtWindow.mtWindow("手机号格式错误");
    })
})