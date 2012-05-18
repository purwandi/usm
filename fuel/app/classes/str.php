<?php

class Str extends Fuel\Core\Str
{

	public static function decode_html($str)
	{
		return html_entity_decode(str_replace(array('&nbsp;',"\'"), array(' ',"'"), $str));
	}
}