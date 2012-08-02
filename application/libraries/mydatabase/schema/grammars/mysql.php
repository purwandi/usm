<?php namespace MyDatabase\Schema\Grammars;

class MySQL extends \Laravel\Database\Schema\Grammars\MySQL {

	/**
	 * Generate the data-type definition for an enum.
	 *
	 * @param  Fluent   $column
	 * @return string
	 */
	protected function type_enum(\Laravel\Fluent $column)
	{
		if ( ! is_null($column->default))
		{
			return 'ENUM(\''.implode("','",$column->options).'\') DEFAULT "'.$column->default.'"';
		}
		else
		{
			return 'ENUM(\''.implode("','",$column->options).'\')';
		}
	}

	/**
	 * Generate the data-type definition for a date.
	 *
	 * @param  Fluent  $column
	 * @return string
	 */
	protected function type_date(\Laravel\Fluent $column)
	{
		return 'DATE';
	}

	/**
	 * Generate the data-type definition for a datetime.
	 *
	 * @param  Fluent  $column
	 * @return string
	 */
	protected function type_datetime(\Laravel\Fluent $column)
	{
		return 'DATETIME';
	}

	/**
	 * Generate the data-type definition for a year.
	 *
	 * @param  Fluent  $column
	 * @return string
	 */
	protected function type_year(\Laravel\Fluent $column)
	{
		return 'YEAR';
	}

	/**
	 * Generate the data-type definition for an integer.
	 *
	 * @param  Fluent  $column
	 * @return string
	 */
	protected function type_integer(\Laravel\Fluent $column)
	{
		return 'INT('.$column->length.')';
	}
}