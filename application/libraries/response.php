<?php

class Response extends Laravel\Response {


    /**
     * API JSON Response Object
     *
     * @param string $code return code
     * @param string $title Message title
     * @param string $desc Message body
     * @param array $data
     *
     * @return LaravelResponse
     */
    public static function api($code, $title, $desc, $data = null)
    {
        $desc = (!is_string($desc) && get_class($desc) == 'Laravel\Lang') ? $desc->__toString() : $desc;

        return json_encode(array(
            'code'  => $code,
            'title' => $title,
            'desc'  => $desc,
            'data'  => $data
        ));
    }
}
