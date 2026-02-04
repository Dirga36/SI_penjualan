# Error - Internal Server Error

Typed property Filament\Actions\ExportBulkAction::$exporter must not be accessed before initialization

PHP 8.3.28
Laravel 12.49.0
127.0.0.1:8000

## Stack Trace

0 - vendor\filament\actions\src\Concerns\CanExportRecords.php:467
1 - vendor\filament\actions\src\Concerns\CanExportRecords.php:184
2 - vendor\filament\support\src\Concerns\EvaluatesClosures.php:36
3 - vendor\filament\actions\src\Concerns\HasSchema.php:47
4 - vendor\filament\actions\src\Concerns\InteractsWithActions.php:669
5 - vendor\filament\actions\src\Concerns\InteractsWithActions.php:517
6 - vendor\filament\actions\src\Concerns\InteractsWithActions.php:481
7 - vendor\filament\actions\src\Concerns\InteractsWithActions.php:468
8 - vendor\filament\actions\src\Concerns\InteractsWithActions.php:118
9 - vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:36
10 - vendor\laravel\framework\src\Illuminate\Container\Util.php:43
11 - vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:96
12 - vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:35
13 - vendor\livewire\livewire\src\Wrapped.php:23
14 - vendor\livewire\livewire\src\Mechanisms\HandleComponents\HandleComponents.php:628
15 - vendor\livewire\livewire\src\Mechanisms\HandleComponents\HandleComponents.php:208
16 - vendor\livewire\livewire\src\LivewireManager.php:131
17 - vendor\livewire\livewire\src\Mechanisms\HandleRequests\HandleRequests.php:158
18 - vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php:46
19 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:265
20 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:211
21 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:822
22 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
23 - vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php:50
24 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
25 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:87
26 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
27 - vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php:48
28 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
29 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:120
30 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:63
31 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
32 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:36
33 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
34 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php:74
35 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
36 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
37 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:821
38 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:800
39 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:764
40 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:753
41 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:200
42 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
43 - vendor\livewire\livewire\src\Features\SupportDisablingBackButtonCache\DisableBackButtonCacheMiddleware.php:19
44 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
45 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:27
46 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
47 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:47
48 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
49 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePostSize.php:27
50 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
51 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:109
52 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
53 - vendor\laravel\framework\src\Illuminate\Http\Middleware\HandleCors.php:61
54 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
55 - vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php:58
56 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
57 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks.php:22
58 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
59 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePathEncoding.php:26
60 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
61 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
62 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:175
63 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:144
64 - vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1220
65 - public\index.php:20
66 - vendor\laravel\framework\src\Illuminate\Foundation\resources\server.php:23

## Request

POST /livewire-8ba1d7ab/update

## Headers

* **host**: 127.0.0.1:8000
* **connection**: keep-alive
* **content-length**: 4480
* **sec-ch-ua-platform**: "Windows"
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36
* **sec-ch-ua**: "Not(A:Brand";v="8", "Chromium";v="144", "Google Chrome";v="144"
* **content-type**: application/json
* **x-livewire**: 1
* **sec-ch-ua-mobile**: ?0
* **accept**: */*
* **origin**: http://127.0.0.1:8000
* **sec-fetch-site**: same-origin
* **sec-fetch-mode**: cors
* **sec-fetch-dest**: empty
* **referer**: http://127.0.0.1:8000/admin/product-transactions
* **accept-encoding**: gzip, deflate, br, zstd
* **accept-language**: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7
* **cookie**: XSRF-TOKEN=eyJpdiI6ImszK080YVNXV1J6NHA0QXQ3cEdldHc9PSIsInZhbHVlIjoiV3hPcExIOUFwNG1rVFhIelAxL3RDQXl6Mk1ZenRaTjBXMENNTFNGeEdrSU5tKzdPQ1h5enArT2JUL0p4T3kvL3VoMGxWREVkZ2tacHZ6VStEN1pEOUxaWnk3bE80UHowc2s3ckI1bFdXL2s1OVllMy90ZEtsU2s2cXk3UyttNUciLCJtYWMiOiIxZGFmN2UwYWY0MWY4NzhhOTU3NWNlNGUxZGVmMWE2ZGUwYjhiYjU2MDdkODdiNjM0YzAxMzcyNDQ3OTk4YjFjIiwidGFnIjoiIn0%3D; laravel-session=eyJpdiI6IjE4emdZQ0VoOWgzTjErQ1o2dGZJcnc9PSIsInZhbHVlIjoiYmhrUTFDa1JUTGRRNEVVWkFLWWdjQ3VZTWJxY0RvRmNpYVJOcVpGTGRXMmZWQXkweklUVW9kTWkzcjI2MzN3SXhTZnpmeXVBYksvVjMyUFJkZmdBWHdoTXhZcGo1b1Qzd2pGWml6MW42TUVyRE1SU1FWMytqQ04wdmtTSGd2TWciLCJtYWMiOiIyYTcwOGU0ZjFiYTEzOWRlYWQzYjkxOTRiZDVkZTkwMTUyMGI1ZDg0Y2EwOTI4M2ViZGY5YjY5NjllNDVmYTk1IiwidGFnIjoiIn0%3D

## Route Context

controller: Livewire\Mechanisms\HandleRequests\HandleRequests@handleUpdate
route name: default.livewire.update
middleware: web

## Route Parameters

No route parameter data available.

## Database Queries

* mysql - select * from `sessions` where `id` = 'yO5VjESZM3DnmUIsYYQxlnBcq2fPxZRa8UUsKq8s' limit 1 (3.62 ms)
* mysql - select * from `cache` where `key` in ('laravel-cache-livewire-checksum-failures:127.0.0.1') (0.5 ms)
* mysql - select * from `users` where `id` = 1 and `users`.`deleted_at` is null limit 1 (0.87 ms)
* mysql - select * from `cache` where `key` in ('laravel-cache-filament-excel:exports:1') (0.42 ms)
* mysql - delete from `cache` where `key` in ('laravel-cache-filament-excel:exports:1', 'laravel-cache-illuminate:cache:flexible:created:filament-excel:exports:1') (0.5 ms)
