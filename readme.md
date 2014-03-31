# Read me for Neato!

## Using GruntJS

Grunt is used to process some of the SASS files used in the site, specifically the Timeline, Life, and Wall of Fame. To use gruntJS, you'll need to install the following:

* GruntJS
* NodeJS
* SASS (Ruby Gem)
* CSSMin

Then all you need to do is run `sudo npm install` in the root of the project. Note: you may not have to run `sudo` but I've found if you have permission errors, run it as `sudo`. This will load up all the depencies needed and outlined in package.json.

### Running grunt

You'll want to run grunt before you push changes and/or as you make them on the source files. To run grunt in order to process SASS into CSS, simply type: `grunt` (make sure you're at the root of the project). If you'd prefer to have grunt run automatically as you make changes you can run `grunt watch`. It is recommended that you run that in a separate Terminal window as it will alwats been on. Simply cancel out of it if you no longer wish it to run.