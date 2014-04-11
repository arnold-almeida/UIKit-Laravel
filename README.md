# UIKit Laravel

Just a Laravel driver to get [UIKit](https://github.com/arnold-almeida/UIKit) working.

Super alpha release. Suggestions welcome

### Installation via Composer

Add UIKit to your composer.json file to require Authority

	require : {
		"almeida/ui-kit-laravel" : "dev-master"
	}

Now update Composer

	composer update

The last **required** step is to add the service provider to `app/config/app.php`

```php
	'Almeida\UIKitLaravel\UIKitLaravelServiceProvider',
```

UIKit should now be avaliable in your application.

You can access the UIKit through the static interface you are used to with Laravel components.

```php
	UIKit::header('Some heading');
```



### Additional (optional) Configuration Options

##### Extend the FormBuilder to render Twitter Bootstrap inputs and buttons

```php
	'Almeida\UIKitLaravel\HtmlServiceProvider',
```

No need to change any markup. The items below will all render with the correct bootstrap markup.


```php

	{{ Form::text() }}
	{{ Form::checkbox() }}
	{{ Form::radio() }}
	{{ Form::submit() }}

```


### Todo

- [ ] Write up how to
- [ ] Examples
- [ ] Write tests

### How to :

#### Tables


``` php

	$table = UIKit::table($rows, $options);
	echo $table->render();
```

