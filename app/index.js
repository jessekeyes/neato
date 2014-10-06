'use strict';
var util = require('util');
var path = require('path');
var yeoman = require('yeoman-generator');
var chalk = require('chalk');

var WpGruntedThemeGenerator = module.exports = function WpGruntedThemeGenerator(args, options, config) {
  yeoman.generators.Base.apply(this, arguments);

  this.pkg = JSON.parse(this.readFileAsString(path.join(__dirname, '../package.json')));
};

util.inherits(WpGruntedThemeGenerator, yeoman.generators.Base);

WpGruntedThemeGenerator.prototype.askFor = function askFor() {
  var cb = this.async();

  console.log("\n\n"+chalk.cyan.bold("SHALL WE PLAY A GAME?\n\n")+chalk.cyan.bold("Love to.  How about Global Thermonuclear War?\n\n")+chalk.cyan.bold("WOULDN'T YOU PREFER TO INSTALL A WORDPRESS THEME?\n\n")+chalk.cyan.bold("Oh, OK.\n\n\n\n")
  );

  var prompts = [{
    name: 'themeName',
    message: 'Name of the theme you want to create?'
  },{
    name: 'themeNameSpace',
    message: 'Unique name-space for the theme (alphanumeric)?',
    default: function( answers ) {
  		return answers.themeName.replace(/\W/g, '').toLowerCase();
  	}
  },{
    name: 'themeAuthor',
    message: 'Name of the themes author?',
    default: function( answers ) {
  		return 'Substance, Inc.';
  	}
  },{
    name: 'themeAuthorURI',
    message: 'Website of the themes authors?',
    default: function( answers ) {
  		return 'http://www.findsubstance.com';
  	}
  },{
    name: 'themeURI',
    message: 'Website of the themes?',
    default: function( answers ) {
      return 'http://www.'+answers.themeName.replace(/\W/g, '-').toLowerCase()+'.com';
    }
  },{
    name: 'themeDescription',
    message: 'Description of the theme?',
    default: function( answers ) {
  		return 'This is a description for the '+answers.themeName+' theme.';
  	}
  }];

  this.prompt(prompts, function (props) {
    this.themeName = props.themeName;
    this.themeNameSpace = props.themeNameSpace;
    this.themeAuthor = props.themeAuthor;
    this.themeAuthorURI = props.themeAuthorURI;
    this.themeURI = props.themeURI;
    this.themeDescription = props.themeDescription;
    this.jshintTag = '<%= jshint.all %>';

    cb();
  }.bind(this));
};

WpGruntedThemeGenerator.prototype.app = function app() {
  var currentDate = new Date()
  this.themeCreated = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1) + '-' + currentDate.getDate();

  this.directory('theme', this.themeNameSpace);

  this.template('_Gruntfile.js', this.themeNameSpace+'/Gruntfile.js')
  this.template('_package.json', this.themeNameSpace+'/package.json')
  this.template('_gitignore', this.themeNameSpace+'/.gitignore')

  //icons
  this.template('favicon.ico', '../../') // place them in web root, where wp-content dir
  this.template('favicon.png', '../../') // place them in web root, where wp-content dir
  this.template('apple-touch-icon-precomposed.png', '../../') // place them in web root, where wp-content dir
};
