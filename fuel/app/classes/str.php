<?php

class Str extends Fuel\Core\Str
{

	public static function decode_html($text)
	{
		return html_entity_decode(str_replace(array('&nbsp;',"\'"), array(' ',"'"), $text));
	}

	public static function strip_html_tags( $text )
	{
	    $text = preg_replace(
		array(
		    // Remove invisible content
		    '@<head[^>]*?>.*?</head>@siu',
		    '@<style[^>]*?>.*?</style>@siu',
		    '@<script[^>]*?.*?</script>@siu',
		    '@<object[^>]*?.*?</object>@siu',
		    '@<embed[^>]*?.*?</embed>@siu',
		    '@<applet[^>]*?.*?</applet>@siu',
		    '@<noframes[^>]*?.*?</noframes>@siu',
		    '@<noscript[^>]*?.*?</noscript>@siu',
		    '@<noembed[^>]*?.*?</noembed>@siu',

		    // Add line breaks before & after blocks
		    '@<((br)|(hr))@iu',
		    '@</?((address)|(blockquote)|(center)|(del))@iu',
		    '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
		    '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
		    '@</?((table)|(th)|(td)|(caption))@iu',
		    '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
		    '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
		    '@</?((frameset)|(frame)|(iframe))@iu',
		),
		array(
		    ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
		    "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
		    "\n\$0", "\n\$0",
		),
		$text );

	    // Remove all remaining tags and comments and return.
	    return strip_tags( $text );
	}
}