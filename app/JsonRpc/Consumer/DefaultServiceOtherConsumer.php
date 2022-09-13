<?php

namespace App\JsonRpc\Consumer;


class DefaultServiceOtherConsumer extends DefaultServiceConsumer
{
    /**
     * 定义对应服务提供者的服务名称
     * 只需要改这个属性,方法实现可以不要,直接通过参数传递
     * @var string
     */
    protected $serviceName = 'DefaultServiceOther';

}