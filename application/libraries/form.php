<?php

use \HTML;
use \ReflectionClass;

/**
 * Form generation geared around Bootstrap (2.0-wip) from Twitter.
 * 
 * @package     Bundles
 * @subpackage  Twitter
 * @author      Purwandi <pur@purwandi.me>
 *
 * @see http://twitter.github.com/bootstrap/
 */
class Form extends \Laravel\Form {
    
    /**
     * Create a HTML input element.
     *
     * <code>
     *      // Create a "text" input element named "email"
     *      echo Form::input('text', 'email');
     *
     *      // Create an input element with a specified default value
     *      echo Form::input('text', 'email', 'example@gmail.com');
     * </code>
     *
     * @param  string  $type
     * @param  string  $label
     * @param  string  $name
     * @param  mixed   $value
     * @param  array   $attributes
     * @return string
     */
    public static function binput($type, $label, $name, $value, $attributes = array())
    {
        $attributes = array_filter($attributes);

        $help = array_intersect(array('inline','block'), array_keys($attributes));
        $help = trim(implode(' ', $help));

        if ( ! array_key_exists('id', $attributes))
        {
             $attributes['id'] = $name;
        }

        $out = '<div class="control-group">';
        $out .= '<label class="control-label" for="'.$name.'">'.$label.'</label>';
            $out .='<div class="controls">';
            $out .= static::input($type, $name, $value, $attributes);

            foreach (array('error', 'warning', 'success') as $key)
            {
                if ( ! empty($attributes[$key]) and is_string($attributes[$key]))
                {
                    $out .= '<span class="help-block">'. $attributes[$key] .'</span>';
                }
            }
            if ( ! empty($help))
            {
                $out .= ' <p class="help-'.$help.'">'. $attributes[$help] .'</p>';
            }

            $out .='</div>';
        $out .= '</div>';
        return $out;
    }

    /**
     * Create a HTML text input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  string  $value
     * @param  array   $attributes
     * @return string
     */
    public static function btext($label, $name, $value = null, $attributes = array())
    {
        return static::binput('text', $label, $name, $value, $attributes);
    }

    /**
     * Create a HTML email input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  string  $value
     * @param  array   $attributes
     * @return string
     */
    public static function bemail($label, $name, $value = null, $attributes = array())
    {
        return static::binput('email', $label, $name, $value, $attributes);
    }

    /**
     * Create a HTML password input element.
     * 
     * @param  string  $label
     * @param  string  $name
     * @param  array   $attributes
     * @return string
     */
    public static function bpassword($label, $name, $attributes = array())
    {
        return static::binput('password', $label, $name, null, $attributes);
    }

    /**
     * Create a HTML date input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  string  $value
     * @param  array   $attributes
     * @return string
     */
    public static function bdate($label, $name, $value = null, $attributes = array())
    {
        return static::binput('date', $label, $name, $value, $attributes);
    }

    /**
     * Create a HTML search input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  string  $value
     * @param  array   $attributes
     * @return string
     */
    public static function bsearch($label, $name, $value = null, $attributes = array())
    {
        return static::binput('search', $label, $name, $value, $attributes);
    }

    /**
     * Create a HTML phone input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  string  $value
     * @param  array   $attributes
     * @return string
     */
    public static function bphone($label, $name, $value = null, $attributes = array())
    {
        return static::binput('tel', $label, $name, $value, $attributes);
    }

    /**
     * Create a HTML url input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  string  $value
     * @param  array   $attributes
     * @return string
     */
    public static function burl($label, $name, $value = null, $attributes = array())
    {
        return static::binput('url', $label, $name, $value, $attributes);
    }

    /**
     * Create a HTML number input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  string  $value
     * @param  array   $attributes
     * @return string
     */
    public static function bnumber($label, $name, $value = null, $attributes = array())
    {
        return static::binput('number', $label, $name, $value, $attributes);
    }

    /**
     * Create a HTML file input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  string  $value
     * @param  array   $attributes
     * @return string
     */
    public static function bfile($label, $name, $value = null, $attributes = array())
    {
        return static::binput('file', $label, $name, $value, $attributes);
    }

