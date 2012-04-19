purwandi:bootstrap purwandi$ cd ../fuelphp/usm/
purwandi:usm purwandi$ git init
Initialized empty Git repository in /Volumes/Storage/www/fuelphp/usm/.git/



cd fuel/packages/
git clone -b master git@github.com:cartalyst/sentry.git sentry

php oil r migrate --packages=sentry
Migrated package:sentry to latest version: 2.