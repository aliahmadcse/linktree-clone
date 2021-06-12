## A [linktr.ee](https://linktr.ee) clone

## Features
- Add Multiple Links and Manage them
- Records Visits to your links
- Manage User Setting
- Authentication

## Set Up

1. Run `git clone https://github.com/aliahmadcse/linktree-clone.git`
2. Run `cp .env.example .env`
3. Create a database name **linktree_clone**
4. Populate your server and database info in .env file
5. Run `composer install && npm install && npm run dev`
6. Run `php artisan key:generate`
7. Run `php artisan migrate`
8. Run `php artisan serve`
9.  👌 Your application is located at `localhost:8000`