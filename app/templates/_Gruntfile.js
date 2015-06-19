'use strict';

module.exports = function(grunt) {

  // Load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    dirs: {
      assets: './assets',
      css: '<%%= dirs.assets %>/css',
      js: '<%%= dirs.assets %>/js',
      src: '<%%= dirs.assets %>/src',
      vendor: '<%%= dirs.assets %>/vendor',
      sass: '<%%= dirs.src %>/scss'
    },
    bower: {
      install: {
        options: {
          cleanup: true,
          copy: true,
          install: true,
          layout: 'byType',
          targetDir: '<%%= dirs.vendor %>'
        }
      }
    },
    watch: {
      build: {
        files: ['<%%= dirs.sass %>/**/*.scss', '<%%= dirs.vendor %>/js/*', '<%%= dirs.src %>/js/**/*.js'],
        tasks: ['default']
      },
      scripts: {
        files: ['<%%= dirs.vendor %>/js/*', '<%%= dirs.src %>/js/**/*.js'],
        tasks: ['scripts']
      },
      styles: {
        files: ['<%%= dirs.sass %>/**/*.scss'],
        tasks: ['styles']
      },
    },
    sass: {
      all: {
        options: {
          sourcemap: 'auto'
        },
        files: [{
          expand: true,
          cwd: '<%%= dirs.sass %>',
          src: ['*.scss'],
          dest: '<%%= dirs.src %>/css',
          ext: '.css'
        }]
      }
    },
    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer-core')({browsers: [ 'last 2 versions', 'ie >= 8', 'Android >= 4' ]}),
        ]
      },
      all: {
        src: '<%%= dirs.src %>/css/*.css'
      } 
    },
    cssmin: {
      options: {
        advanced: true
      },
      minify: {
        expand: true,
        
        cwd: '<%%= dirs.src %>/css/',
        src: ['main.css','admin.css'],
        
        dest: '<%%= dirs.css %>/',
        ext: '.min.css'
      }
    },
    uglify: {
      build: {
        options: {
          banner: '/*! <%%= pkg.title %> - v<%%= pkg.version %>\n' +
            ' * <%%= pkg.homepage %>\n' +
            ' * Copyright (c) <%%= grunt.template.today("yyyy") %>;' +
            ' */\n',
          mangle: false
        },
        files: {
          '<%%= dirs.js %>/app.js': ['<%%= dirs.vendor %>/js/*', '<%%= dirs.src %>/js/**/*.js'], // main js
          '<%%= dirs.js %>/admin.js':    [ '<%%= dirs.src %>/js/admin/**/*.js' ], // WP Admin js
          '<%%= dirs.js %>/head.js':    [ '<%%= dirs.src %>/js/head/**/*.js' ] // scripts that need to be in the head
        }
      }
    }
  }); 

  // Default task(s).
  grunt.registerTask('default', ['styles', 'scripts']);
  grunt.registerTask('install', ['bower']);
  grunt.registerTask('styles', ['sass', 'postcss', 'cssmin']);
  grunt.registerTask('scripts', ['uglify']);

};