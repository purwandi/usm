<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	if (Auth::guest())
	{
		return Redirect::to('login');
	}
	else
	{
		$auth = Auth::user();
		return View::make('users::dashboard.'.$auth->role_id, array('auth'=> $auth));
	}
	
});

Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('login');
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
	// passed allowed segment
	if ( ! in_array(URI::segment('1'), array('','login','api','logout')))
	{
		// cek user permision user base on login account type
		// if their not logon, the permission will be check on guest key
		$perm = Auth::guest() ? 'guest' : Auth::user()->role_id;

		// match the uri segment 1 with the key permissions
		$key = 'permissions.'. $perm;

		if (array_key_exists(URI::segment('1') , Config::get($key)))
		{
			// greate now check the method on segment number 2
			$key = $key .'.'. URI::segment('1');

			$default = URI::segment('2') == '' ? 'index' : URI::segment('2') ;

			if (isset($default))
			{
				if ( ! in_array($default, Config::get($key)))
				{
					if (Auth::guest()) 
					{
						return Redirect::to('login?target='.URI::full());
					}
					else
					{
						return Response::error('403');
					}
				}
			}
		}
		else
		{
			if (Auth::guest()) 
			{
				return Redirect::to('login?target='.URI::full());
			}
			else
			{
				return Response::error('403');
			}
		}
	}
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});