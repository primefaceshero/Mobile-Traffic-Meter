# Mobile-Traffic-Meter
Package that allows to obtain the traffic by views of a mobile application for reporting

## Installation (Laravel)

Via Composer

``` bash
$ composer require primefaceshero/mobile-traffic-meter
```

Add Service Provider to config/app.php in providers section

``` bash
Primefaceshero\MobileTrafficMeter\MobileTrafficMeterServiceProvider::class,
```

Make migration and Model

``` bash
     Schema::create('log_use_events', function (Blueprint $table) {
        $table->id();
        $table->string('event');
        $table->integer('user_id')->nullable();
        $table->timestamps();
    });
```

``` bash
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogUseEvent extends Model
{
    protected $fillable = [
        'event',
        'user_id',
        'created_at'
    ];
}
```

## Seeder

``` bash
Route::get('/faker', function () {
    MobileTrafficMeter::faker();
    return "done";
});
```

## Methods

use Primefaceshero\MobileTrafficMeter\MobileTrafficMeter;

**Insert** 

|Param          |Description                            |
|---------------|---------------------------------------|
|**event**      |Name of the event (required)|
|**user_id**   |User executing the event  (optional)  |

``` bash
MobileTrafficMeter::insert($event, $user_id)
```


**getAll** 

``` bash
MobileTrafficMeter::getAll()
```


**getByUser** 

|Param          |Description                            |
|---------------|---------------------------------------|
|**user_id**      | - (Required) |

``` bash
MobileTrafficMeter::getByUser($user_id)
```


**getByEvent** 

|Param          |Description                            |
|---------------|---------------------------------------|
|**event**      | - (Required) |

``` bash
MobileTrafficMeter::getByEvent($event)
```


**getByEventAndDate** 

|Param          |Description                            |
|---------------|---------------------------------------|
|**event**      | - (Required) |
|**start_date**      | - (Required) |
|**end_date**      | - (Required) |

``` bash
MobileTrafficMeter::getByEventAndDate($event, $start_date, $end_date)
```

**getByUserAndEvent** 

|Param          |Description                            |
|---------------|---------------------------------------|
|**event**      | - (Required) |
|**user_id**      | - (Required) |

``` bash
MobileTrafficMeter::getByUserAndEvent($user_id, $event)
```

**getByDate** 

|Param          |Description                            |
|---------------|---------------------------------------|
|**start_date**      | - (Required) |
|**end_date**      | - (Required) |

``` bash
MobileTrafficMeter::getByEventAndDate($start_date, $end_date)
```

## Usage

See the DemoController how to use the library to get information from the events

## Credits

- [Felipe Peñailillo][link-author]

## License

license. Please see the [license file](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/primafeceshero/mobile-traffic-meter.svg?style=flat-square

[ico-downloads]: https://img.shields.io/packagist/dt/primafeceshero/mobile-traffic-meter.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/primefaceshero/mobile-traffic-meter

[link-downloads]: https://packagist.org/packages/primefaceshero/mobile-traffic-meter

[link-author]: https://github.com/primefaceshero
