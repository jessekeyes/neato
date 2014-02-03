module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      css: {
        files: '<%= pkg.src %>scss/*.scss',
        tasks: 'sass:build'
      }
    },
    sass: {
      build: {
        files: [{
          expand: true,
          src: ['<%= pkg.src %>scss/*.scss'],
          dest: '<%= pkg.css %>',
          ext: '.css'
        }]
      }
    }
  });

  // Load the plugins
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');

  // Default task(s).
  grunt.registerTask('default', ['sass']);

};