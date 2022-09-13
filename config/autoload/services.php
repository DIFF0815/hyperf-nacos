<?php
return [
    'enable' => [
        'discovery' => true,
        'register' => true,
    ],
    'consumers' => value(function () {
        $consumers = [];
        //http
        $servicesHttp = [
            //多个服务
            'CalculatorService' => App\JsonRpc\CalculatorServiceInterface::class,
            'DefaultService' => App\JsonRpc\DefaultServiceInterface::class,
            'DefaultServiceOther' => App\JsonRpc\DefaultServiceOther::class,
        ];
        foreach ($servicesHttp as $name => $interface) {
            $consumers[] = [
                'name' => $name,
                'service' => $interface,
                'id' => $interface,
                'protocol' => 'jsonrpc-http',
                'load_balancer' => 'random',
                'registry' => [
                    'protocol' => 'nacos',
                    'address' => 'http://192.168.240.120:8848',
                ],
                'nodes' => [
                    ['host' => '192.168.240.120', 'port' => 9502],
                ],
            ];
        }
        $servicesTcp = [
            //多个服务
            'TcpFooService' => App\JsonRpc\TcpFooServiceInterface::class,
        ];
        foreach ($servicesTcp as $name => $interface) {
            $consumers[] = [
                'name' => $name,
                'service' => $interface,
                'id' => $interface,
                'protocol' => 'jsonrpc',
                'registry' => [
                    'protocol' => 'nacos',
                    'address' => 'http://192.168.240.120:8848',
                ],
                'nodes' => [
                    ['host' => '192.168.240.120', 'port' => 9502],
                ],
            ];
        }
        return $consumers;
    }),
    'providers' => [],
    'drivers' => [
        'nacos' => [
            // nacos server url like https://nacos.hyperf.io, Priority is higher than host:port
            // 'url' => '',
            // The nacos host info
            'host' => '192.168.240.120',
            'port' => 8848,
            // The nacos account info
            'username' => 'nacos',
            'password' => 'nacos',
            'guzzle' => [
                'config' => null,
            ],
            'group_name' => 'api',
            'namespace_id' => '5347a3c7-4f00-4e9d-a0f4-e75b6354ae5e',
            'heartbeat' => 5,
            //'ephemeral' => false, // 是否注册临时实例
        ],
    ],
];
