<?php namespace MyDatabase\Schema\Grammars;

use \Closure;

abstract class Grammar extends \Laravel\Database\Schema\Grammars\Grammar {

	/**
	 * Get the appropriate data type definition for the column.
	 *
	 * @param  Fluent  $column
	 * @return string
	 */
	protected function type(\Laravel\Fluent $column)
	{
		if ($column->type instanceof \Closure)
		{
			return call_user_func($column->type, $column);
		}

		return $this->{'type_'.$column->type}($column);
	}

}