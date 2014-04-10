# Laravel UI Kit

Just a laravel wrapper to get [UIKit](https://github.com/arnold-almeida/UiKit) working.

Super alpha release. Suggestions welcome

## Install

Pull this package in through Composer.

```js
{
	"require": {
		"almeida/ui-kit-laravel": "0.1.*"
	}
}
```

## Todo

- [ ] Write up how to
- [ ] Write tests

## Usage

Quick guide

```php

	// Render a table

	$table = UIKit::table($rows);
	echo $table->render();

	// Render a h1 tag
	UIKit::header('Some heading');

```

Forms

This package extends the base Form class so it should provide bootstrap suport out of the box
for all your Form elements.

```php

	// Currently supported

	{{ Form::text() }}
	{{ Form::checkbox() }}
	{{ Form::radio() }}
	{{ Form::submit() }}



```

More ... [Docs](https://github.com/arnold-almeida/UIKit/tree/master/docs)
