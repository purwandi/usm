<?php

class Validator extends \Laravel\Validator {
    
    /**
     * Validate date
     * 
     * @param  string   $attribute
     * @param  mixed    $value
     * @param  array    $parameters
     * @return bool
     */
    function validate_date($attribute, $date, $format)
    {
        if (date($format[0], strtotime(trim($date))) == $date)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Replace all place-holders for the date rule.
     *
     * @param  string  $message
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return string
     */
    protected function replace_date($message, $attribute, $rule, $parameters)
    {
        return str_replace(':format', $parameters[0], $message);
    }

}