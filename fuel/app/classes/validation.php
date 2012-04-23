<?php

class Validation extends Fuel\Core\Validation {

	/**
	 * Show errors
	 *
	 * Returns all errors in a list or with set markup from $options param
	 *
	 * @param   array  uses keys open_list, close_list, open_error, close_error & no_errors
	 * @return  string
	 */
	public function show_error()
	{

		if ( ! empty($this->errors))
		{
			$output = array();

			foreach($this->errors as $key => $value)
			{
				if ($value)
				{
					$output [$key]= $value;
				}
				
			}
			return $output;
		}
	}
}