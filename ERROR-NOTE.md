# TypeError - Internal Server Error

App\Filament\Resources\ProductTransactions\Tables\ProductTransactionsTable::App\Filament\Resources\ProductTransactions\Tables\{closure}(): Argument #1 ($record) must be of type App\Models\ProductTransaction, null given, called in C:\laragon\www\practice Laravel\SI_penjualan\vendor\filament\support\src\Concerns\EvaluatesClosures.php on line 36

PHP 8.3.28
Laravel 12.47.0
127.0.0.1:8000

## Stack Trace

<!--[if BLOCK]><![endif]-->0 - app\Filament\Resources\ProductTransactions\Tables\ProductTransactionsTable.php:174
1 - vendor\filament\support\src\Concerns\EvaluatesClosures.php:36
2 - vendor\filament\actions\src\Concerns\CanBeHidden.php:43
3 - vendor\filament\actions\src\Concerns\CanBeHidden.php:34
4 - vendor\filament\actions\src\ActionGroup.php:481
5 - vendor\filament\support\src\Components\ViewComponent.php:122
6 - vendor\laravel\framework\src\Illuminate\Support\helpers.php:130
7 - vendor\filament\tables\resources\views\index.blade.php:306
8 - vendor\livewire\livewire\src\Mechanisms\ExtendBlade\ExtendedCompilerEngine.php:37
9 - vendor\livewire\livewire\src\Mechanisms\ExtendBlade\ExtendedCompilerEngine.php:38
10 - vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php:76
11 - vendor\livewire\livewire\src\Mechanisms\ExtendBlade\ExtendedCompilerEngine.php:16
12 - vendor\laravel\framework\src\Illuminate\View\View.php:208
13 - vendor\laravel\framework\src\Illuminate\View\View.php:191
14 - vendor\laravel\framework\src\Illuminate\View\View.php:160
15 - vendor\filament\support\src\Components\ViewComponent.php:125
16 - vendor\filament\schemas\src\Components\Component.php:221
17 - vendor\filament\schemas\src\Schema.php:205
18 - vendor\filament\support\src\Components\ViewComponent.php:122
19 - vendor\laravel\framework\src\Illuminate\Support\helpers.php:130
20 - vendor\filament\filament\resources\views\pages\page.blade.php:2
21 - vendor\livewire\livewire\src\Mechanisms\ExtendBlade\ExtendedCompilerEngine.php:37
22 - vendor\livewire\livewire\src\Mechanisms\ExtendBlade\ExtendedCompilerEngine.php:38
23 - vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php:76
24 - vendor\livewire\livewire\src\Mechanisms\ExtendBlade\ExtendedCompilerEngine.php:16
25 - vendor\laravel\framework\src\Illuminate\View\View.php:208
26 - vendor\laravel\framework\src\Illuminate\View\View.php:191
27 - vendor\laravel\framework\src\Illuminate\View\View.php:160
28 - vendor\livewire\livewire\src\Mechanisms\HandleComponents\HandleComponents.php:360
29 - vendor\livewire\livewire\src\Mechanisms\HandleComponents\HandleComponents.php:411
30 - vendor\livewire\livewire\src\Mechanisms\HandleComponents\HandleComponents.php:352
31 - vendor\livewire\livewire\src\Mechanisms\HandleComponents\HandleComponents.php:70
32 - vendor\livewire\livewire\src\LivewireManager.php:102
33 - vendor\livewire\livewire\src\Features\SupportPageComponents\HandlesPageComponents.php:19
34 - vendor\livewire\livewire\src\Features\SupportPageComponents\SupportPageComponents.php:118
35 - vendor\livewire\livewire\src\Features\SupportPageComponents\HandlesPageComponents.php:14
36 - vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php:46
37 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:265
38 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:211
39 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:822
40 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
41 - vendor\filament\filament\src\Http\Middleware\DispatchServingFilamentEvent.php:15
42 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
43 - vendor\filament\filament\src\Http\Middleware\DisableBladeIconComponents.php:14
44 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
45 - vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php:50
46 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
47 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:87
48 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
49 - vendor\laravel\framework\src\Illuminate\Session\Middleware\AuthenticateSession.php:69
50 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
51 - vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php:63
52 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
53 - vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php:48
54 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
55 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:120
56 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:63
57 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
58 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:36
59 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
60 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php:74
61 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
62 - vendor\filament\filament\src\Http\Middleware\SetUpPanel.php:19
63 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
64 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
65 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:821
66 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:800
67 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:764
68 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:753
69 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:200
70 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
71 - vendor\livewire\livewire\src\Features\SupportDisablingBackButtonCache\DisableBackButtonCacheMiddleware.php:19
72 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
73 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
74 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:31
75 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
76 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
77 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:51
78 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
79 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePostSize.php:27
80 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
81 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:109
82 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
83 - vendor\laravel\framework\src\Illuminate\Http\Middleware\HandleCors.php:48
84 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
85 - vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php:58
86 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
87 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks.php:22
88 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
89 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePathEncoding.php:26
90 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
91 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
92 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:175
93 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:144
94 - vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1220
95 - public\index.php:20
96 - vendor\laravel\framework\src\Illuminate\Foundation\resources\server.php:23
<!--[if ENDBLOCK]><![endif]-->
## Request

