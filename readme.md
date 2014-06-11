# Read me for Neato!

## Using GruntJS

GruntJS is used to preprocess SASS and JS files. Grunt requires the following:

* NodeJS
* GruntJS
* SASS (Ruby Gem)

Then all you need to do is run `npm install` in the root of the project. This will load up all the depencies needed and outlined in package.json.

### Running grunt

The easiest way to run grunt is to open up another Terminal window or tab and be in the root of the project. It's advised to run these each in their own separate tabs:

Typing the following will:

* `grunt scripts` - sets up a Watch task on all the JS files in assets/src/js (see below)
* `grunt styles` - sets up a Watch task on all the SASS files in assets/src/sass (see below)
* `grunt` - by itself just runs the build task on all of the above and it not set to Watch.

### Assets struncture

The assets dir in the project theme is set up with a src sub directory. This source directory contains all the files that grunt is watching and is where you should edit SASS and JS. Do _not_ edit CSS files that are outside of this src dir. The following is a list of the default dirs and how they should be used:

* _assets/src/js_ - everything in here is compiled and minified by the grunt "uglify" task or by using `grunt scripts`. These files are output in assets/js/app.js.
** _assets/src/js/componants_ - usually simple inits and/or more complex functions specific to the project.
**  _assets/src/js/plugins_  - jQuery plugins used. While these are compiled, it's advised not to edit these directly, but to init them in componants dir.
*  _assets/src/sass_  - all SASS files needed for the project. See documentaion on how to use SASS on the web. `grunt styles` will compile these files in _two_ places: _assets/src/css/main.css_ and _assets/css/main.min.css_; these are the unminified and minified (development and production) versions, respectively, of the compiled CSS. Environments with the WP SCRIPT_DEBUG set to true will use the unminified version for easier debugging.