    /**
     * Create a HTML textarea input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  string  $value
     * @param  array   $attributes
     * @return string
     */
    public static function btextarea($label, $name, $value = null, $attributes = array())
    {
        $attributes = array_filter($attributes);

        $help = array_intersect(array('inline','block'), array_keys($attributes));
        $help = trim(implode(' ', $help));

        if ( ! array_key_exists('id', $attributes))
        {
             $attributes['id'] = $name;
        }

        $out = '<div class="control-group">';
        $out .= '<label class="control-label" for="'.$name.'">'.$label.'</label>';
            $out .='<div class="controls">';
            $out .= static::textarea($name, $value, $attributes);

            foreach (array('error', 'warning', 'success') as $key)
            {
                if ( ! empty($attributes[$key]) and is_string($attributes[$key]))
                {
                    $out .= '<span class="help-block">'. $attributes[$key] .'</span>';
                }
            }
            if ( ! empty($help))
            {
                $out .= ' <p class="help-'.$help.'">'. $attributes[$help] .'</p>';
            }

            $out .='</div>';
        $out .= '</div>';
        return $out;
    }

    /**
     * Create a HTML select input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  array   $options
     * @param  string  $selected
     * @param  array   $attributes
     * @return string
     */
    public static function bselect($label, $name, $options = array(), $selected = null, $attributes = array())
    {
        $attributes = array_filter($attributes);

        $help = array_intersect(array('inline','block'), array_keys($attributes));
        $help = trim(implode(' ', $help));

        if ( ! array_key_exists('id', $attributes))
        {
             $attributes['id'] = $name;
        }

        $out = '<div class="control-group">';
        $out .= '<label class="control-label" for="'.$name.'">'.$label.'</label>';
            $out .='<div class="controls">';
            $out .= static::select($name, $options, $selected, $attributes);

            foreach (array('error', 'warning', 'success') as $key)
            {
                if ( ! empty($attributes[$key]) and is_string($attributes[$key]))
                {
                    $out .= '<span class="help-block">'. $attributes[$key] .'</span>';
                }
            }
            if ( ! empty($help))
            {
                $out .= ' <p class="help-'.$help.'">'. $attributes[$help] .'</p>';
            }

            $out .='</div>';
        $out .= '</div>';
        return $out;
    }

    /**
     * Create a HTML radio input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  array   $options
     * @param  boolean $checked
     * @param  array   $attributes
     * @return string
     */
    public static function bradio($label, $name, $options = array(), $checked = null, $attributes = array())
    {
        $attributes = array_filter($attributes);

        $help = array_intersect(array('inline','block'), array_keys($attributes));
        $help = trim(implode(' ', $help));

        $out = '<div class="control-group">';
        $out .= '<label class="control-label" for="'.$name.'">'.$label.'</label>';
            $out .='<div class="controls">';

            if (is_array($options) && ! empty($options))
            {
                foreach ($options as $key => $value) 
                {
                    $out .= '<label class="radio '.$help.'">';

                    $attributes['id'] = $name.'_'.$value;
                    unset($attributes['inline']);

                    if ($key == $checked)
                    {

                        $out .= static::radio($name, $key, true, $attributes) .' '. $value;
                    }
                    else
                    {
                        $out .= static::radio($name, $key, false, $attributes) .' '. $value;
                    }
                    
                    $out .= '</label>';
                }
            }

            $out .='</div>';
        $out .= '</div>';
        return $out;
    }

    /**
     * Create a HTML checkbox input element.
     *
     * @param  string  $label
     * @param  string  $name
     * @param  array   $options
     * @param  boolean $checked
     * @param  array   $attributes
     * @return string
     */
    public static function bcheckbox($label, $name, $options = array(), $checked = null, $attributes = array())
    {
        $attributes = array_filter($attributes);

        $help = array_intersect(array('inline','block'), array_keys($attributes));
        $help = trim(implode(' ', $help));

        $out = '<div class="control-group">';
        $out .= '<label class="control-label" for="'.$name.'">'.$label.'</label>';
            $out .='<div class="controls">';

            if (is_array($options) && ! empty($options))
            {
                foreach ($options as $key => $value) 
                {   
                    $out .= '<label class="checkbox '.$help.'">';

                    $attributes['id'] = $name.'_'.$value;
                    unset($attributes['inline']);

                    if ($key == $checked)
                    {
                        $out .= static::checkbox($name, $key, true, $attributes) .' '. $value;
                    }
                    else
                    {
                        $out .= static::checkbox($name, $key, false, $attributes) .' '. $value;
                    }
                    
                    $out .= '</label>';
                }
            }

            $out .='</div>';
        $out .= '</div>';
        return $out;
    }
    
}