GET /admin/product-transactions

## Headers

<!--[if BLOCK]><![endif]-->* **host**: 127.0.0.1:8000
* **connection**: keep-alive
* **cache-control**: max-age=0
* **sec-ch-ua**: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"
* **sec-ch-ua-mobile**: ?0
* **sec-ch-ua-platform**: "Windows"
* **upgrade-insecure-requests**: 1
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36
* **accept**: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
* **sec-fetch-site**: same-origin
* **sec-fetch-mode**: navigate
* **sec-fetch-user**: ?1
* **sec-fetch-dest**: document
* **referer**: http://127.0.0.1:8000/admin/produks
* **accept-encoding**: gzip, deflate, br, zstd
* **accept-language**: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7
* **cookie**: remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d=eyJpdiI6IlhYYzdpTFlXUUpGRlFQd0VYNll1THc9PSIsInZhbHVlIjoiV2lIVU0rVjAzbTlkRGJmWTJYOHR3UjJ2MDNaV3c0RndSYm84L3VoaWRRVW9Td1hlMm5SOE1rUmp5U0Qwb2xZZVcrVFFYZmxpOEJJTTZ1SklsOVZkdG1hTTB3c2hKZzJ4NTFueS9VS3dsR1pFWXlheG5TbzI0dzNJZ2J2Uk5CNTV5Y3hldngvLzBOUlJudWYwN1R6dElCUEkrTU55OTgzVURnTGxCRk9ZelBPeTY2WStEQnFiaVg0eC9Bbko5Mm5WME93MEdiaTNia21rbHVJSGd6RzdqYzhPOW1zVFNhUldjR1VMWVVKZlhCND0iLCJtYWMiOiIyOWY5YjUwNmY4NDZkMDY3NGU4M2Y0ZGIyOWUxYjZkZjdiOTE5ZjcyN2MzYzA3ZWI0MjkwNTFhNGYxNDMwYzYxIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IlNQQ3JQUU9jT04yTkhJMVZJVjRvTkE9PSIsInZhbHVlIjoiOGlUSnd2bkJ4enNaTWU5V0dVeEN5TlRpNWlqZGdZSUlFYUJ0aFNGTkdnNDRySlc0RytObkpiMTllM3BzSEFTZkYwd0V5VUhNNllGMVRQMG42S3NkdlNpeERvZzhDZURzaWZ5M0lEQllmZE5MUnpILzY2czc5TW1zZUhRYXhjamQiLCJtYWMiOiI4Zjg5NjBiYWY2ZDc5MGU1MzU4M2JmODk3Yjk3MTkyNjljZDZjZTY5YTMyYjcwZjY1YmU0NTczNDBlY2YxYzM1IiwidGFnIjoiIn0%3D; laravel-session=eyJpdiI6ImtTR3VNdWtLYVhZWVF6NGVkMy9FTUE9PSIsInZhbHVlIjoiWWd4WkhLTUtPT1VGbk11SVRPOFM2SlovdDFSK2M2VnhXZUJydFEyb2RaL0szMlh4aGxWOUhpa1pHcDVYclVkNXZwcjI4ZXExSDBUNlhXZ215aEZvR1JqMmFBL05CRk5DbTVnK3BuN2xzT001ZEVYeldVNXdYYzZWbFNZVTBuRVgiLCJtYWMiOiJmMzU3NmJiZGQ4MWE5MmQ5NWNhYWYzMTZjNWE4NDQ1ZmM4NzMyOTc5NDhjZjdkOGMyMzgxOTFmNjcyOTQ3OTY1IiwidGFnIjoiIn0%3D
<!--[if ENDBLOCK]><![endif]-->
## Route Context

<!--[if BLOCK]><![endif]-->controller: App\Filament\Resources\ProductTransactions\Pages\ListProductTransactions
route name: filament.admin.resources.product-transactions.index
middleware: panel:admin, Illuminate\Cookie\Middleware\EncryptCookies, Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse, Illuminate\Session\Middleware\StartSession, Filament\Http\Middleware\AuthenticateSession, Illuminate\View\Middleware\ShareErrorsFromSession, Illuminate\Foundation\Http\Middleware\VerifyCsrfToken, Illuminate\Routing\Middleware\SubstituteBindings, Filament\Http\Middleware\DisableBladeIconComponents, Filament\Http\Middleware\DispatchServingFilamentEvent, Filament\Http\Middleware\Authenticate
<!--[if ENDBLOCK]><![endif]-->
## Route Parameters

<!--[if BLOCK]><![endif]-->No route parameter data available.
<!--[if ENDBLOCK]><![endif]-->
## Database Queries

<!--[if BLOCK]><![endif]-->* mysql - select * from `sessions` where `id` = 'zQg05kpQn7zAEnHRDNyT9tsHZveOMrBO2TvPR9Pw' limit 1 (17.5 ms)
* mysql - select * from `users` where `id` = 1 limit 1 (0.84 ms)
* mysql - select count(*) as aggregate from `product_transactions` where (`product_transactions`.`deleted_at` is null) (0.65 ms)
* mysql - select * from `product_transactions` where (`product_transactions`.`deleted_at` is null) order by `created_at` desc, `product_transactions`.`id` desc limit 10 offset 0 (0.79 ms)
<!--[if ENDBLOCK]><![endif]-->