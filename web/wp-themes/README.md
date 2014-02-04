# Lake Chelan Web Site

This is the repo for the Lake Chelan Web Site, based on the [Substance Wordpress Scaffolding](https://github.com/substancedev/scaffold-wp), which is based on Mark Jaquith's [Wordpress Skeleton](https://github.com/markjaquith/WordPress-Skeleton), documentation at [Google Docs](https://docs.google.com/a/findsubstance.com/document/d/1JjYtYmlYKqJlIUdhDr4QYTsofzy4RxzX-zzSzbA-cSI/edit)

## layout

![layout](/docs/img/dir-layout.png)

## getting started

To get started in a dev environment:

1.	clone the repo and it's submodules, (eg: `git clone --recursive git@github.com:substancedev/lake-chelan.git`).
1.	run the init script (eg: `sh init.sh`) create all of the local-only files
1.	copy the local config sample file to a local config file (eg: `cp web/local-config-sample.php web/local-config.php `).
1.	edit the local config file with your database connection information.
1.	download the database backup (eg: `scp substancedev.com:backups/dev_lakechelan.sql.bz2 ~/Downloads/`).
1.	create the local database (eg: `mysqladmin create dev_lakechelan`).
1.	import into the local database (eg: `bunzip2 < ~/Downloads/dev_lakechelan.sql.bz2 | mysql dev_lakechelan`).
1.	login to admin interface (eg: `http://dev.lake-chelan/wp-admin/`) - account info here: https://findsubstance.basecamphq.com/W1944954.

## front end action and GruntJS

### Using Grunt

Grunt is used to process some of the SASS files used in the site which make up the entire framework. Grunt is also combining and minifying all the JS for the site as well. To get started you need to install the following if you haven't already:

* GruntJS
* NodeJS
* Bourbon (Ruby Gem)
* Neat (Ruby Gem)
* SASS (Ruby Gem)

Then all you need to do is run `sudo npm install` in the root of the project. Note: you may not have to run `sudo` but I've found if you have permission errors, run it as `sudo`. This will load up all the depencies needed and outlined in `package.json`.

This will install the packages needed and declared in the `package.json` file.

Note for other projects, you might have to adjust some of the dir vars in `package.json`.

#### Running grunt

You'll want to run grunt before you push changes and/or as you make them on the source files. The best way is to run grunt in another Terminal tab by typing `grunt` which will run the "watch" task and any files modified in the assets/src dir will trigger the process.

#### Dev notes on Grunt

`Gruntfile.js` and `package.json` are both in the project root. `package.json` points to the assets files in the chosen theme to process. 

## Theme and Child Theme

This project runs off a "child theme" from the parent of the "substance" theme. The purpose is to allow a quickly deployable theme with front end frameworks and commons functions that can be used over and over again as a starter. The child theme is the project theme and is styled and modified for the project's needs.

Before proceeded, please <a href="http://codex.wordpress.org/Child_Themes">familiarize yourself with child themes</a>. The important take homes are:

* A child theme _extends_ the base of the parent theme. This way the parent theme can be updated without affecting the child theme.
* Any template file not present in the child theme will fall back to the parent theme's version (see: <a href="http://codex.wordpress.org/Template_Hierarchy">WP's Template Hierarchy</a>)
* Likewise, any template file in the child theme will trump that of the parent's.
* _Exception:_ the functions.php of the parent is loaded right _after_ that of the child's.

### Naming conventions - MUST READ

The naming of the themes and child themes are important as a lot of relative URLs and paths depend on them. Here are the naming conventions:

* Main/Parent theme: substance; Location: web/content/themes/substance
* Child/Project theme: substance-project; Location web/content/themes/substance-project

These should already be set up at the start of a new project. Change the "-project" to the _sanitized_ version of the project name; the same name will be used to update the `package.json` file (see GruntJS above). For example: if our new project was for "Cool Company, Inc.", we might rename the project theme to "substance-cool-company". And then change the name of the package to "cool-company".

### Assets Used

While the main "substance" theme is also a stand-alone theme, when using a project theme, which assets are pulled in from where are in important to know. Here is the break down:

* **SCSS/CSS:** substance-project imports the core and some partials from the parent substance. Check out _substance-project/assets/src/scss/main.scss_ to see which are being imported and note what is required. Once working in the project theme, create new partials as needed in the local assets/src/scss area. GruntJS will compile anything imported in main.scss.
* **JS:** subject-project imports a file called "functions.js" from the parent substance and all the library scripts in _substance/assets/js/lib/_. These are declared in the parent's functions.php (except the functions.js is explicitly pulled in via the `Gruntfile.js`). The rest of the js is compiled to app.js from _substance-project/assets/src/js/plugins_ and _substance-project/assets/src/js/components_.
* **images:** these are loaded locally to the theme always.
* **fonts:** same as above.





