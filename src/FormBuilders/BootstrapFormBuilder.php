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
	 * Natural way of indicating emphasis
	 * @var array
	 */
	public $feedback = array(
		'default',
		'primary',
		'success',
		'info',
		'warning',
		'danger'
	);


	/**
	 * Form::multiple()
	 *
	 * Easy mutiple checkboxes
	 *
	 * @todo - Add some sexy
	 *       http://stackoverflow.com/questions/10887893/twitter-bootstrap-checkbox-columns-columns-within-form
	 *
	 * @param  string $name      name of checkbox group, use plural. ie. roles, categories etc.
	 * @param  array  $list      eg. Model::lists('title', 'id')
	 * @param  array  $selected  array of selected ids
	 * @param  array  $options
	 */
	public function multiple($name, $list = array(), $selected = array(), $options = array())
	{
		$defaults = [
			'type' => 'checkbox',
			'valid' => ['checkbox', 'select']
		];
		$options = array_merge($defaults, $options);
		$wrap['class']    = 'form-group';

		if ($options['type'] == 'select') {
			dd('@todo pass to $this->select() ?');
		}

		$boxes = [];

		foreach ($list as $checkboxValue => $checkboxLabel) {

			$checked = (in_array($checkboxValue, $selected));
			$input   = parent::checkbox($name.'[]', $checkboxValue, $checked);

			$checkbox = '';
			$checkbox.='<label class="checkbox">'
			  .$input
			  .$checkboxLabel
			.'</label>';
			$boxes[] = $checkbox;
		}

		// Assign a label from the name
		$label = $name;
		if (isset($options['label'])) {
			$label = $options['label'];
		}

		$label   = parent::label($label, null, []);
		$mutiple = implode(PHP_EOL, $boxes);

		return $this->wrap($label.$mutiple, $wrap);
	}


	/**
	 * Form::select()
	 *
	 * $options['empty'] Automatically prepend an element to the start of the list
	 *
	 */
	public function select($name, $list = array(), $selected = null, $options = array())
	{
		$options['class'] = 'form-control';
		$wrap['class']    = 'form-group';

		// Item to prepend to $list
		if (isset($options['empty'])) {
			if (empty($options['empty'])) {
				$empty = array('' => '');
				$list = $empty + $list;
			} else {
				$list = array('' => $options['empty']) + $list;
			}
		}

		if (isset($options['name'])) {
			$label = $options['name'];
		} else {
			$label = $name;
		}

		$label = parent::label($label, null, []);

		// @todo - Look into
		// Weird, the input name is being inferred from the label even
		// though $name is directly specified
		// force via $options['name'] for now
		$options['name'] = $name;
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
	 * Form::textarea()
	 * Form::textarea($name, $value, array('static' => true))
	 */
	public function textarea($name, $value=null, $options=array())
	{
		$this->options = array_merge($this->options, $options);

		$inputOptions['class'] = 'form-control';
		$wrap['class']    = 'form-group';


		$label = parent::label($name, $value, $options);

		if ($this->options['static'] == true) {
			$value = $this->guessFormValue('textarea', $name, $value);
			$input = '<p class="form-control-static">'.$value.'</p>';
		} else {
			$input = parent::textarea($name, $value, $inputOptions);
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

		if (isset($options['feedback']) && in_array($options['feedback'], $this->feedback)) {
			$options['class'] = 'btn btn-'.$options['feedback'];
		}

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
