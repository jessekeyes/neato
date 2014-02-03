module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      build: {
        files: ['<%= pkg.src %>/scss/**/*.scss', '<%= pkg.src %>/js/**/*.js'],
        tasks: ['sass:build', 'uglify:build']
      }
    },
    sass: {
      build: {
        files: [{
          expand: true,
          cwd: '<%= pkg.src %>/scss',
          src: ['*.scss'],
          dest: '<%= pkg.css %>',
          ext: '.css'
        }]
      }
    },
    uglify: {
      build: {
        options: {
          banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
          mangle: false
        },
        files: {
          '<%= pkg.js %>/app.js': ['<%= pkg.src %>/js/plugins/*', '<%= pkg.src %>/js/components/*' ]
        }
      }
    },
  }); 

  // Load the plugins
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Default task(s).
  grunt.registerTask('default', ['watch:build']);
  grunt.registerTask('build', ['sass:build', 'uglify:build']);

};