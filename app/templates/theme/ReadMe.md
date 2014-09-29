# Welcome to your theme's workflow guide!
This guide will help you set up the proper (front end) development workflow using GruntJS, SASS, BowerJS and other NodeJS modules.

## Requirements
Likely, if you've generated this theme with the Yeoman generator, you already have these requirements:

* [NodeJS](http://www.nodejs.org/download/)
* [Bower](http://bower.io/#install-bower) `npm install -g bower`
* [SASS](http://sass-lang.com/install) (Ruby Gem)
* Run `npm install` if you haven't already.

## Using Bower
If you haven't already, you'll need to run Bower to install the necessary versions and dependencies used in your project.

`grunt bower`

You may have to run this again if any new dependencies have been added by another developer. Currently, there is no way to automate this process other direct communication.

If you are the one adding a dependency to the project via bower, use the following command to automatically add it as a depencecy to the bower.json file:

`bower install <package> --save`
(be sure to run this in the same dir as the bower.json file; the theme's root)

And then you should run `grunt bower` again (see below).

### Bower components
Usually, bower components are stored in a folder (bower_components), but the grunt task will move these to a vendor/ dir. The main vendor dir is located `YourTheme/assets/vendor`. All bower components will be placed there when you run `grunt bower`.

If you're adding a new bower component and dependency to the project, you'll need to run the bower command above and then `grunt bower` to move it.

### Developing with SASS, Uglify via Grunt
Currently this theme is set up with SASS CSS preprocessor and Uglify to process and minify JavaScript. Edit and add files in the `assets/src` dir which has the following layout:

* `assets/src/scss` - All custom/project sass files should be used here.
* `assets/src/css` - unminified generated CSS files here. _Do not edit any generated files here (usually main.css)_
* `assets/src/js` - JS files needed for the project go and are edited here.
* `assets/src/js` - any JS plugins that aren't managed by Bower should go here. They'll have to be referenced manually (via the WP enqueue function or other method).

Other directories of note:

* `assets/css/` - All generated and minified CSS lives here _do not edit directly_
* `assets/img/` - where all theme and design graphics should go.
* `assets/fonts/` - any font files should go here.

#### Using Grunt
The recommended way to use GruntJS for this project is to set up two "watch" instances where grunt will preprocess files on the fly as you save/add/remove them.

* `grunt styles` - will set up grunt:watch to watch all the SASS files and process them into straight CSS.
* `grunt scripts` - will set up a grunt:watch to watch all the src/js files and minify/check them as you go.

Alternatively you can run commands to do the above without engaging watch: `grunt sass` and `grunt uglify` respectively.

_Note: it's a good idea to turn off any watch tasks when merging branches as recompiling scripts and styles may cause conflicts in git_