<?php

class Form extends Fuel\Core\Form {

	public static function text ($label, $name, $value = null, array $att = array())
	{
		$val = Input::post($name) ? Input::post($name) : $value;

		if ($error = static::error($name))
		{
			return '<div class="control-group error">
				<label class="control-label error" for="form_'.$name.'">'.$label.'</label>
				<div class="controls error">
					 '.parent::input($name, $val, $att).'
					 <span class="help-inline">'.$error.'</span>
				</div>
			</div>';
		}
		else
		{
			return '<div class="control-group">
				<label class="control-label" for="form_'.$name.'">'.$label.'</label>
				<div class="controls">
					 '.parent::input($name, $val, $att).'
				</div>
			</div>';
		}
		
	}

	public static function pass ($label, $name, $value = null, array $att = array())
	{
		$val = Input::post($name) ? Input::post($name) : $value;

		if ($error = static::error($name))
		{
			return '<div class="control-group error">
				<label class="control-label error" for="form_'.$name.'">'.$label.'</label>
				<div class="controls error">
					 '.parent::password($name, $val, $att).'
					 <span class="help-inline">'.$error.'</span>
				</div>
			</div>';
		}
		else
		{
			return '<div class="control-group">
				<label class="control-label" for="form_'.$name.'">'.$label.'</label>
				<div class="controls">
					 '.parent::password($name, $val, $att).'
				</div>
			</div>';
		}
		
	}

	// public static function select($field, $values = null, array $options = array(), array $attributes = array())
	public static function drop ($label, $name, $value = null, array $options = array() , array $att = array())
	{
		$val = Input::post($name) ? Input::post($name) : $value;

		if ($error = static::error($name))
		{
			return '<div class="control-group error">
				<label class="control-label error" for="form_'.$name.'">'.$label.'</label>
				<div class="controls error">
					 '.parent::select($name, $val, $options, $att).'
					 <span class="help-inline">'.$error.'</span>
				</div>
			</div>';
		}
		else
		{
			return '<div class="control-group">
				<label class="control-label" for="form_'.$name.'">'.$label.'</label>
				<div class="controls">
					 '.parent::select($name, $val, $options, $att).'
				</div>
			</div>';
		}
		
	}

	public static function error ($name = null)
	{
		$val = Session::get_flash('error');

		if ($val)
		{
			if (isset($val[$name]))
			{
				return $val[$name];
			}
		}
		else
		{
			return false;
		}
	}

}