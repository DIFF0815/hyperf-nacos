<?php

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * 服务提供者 publicTo 为nacos
 * 注意，如希望通过服务中心来管理服务，需在注解内增加 publishTo 属性
 * @RpcService(name="TcpFooService", protocol="jsonrpc", server="jsonrpc",publishTo="nacos")
 */
class TcpFooService implements TcpFooServiceInterface
{
    public function foo(array $params): string
    {
        return $params['a'] . '-' . $params['b'] . '-' . 'foo';
    }

    public function sum(array $params): string
    {
        return 'foo-sum=' . ($params['a'] + $params['b']);
    }
}