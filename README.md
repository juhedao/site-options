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

使用 `composer update` 更新或使用 `composer install`安装。

也可以使用 'composer require juhedao/site-options=dev-master' 单独安装此插件包。

## 配置

在 `\config\app.php` 中添加 `ServiceProvider`:

```php
'providers' => [
    ...
    Juhedao\SiteOptions\OptionsServiceProvider::class
]
```

在 `\config\app.php` 中添加 `Facade`:

```php
'aliases' => [
    ...
    'Options' => Juhedao\SiteOptions\OptionsFacade::class
]
```

最后发布包的资源

```sh
php artisan vendor:publish
```

## 使用


