<?php namespace Almeida\UIKitLaravel;

use Illuminate\Html\Formbuilder as IlluminateFormBuilder;

class FormBuilder extends IlluminateFormBuilder
{

	/**
	 * @todo Workout a way to get the framework we want to use ?
	 * eg. __construct(HtmlBuilder $html, UrlGenerator $url, $csrfToken, UIKitFramework $framework)
	 */
	public $style = 'bootstrap';

	/**
	 * Extended options for Form input behaviours
	 * @var array
	 */
	public $options = array(
		'placeholder' => true,   // Use the name of the form to generate input placeholder messages where relevant
		'label' => true,         // Generate labels from a name for a given input
	);

	/**
	 * Form::text()
	 */
	public function text($name, $value=null, $options=array())
	{
		switch ($this->style) {
			case 'bootstrap':
			default:
				$inputOptions['class'] = 'form-control';
				$wrap['class']    = 'form-group';
				break;
		}
		$label = parent::label($name, $value, $options);
		$input = parent::text($name, $value, $inputOptions);

		return $this->wrap($label.$input, $wrap);
	}

	/**
	 * Form::checkbox()
	 */
	public function checkbox($name, $value = 1, $checked = null, $options = array())
	{
		switch ($this->style) {
			case 'bootstrap':
			default:
				$wrap['class']    = 'form-group checkbox';
				break;
		}

		$input = parent::checkbox($name, $value, $checked, $options);
		$html = "<label>"
			.$input
			.ucfirst($name)
		."</label>";

		return $this->wrap($html, $wrap);
	}

	/**
	 * Form::radio()
	 */
	public function radio($name, $value = null, $checked = null, $options = array())
	{
		if (is_null($value)) $value = $name;

		return $this->checkable('radio', $name, $value, $checked, $options);
	}

	/**
	 * Form::submit()
	 */
	public function submit($value = null, $options = array())
	{
		$options['class'] = 'btn btn-default';
		return parent::submit($value, $options);
	}

	/**
	 * Wrap inputs/labels in a <div>
	 */
	protected function wrap($input, $options=array())
	{
		return '<div class="'.$options['class'].'">
			'.$input.'
		</div>';
	}


}
