# UIKit Laravel

Just a Laravel driver to get [UIKit](https://github.com/arnold-almeida/UIKit) working.

Super alpha release. Suggestions welcome

### Installation via Composer

Add UIKit to your composer.json file to require UIKit

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


### Todo

- [ ] Write up how to
- [ ] Examples
- [ ] Write tests

### How to :

#### Tables


``` php

	// 1.0 - Make sure data is transformed for output

		// Elquoent collection, Paginator
		$data;

		// Format data for presentation to give us...
		$rows = array(
			array(
				'id' => 1,
				'name' => 'John Doe',
				'gender' => 'Male',
			),
			array(
				'id' => 2,
				'name' => 'Jane Doe',
				'gender' => 'Female',
			),
		);

	// 2.0 - Configure how you want the table to behave
	$options = array(
		// @todo - What do we display when there is no data
		'behaviours' => array(
			'no-data' => array(
				'icon' => 'User',
				'message' => "No users found",
				'subtext' => array(
					'label' => 'Create a new User',
					'url' => '/admin/users/create'
				),
			)
		),
		// Add's a sort link <th><a>
		// match on keys
		'sort' => array(
			'name'   => 'name',
			'gender'    => 'gender',
		),
		// Pass in query manually for now.
		// Its a bit tricky to autodetect framework and use relevant env objects
		'query' => Request::query()
	);

	// 3.0 - Build the table
	$table = UIKit::table($rows, $options);

	// 4.0 -  Render the table
	echo $table->render();

	// 5.0 - (Optional) Print pagination
	$pagination = $table->pagination($data, $options);


```

#### Forms

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
