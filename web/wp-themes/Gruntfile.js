module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    dirs: {
      assets: "web/content/themes/<%= pkg.core %>/assets",
      css: "web/content/themes/<%= pkg.core %>/assets/css",
      js: "web/content/themes/<%= pkg.core %>/assets/js",
      src: "web/content/themes/<%= pkg.core %>/assets/src",
      project: "web/content/themes/<%= pkg.core %>-<%= pkg.name %>/assets"
    },
    watch: {
      core: {
        files: ['<%= dirs.src %>/scss/**/*.scss', '<%= dirs.src %>/js/**/*.js'],
        tasks: ['sass:core', 'uglify:core']
      },
      project: {
        files: ['<%= dirs.project %>/src/scss/**/*.scss', 'web/content/themes/<%= pkg.name %>/assets/src/js/**/*.js'],
        tasks: ['sass:project', 'uglify:project']
      }
    },
    sass: {
      core: {
        files: [{
          expand: true,
          cwd: '<%= dirs.src %>/scss',
          src: ['*.scss'],
          dest: '<%= dirs.css %>',
          ext: '.css'
        }]
      },
      project: {
        files: [{
          expand: true,
          cwd: '<%= dirs.project %>/src/scss',
          src: ['*.scss'],
          dest: '<%= dirs.project %>/css',
          ext: '.css'
        }]
      }
    },
    uglify: {
      core: {
        options: {
          banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
          mangle: false
        },
        files: {
          '<%= dirs.js %>/app.js': ['<%= dirs.src %>/js/plugins/*', '<%= dirs.src %>/js/components/*' ]
        }
      },
      project: {
        options: {
          banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
          mangle: false
        },
        files: {
          '<%= dirs.project %>/js/app.js': ['<%= dirs.src %>/js/functions.js', '<%= dirs.project %>/src/js/plugins/*', '<%= dirs.project %>/src/js/components/*' ]
        }
      }
    },
  }); 

  // Load the plugins
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Default task(s).
  grunt.registerTask('default', ['watch:project']);
  grunt.registerTask('watch-core', ['watch:core']);
  grunt.registerTask('core', ['sass:core', 'uglify:core']);
  grunt.registerTask('project', ['sass:project', 'uglify:project']);

};