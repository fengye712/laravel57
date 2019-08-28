<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function testRedis()
    {
//        1、String
//        Redis::set('name', 'guwenjie');
//        $values = Redis::get('name');
//        dd($values);

//        2、list 队列
        $key = 'LIST:TEST:R';
        $names = ['PHP','HTML','CSS','JavaScript','Node','Java','Ruby','Python'];
        // 从右往左压入队列
//        $info = Redis::rpush($key,$names);  //返回响应的成功后返回的个数
//        dd($info);
//         出队列
//         取出数据
//        $info = Redis::lrange($key,0,1);
//        print_r($info);
//         3、哈希
        $key = 'HASH:TEST';
        $names = ['id'=>'98',
            'name'=>'HDMI',
            'age'=>'23',
            'tel'=>'13995578699',
            'addtime'=>'12312311314'];
        // 将数据写入hash
//        $info = Redis::hMset($key,$names);
//        dd($info);
        $info=Redis::hsetnx($key,'23','23d');

        //取出所有数据
//        $info = Redis::hGetall($key);
//        取出hash里的 某一个字段的数据
//        $info = Redis::hGet($key,'name');
//        $len=Redis::hLen($key);  //获取长度
//        print_r($len);
//        activity()->log('Look, I count redis len');
//        $info = Redis::hkeys($key);
//        print_r($info);
//      4、集合
        print_r($info);
//      5、


//        //输出："guwenjie"

    }
    public function index()
    {

        $host    = "host=127.0.0.1";
        $port    = "port=5432";
        $dbname   = "dbname=testdb";
        $credentials = "user=postgres password=pass123";
        $db = pg_connect( "$host $port $dbname $credentials" );
        if(!$db){
            echo "Error : Unable to open database\n";
        } else {
            echo "Opened database successfully\n";
        }
        print_r($db);


//        echo 2323;
    }
}
