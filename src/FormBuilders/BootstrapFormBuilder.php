<?php
namespace Almeida\UIKitLaravel\FormBuilders;

use Illuminate\Html\FormBuilder as IlluminateFormBuilder;

class BootstrapFormBuilder extends IlluminateFormBuilder
{

	/**
	 * Extended options for Form input behaviours
	 * @var array
	 */
	public $options = array(
		'placeholder' => true, 		// Use the name of the form to generate input placeholder messages where relevant
		'label'       => true,
		'static'      => false,
	);


	/**
	 * Form::select()
	 */
	public function select($name, $list = array(), $selected = null, $options = array())
	{
		$options['class'] = 'form-control';
		$wrap['class']    = 'form-group';

		$label = parent::label($name, null, []);
		$input = parent::select($name, $list, $selected, $options);

		return $this->wrap($label.$input, $wrap);
	}

	/**
	 * Form::text()
	 * Form::text($name, $value, array('static' => true))
	 */
	public function text($name, $value=null, $options=array())
	{
		$this->options = array_merge($this->options, $options);

		$inputOptions['class'] = 'form-control';
		$wrap['class']    = 'form-group';


		$label = parent::label($name, $value, $options);

		if ($this->options['static'] == true) {
			$value = $this->guessFormValue('text', $name, $value);
			$input = '<p class="form-control-static">'.$value.'</p>';
		} else {
			$input = parent::text($name, $value, $inputOptions);
		}

		return $this->wrap($label.$input, $wrap);
	}

	/**
	 * Form::checkbox()
	 */
	public function checkbox($name, $value = 1, $checked = null, $options = array())
	{
		$wrap['class'] = 'form-group checkbox';

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

	/**
	 * Get value for this field based on provided model data
	 */
	protected function guessFormValue($type, $name, $value=null)
	{
		if ( ! in_array($type, $this->skipValueTypes))
		{
			$value = $this->getValueAttribute($name, $value);
		}

		return $value;
	}


}
