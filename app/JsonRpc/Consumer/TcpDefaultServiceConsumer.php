<?php

namespace App\JsonRpc\Consumer;

use Hyperf\RpcClient\AbstractServiceClient;

class TcpDefaultServiceConsumer extends AbstractServiceClient
{
    /**
     * 定义对应服务提供者的服务名称
     * @var string
     */
    protected $serviceName = 'TcpFooService';

    /**
     * 定义对应服务提供者的服务协议
     * @var string
     */
    protected $protocol = 'jsonrpc';

    /**
     * @param string $method
     * @param array $params
     * @return mixed
     */
    public function get(string $method, array $params)
    {
        return $this->__request($method, ['params'=>$params]);
    }
}