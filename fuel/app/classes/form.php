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
					 '.parent::input($name, Str::decode_html($val), $att).'
					 <span class="help-inline">'.$error.'</span>
				</div>
			</div>';
		}
		else
		{
			return '<div class="control-group">
				<label class="control-label" for="form_'.$name.'">'.$label.'</label>
				<div class="controls">
					 '.parent::input($name, Str::decode_html($val), $att).'
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
					 '.parent::password($name, Str::decode_html($val), $att).'
					 <span class="help-inline">'.$error.'</span>
				</div>
			</div>';
		}
		else
		{
			return '<div class="control-group">
				<label class="control-label" for="form_'.$name.'">'.$label.'</label>
				<div class="controls">
					 '.parent::password($name, Str::decode_html($val), $att).'
				</div>
			</div>';
		}
		
	}

	public static function drop ($label, $name, $value = null, array $options = array() , array $att = array())
	{
		$val = Input::post($name) ? Input::post($name) : $value;

		if ($error = static::error($name))
		{
			return '<div class="control-group error">
				<label class="control-label error" for="form_'.$name.'">'.$label.'</label>
				<div class="controls error">
					 '.parent::select($name, Str::decode_html($val), $options, $att).'
					 <span class="help-inline">'.$error.'</span>
				</div>
			</div>';
		}
		else
		{
			return '<div class="control-group">
				<label class="control-label" for="form_'.$name.'">'.$label.'</label>
				<div class="controls">
					 '.parent::select($name, Str::decode_html($val), $options, $att).'
				</div>
			</div>';
		}
		
	}

	public static function check ($label, $name, $value = null, array $options = array() , array $att = array())
	{
		$val = Input::post($name) ? Input::post($name) : $value;

		$data = '';

		if (is_array($options) && isset($options))
		{
			foreach ($options as $key => $val) 
			{
				$att['id'] = $name.'_'.$key;
				$data .= '<label class="checkbox">'.parent :: checkbox($name, $value, $att).$val.'</label>'."\n";
			}
		}

		if ($error = static::error($name))
		{
			return '<div class="control-group error">
				<label class="control-label error" for="form_'.$name.'">'.$label.'</label>
				<div class="controls error">
					 '.$data.'
					 <span class="help-inline">'.$error.'</span>
				</div>
			</div>';
		}
		else
		{
			//checkbox($field, $value = null, array $attributes = array())
			return '<div class="control-group">
				<label class="control-label" for="form_'.$name.'">'.$label.'</label>
				<div class="controls">
					'.$data.'
				</div>
			</div>';
		}
		
	}

	public static function area ($label, $name, $value = null, array $att = array())
	{
		$val = Input::post($name) ? Input::post($name) : $value;

		if ($error = static::error($name))
		{
			return '<div class="control-group error">
				<label class="control-label error" for="form_'.$name.'">'.$label.'</label>
				<div class="controls error">
					 '.parent::textarea($name, Str::decode_html($val), $att).'
					 <span class="help-inline">'.$error.'</span>
				</div>
			</div>';
		}
		else
		{
			return '<div class="control-group">
				<label class="control-label" for="form_'.$name.'">'.$label.'</label>
				<div class="controls">
					 '.parent::textarea($name, Str::decode_html($val), $att).'
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