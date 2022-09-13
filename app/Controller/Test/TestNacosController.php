<?php

namespace App\Controller\Test;

use App\Controller\AbstractController;
use App\JsonRpc\Consumer\CalculatorServiceConsumer;
use App\JsonRpc\Consumer\DefaultServiceConsumer;
use App\JsonRpc\Consumer\DefaultServiceOtherConsumer;
use App\JsonRpc\Consumer\TcpFooServiceConsumer;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController()
 */
class TestNacosController extends AbstractController
{
    public function test_nacos(){
        $client = $this->container->get(CalculatorServiceConsumer::class);

        /** @var  $result */
        $a = 10;
        $b = 20;
        $msg = "返回结果：";

        $result = $client->add($a, $b);
        $msg .= "{$a}+{$b} => " . $result .PHP_EOL;

        $result = $client->multiplication($a, $b);
        $msg .= "{$a}*{$b} => " . $result .PHP_EOL;

        var_dump($msg);
        return $this->response->raw($msg);
    }

    public function test_nacos_default(){
        $client = $this->container->get(DefaultServiceConsumer::class);

        /** @var  $result */
        $a = 10;
        $b = 20;
        $msg = "返回结果：";

        $params = [
            'a' => $a,
            'b' => $b,
        ];
        $result = $client->get('add',$params);
        $msg .= "{$a}+{$b} 的十倍 => " . $result .PHP_EOL;

        $result = $client->get('multiplication',$params);
        $msg .= "{$a}*{$b} 的十倍 => " . $result .PHP_EOL;

        var_dump($msg);
        return $this->response->raw($msg);
    }
    public function test_nacos_other(){
        $client = $this->container->get(DefaultServiceOtherConsumer::class);

        /** @var  $result */
        $a = 10;
        $b = 20;
        $msg = "返回结果：";

        $params = [
            'a' => $a,
            'b' => $b,
        ];
        $result = $client->get('add',$params);
        $msg .= "{$a}+{$b} 的100倍 => " . $result .PHP_EOL;

        $result = $client->get('multiplication',$params);
        $msg .= "{$a}*{$b} 的100倍 => " . $result .PHP_EOL;

        var_dump($msg);
        return $this->response->raw($msg);
    }

    public function test_nacos_jsonrpc_tcp(){
        $client = $this->container->get(TcpFooServiceConsumer::class);

        /** @var  $result */
        $a = 10;
        $b = 20;
        $msg = "返回结果：";

        $params = [
            'a' => $a,
            'b' => $b,
        ];
        $result = $client->get('foo',$params);
        $msg .= "foo() => " . $result .PHP_EOL;

        $result = $client->get('sum',$params);
        $msg .= "sum() => " . $result .PHP_EOL;

        var_dump($msg);
        return $this->response->raw($msg);

    }
}