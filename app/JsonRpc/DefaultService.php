<?php

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="DefaultService", protocol="jsonrpc-http", server="jsonrpc-http",publishTo="nacos")
 */
class DefaultService implements DefaultServiceInterface
{
    // 实现一个加法方法，数字参数约定好就可以了
    public function add(array $params): int
    {
        // 这里是服务方法的具体实现
        return ($params['a'] + $params['b']) *10;
    }

    // 实现一个加法方法，
    public function multiplication(array $params): int
    {
        // 这里是服务方法的具体实现
        return ($params['a'] * $params['b']) *10;
    }
}