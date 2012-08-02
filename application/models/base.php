<?php
/**
 * Base Model
 *
 * @package Extends Model Laravel
 * @version 1.0
 * @author Purwandi <pur@purwandi.me>
 * @link http://purwand.me
 */
class Base extends Eloquent {

    /**
     * Property field on table
     *
     * Example
     *
     * Class Foo extends Base {
     *  protected $rules = array(
     *          'color' => 'required|alpha|min:3',
     *          'size'  => 'required',
     *          // .. more rules
     *      );
     * }
     * @var array
     */
    protected $property = array();

    /**
     * Error
     *
     * @var array
     */
    private $errors;

    /**
     * Validate model property
     *
     * @param  array  $ignore if you want to ignore key
     * @return bool
     */
    public function validate($ignore = array())
    {
        if ( ! empty($ignore))
        {
            // cek if is arary
            if (is_array($ignore))
            {
                // set ignore field
                foreach ($ignore as $key)
                {
                    // cek if array ignore is exist on property
                    if (array_key_exists($key,$this->property))
                    {
                        // unset ignore property
                        unset($this->property[$key]);
                    }
                }
            }
            else
            {
                unset($this->property[$ignore]);
            }
        }

        foreach ($this->property as $key => $value)
        {
            if (empty($value))
            {
                unset($this->property[$key]);
            }
        }

        // create instance validator
        $failed = Validator::make(Input::all(), $this->property);

        if ($failed->fails())
        {
            $this->errors = $failed->errors->all();
            return false;
        }

        return true;
    }

    /**
     * Catch error property
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Base save 
     * 
     * @param  string $intance instance object model
     * @param  array  $custom  custome save
     * @return boolean
     */
    public function base_save($intance, $custom = array())
    {
        // loop input
        foreach (Input::all() as $key => $value)
        {
            if (isset($value) && array_key_exists($key, $this->property))
            {
                $value = trim($value);
                $intance->{$key} = ($value == '') ? NULL : $value;
            }
        }

        // loop custom key
        foreach ($custom as $key => $value)
        {
            if (isset($value))
            {
                $value = trim($value);
                $intance->{$key} = ($value == '') ? NULL : $value;
            }
        }

        return $intance->save();
    }

    /**
     * Paginate the result
     * 
     * @param  variable $intance intance of the object
     * @param  int      $per_page
     * @param  array    $addition [description]
     * @return array
     */
    public static function page($intance, $per_page, $addition = array(), $alias = array())
    {
        // Inisial record total
        $total = $intance->count();

        // Get number of page
        $page = Paginator::page($total, $per_page);

        // Grab the paginated results for the current page
        if ( ! empty($alias))
        {
            $results = $intance->for_page($page, $per_page)->get($alias);
        }
        else
        {
            $results = $intance->for_page($page, $per_page)->get();
        }

        // Create the paginator instance with the results
        $paginator = Paginator::make($results, $total, $per_page);

        // cek if addition is not empty
        if ( ! empty($addition))
        {
            $links = $paginator->appends($addition)->links();
        }
        else
        {
            $links = $paginator->links();
        }

        // start page
        $start = Input::get('page') ? ((Input::get('page') - 1 ) * $per_page ) + 1 : '1';

        // end page
        if ( ! Input::get('page'))
        {
            $end = $per_page > $total ? $total : $per_page;
        }
        else
        {
            $end = (Input::get('page') * $per_page) > $total ? $total : Input::get('page') * $per_page ;
        }

        // return results
        return array(
            'result' => $paginator->results,
            'links' => $links,
            'total' => $total,
            'mice' => $total == 0 ? '' : $start.' to '.$end.' of ' . $total
        );
    }

    public function before_save()
    {

    }

    public function after_save()
    {

    }

}