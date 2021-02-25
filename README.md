

# TimeTracker App

## Backend Installation
Install the composer dependencies:
```bash
composer install
```
You'll need to make a copy of `.env.example` and rename it to `.env` and change the  credentials to your desired database.

Run the database migrations:
```bash
php artisan migrate
```

Seed the database with sample data:
```bash
php artisan db:seed
```

No hassle command to serve the backend:
```bash
php artisan serve
```
This will serve up the website locally at the web address: `http://127.0.0.1:8000`
### Frontend Setup for Local Dev

If you want to tweak the JS or SCSS for this project, NVM is required  to insure that the correct package versions are used.
Install NVM using the following command:
```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.37.1/install.sh | bash
```
From the root directory of the project type:
```bash
nvm use
```
It may install a specific node version if you don't have it already, but you should eventually see a message like: 
```bash
Now using node v8.11.1 (npm v5.6.0)
```
Now you can install all the depencies using:
```bash
npm install
```
You'll also need Gulp  if you don't already have it.  You can install it using the following command:
```bash
npm install --global gulp-cli
```
Before runninng gulp, make sure to **change Line 12** in the `gulpfile.js` to point to the url of where you're hosting the backend.  If you're serving the backend up using the command from above, you can leave it as is.

Now run the following command and you'll see the app open in your browser:
```bash
gulp
```

