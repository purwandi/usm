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

php oil g scaffold question name:text ops_1:text ops_2:text ops_3:text ops_4:text ops_5:text answer:varchar[15] parent_id:int topic_id:int
	Creating migration: /Volumes/Storage/www/fuelphp/usm/fuel/app/migrations/003_create_questions.php
	Creating model: /Volumes/Storage/www/fuelphp/usm/fuel/app/classes/model/question.php
	Creating controller: /Volumes/Storage/www/fuelphp/usm/fuel/app/classes/controller/question.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/question/index.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/question/view.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/question/create.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/question/edit.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/question/_form.php

php oil refine migrate
Migrated app:default to latest version: 3.


php oil g controller student index create update view delete
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/student/index.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/student/create.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/student/update.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/student/view.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/student/delete.php
	Creating controller: /Volumes/Storage/www/fuelphp/usm/fuel/app/classes/controller/student.php

php oil g controller groups index create update view delete
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/groups/index.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/groups/create.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/groups/update.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/groups/view.php
	Creating view: /Volumes/Storage/www/fuelphp/usm/fuel/app/views/groups/delete.php
	Creating controller: /Volumes/Storage/www/fuelphp/usm/fuel/app/classes/controller/groups.php
