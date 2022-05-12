# Mobile-Traffic-Meter
Package that allows to obtain the traffic by views of a mobile application for reporting

### Built With

* [React.js](https://reactjs.org/)
* [Laravel](https://laravel.com)
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)

## Installation

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
        $table->bigIncrements('id');
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
Route::get('/faker/{count}', function ($count) {
    MobileTrafficMeter::faker($count);
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

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch
3. Commit your Changes 
4. Push to the Branch
5. Open a Pull Request

## Credits

- [Felipe Peñailillo][link-author]
- [Alejandro Isla][link-author-2]

## License

license. Please see the [license file](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/primafeceshero/mobile-traffic-meter.svg?style=flat-square

[ico-downloads]: https://img.shields.io/packagist/dt/primafeceshero/mobile-traffic-meter.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/primefaceshero/mobile-traffic-meter

[link-downloads]: https://packagist.org/packages/primefaceshero/mobile-traffic-meter

[link-author]: https://github.com/primefaceshero

[link-author-2]: https://github.com/willywes
