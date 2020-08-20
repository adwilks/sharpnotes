# SharpNotes

Sharpnotes is a Lumen framework notes editor that uses JWT token authorization. 

## Dependencies

Same dependencies as the Lumen framework and tymon/jwt-auth's jwt library for authentication.
This app uses MySQL Ver 8.0.21

For testing, the vendor folder for stable build is included in the repository.

## Getting Started
There are a few steps to get rolling, broadly these are:
1. Clone project: 
git clone https://github.com/adwilks/sharpnotes 
2. Configure MySQL:
Run the configure_db script to get the database configured:
`bash configure_db c1 app secret` (You will need to know the MySql Root password.
Alternatively (or if there are problems): Create a new db user: app, password: secret. Create a new database: c1. 
Grant 'app' all rights to the c1 database.
3. Run Migrations: 
From the directory where you cloned  the project run: `php artisan migrate`  
4. Run Seeds:
From the same directory run: `php artisan db:seed`
5. Serve the project: Serve the website with `php artisan serve`

### Extra Notes
This project was developed on a homestead VM. I'm doing further testing to see the performance on other builds.
