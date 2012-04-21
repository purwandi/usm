purwandi:bootstrap purwandi$ cd ../fuelphp/usm/
purwandi:usm purwandi$ git init
Initialized empty Git repository in /Volumes/Storage/www/fuelphp/usm/.git/



cd fuel/packages/
git clone -b master git@github.com:cartalyst/sentry.git sentry

php oil r migrate --packages=sentry
Migrated package:sentry to latest version: 2.


php oil g scaffold topic id:int name:varchar[80] time_limit:int
	Creating migration: /Volumes/Storage/www/fuelphp/usm/fuel/app/migrations/001_create_topics.php
	Creating model: /Volumes/Storage/www/fuelphp/usm/fuel/app/classes/model/topic.php
	Creating controller: /Volumes/Storage/www/fuelphp/usm/fuel/app/classes/controller/topic.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/topic/index.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/topic/view.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/topic/create.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/topic/edit.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/topic/_form.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/template.php

php oil g scaffold education name:varchar[45]
	Creating migration: /Volumes/Storage/www/fuelphp/usm/fuel/app/migrations/002_create_educations.php
	Creating model: /Volumes/Storage/www/fuelphp/usm/fuel/app/classes/model/education.php
	Creating controller: /Volumes/Storage/www/fuelphp/usm/fuel/app/classes/controller/education.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/education/index.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/education/view.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/education/create.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/education/edit.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/education/_form.php
php oil refine migrate
Migrated app:default to latest version: 2.