Site Options
======

为网站创建options表，并提供增删改查以及Blade扩展功能。

## 安装

将 `juehedao/site-options` 添加到 'composer.json' 中的 'require' 数组中：

```javascript
{
    "require": {
        "juhedao/site-options": "dev-master"
    }
}
```

使用 `composer update` 更新或使用 `composer install` 安装。

也可以使用 'composer require juhedao/site-options=dev-master' 单独安装此插件包。

## 配置

在 `\config\app.php` 中添加 `ServiceProvider`:

```php
'providers' => [
    ...
    Juhedao\SiteOptions\OptionServiceProvider::class
]
```

在 `\config\app.php` 中添加 `Facade`:

```php
'aliases' => [
    ...
    'Option' => Juhedao\SiteOptions\OptionFacade::class
]
```

最后发布包的资源

```sh
php artisan vendor:publish
```

## 使用

### Blade

```sh
{{option('option_name')}}
```

### 程序中读取

```php
use Option;
   ...
   $options = Option::getSingle('option_name');               //通过option_name获取单个值
   $optionGroup = Option::getGroup('option_group');           //通过group_name获取options列表 lists('option_name','option_value')
   $optionAutoload = Option::getAutoload();                   //获取所有需要自动加载的options
   $optionGroupNames = Option::getGroupName();                //获取所有group_name
   $optionList = Option::getWhereNames(['name1','name2']);    //whereIn(['name1','name2'])
```

### 保存

```php
use Option;
   ...
   Option::save($option_name,$option_group,$option_value,$autoload);
```

### 更新

```php
use Option;
   ...
   Option::update($option_name,$option_group,$option_value,$autoload);
```