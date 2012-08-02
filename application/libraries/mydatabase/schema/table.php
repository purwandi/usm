<?php namespace MyDatabase\Schema;

use \Closure;

class Table extends \Laravel\Database\Schema\Table {

	/**
	 * Add an enum column to the table.
	 *
	 * @param  string	$name
	 * @param  array	$options
	 * @return Fluent
	 */
	public function enum($name, $options, $default = null)
	{
		return $this->column(__FUNCTION__, compact('name', 'options', 'default'));
	}

	/**
	 * Add a date column to the table.
	 *
	 * @param  string  $name
	 * @return Fluent
	 */
	public function date($name)
	{
		return $this->column(__FUNCTION__, compact('name'));
	}

	/**
	 * Add a date-time column to the table.
	 *
	 * @param  string  $name
	 * @return Fluent
	 */
	public function datetime($name)
	{
		return $this->column(__FUNCTION__, compact('name'));
	}

	/**
	 * Create date-time columns for creation and update timestamps.
	 *
	 * @return void
	 */
	public function timestamps()
	{
		$this->datetime('created_at');

		$this->datetime('updated_at');
	}

	/**
	 * Add a year column to the table.
	 *
	 * @param  string  $name
	 * @return Fluent
	 */
	public function year($name)
	{
		return $this->column(__FUNCTION__, compact('name'));
	}

	/**
	 * Add a generic column to the table
	 * 
	 * @param string $name
	 * @param bool   $inctrement
	 * @return Fluent
	 */
	public function generic($name, \Closure $fluent)
	{
		return $this->column($fluent, compact('name'));
	}

	/**
	 * Add an auto-incrementing integer to the table.
	 *
	 * @param  string  $name
	 * @return Fluent
	 */
	public function increments($name)
	{
		return $this->integer($name, 10, true);
	}
	
	/**
	 * Add an integer column to the table.
	 *
	 * @param  string  $name
	 * @param  bool    $increment
	 * @return Fluent
	 */
	public function integer($name,  $length = 10, $increment = false)
	{
		return $this->column(__FUNCTION__, compact('name', 'length', 'increment'));
	}
}