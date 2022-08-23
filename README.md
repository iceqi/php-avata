#Avata 文昌链 PHP

## 基于官方api 文档开发

### 使用方法

***所有参数通过 类成员属性进行传参***

___具体使用参数请参照官方文档 [文昌链接口文档][1]___

[1]:https://apis.avata.bianjie.ai


```php 
//新增链账户
$account = new \Iceqi\AvataPhp\Apis\Accounts\Accounts();
$account->name = "xxx";
$account->operation_id = "xxx";
$account =$account->create();
$result = $client->request($account)->result();

// 查询链账户 参数参照官方文档
$client = new \Iceqi\AvataPhp\Client("xxx", "xxx");
$account = new \Iceqi\AvataPhp\Apis\Accounts\Accounts();
$account->limit = 10;
$account = $account->info();
$result = $client->request($account)->result();

//创建 NFT 类别

$client = new \Iceqi\AvataPhp\Client("xxx","xxx");
$classes = new \Iceqi\AvataPhp\Apis\Nft\Classes();
$classes->name = "xxx";
$classes->owner = "xxx";
$classes->operation_id = "xxx";
$classeParam =$classes->create();
$result = $client->request($classeParam)->result();
```

