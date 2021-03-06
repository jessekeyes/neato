# NEATO!
## A Wordpress theme generator based on Bourbon/Neat and powered by Yeoman

Use this generator to quickly create a starter WP theme for your project. The theme is loosely built around HTML5 Boilerplate and other best practices as determined by Substance, Inc. and its staff.

### Requirements
* [NodeJS](http://www.nodejs.org/download/)
* [Bower](http://bower.io/#install-bower) `npm install -g bower`
* [Yeoman](http://yeoman.io/) `npm install -g yo`
* Install the Neato yeoman generator: `npm install -g https://github.com/jessekeyes/neato/tarball/master`

### Generating your theme

1. Install Wordpress or generate it
2. Navigate to your main themes dir (usually: wp-content/themes/)
3. Run the generator: `yo neato`
4. Follow the prompts
5. Your theme is generated! Continue on to Set Up

### Theme Set up

Your new theme uses GruntJS to run tasks and BowerJS to manage front end packages. Here are the final steps to make your theme functional and ready for development.

1. Install all necessary Node modules by running this command in your new theme dir: `npm install`
2. Allow Grunt to set up the project dependencies (via Bower): `grunt install`
3. Now you're ready to begin development!

### The Workflow

Please see the **ReadMe.md** files located in your newly generated theme to learn the workflow.