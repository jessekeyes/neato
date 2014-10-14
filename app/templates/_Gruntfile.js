module.exports = function(grunt) {

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
        tasks: ['sass', 'autoprefixer', 'cssmin', 'uglify']
      },
      scripts: {
        files: ['<%%= dirs.vendor %>/js/*', '<%%= dirs.src %>/js/**/*.js'],
        tasks: ['uglify']
      },
      styles: {
        files: ['<%%= dirs.sass %>/**/*.scss'],
        tasks: ['sass', 'autoprefixer', 'cssmin']
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
    autoprefixer: {
      options: {
        browsers: [ 'last 2 version', 'ie 8', 'ie 9', 'Android 2' ],
        map: true
      },
      all: {
        src: '<%%= dirs.src %>/css/*.css'
      } 
    },
    cssmin: {
      options: {
        noAdvanced: true,
        keepLineBreaks: true,
        banner: '/*! <%%= pkg.title %> - v<%%= pkg.version %> - <%%= grunt.template.today("yyyy-mm-dd") %>\n' +
          ' * <%%= pkg.homepage %>\n' +
          ' * Copyright (c) <%%= grunt.template.today("yyyy") %>;' +
          ' */\n'
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
          banner: '/*! <%%= pkg.name %> <%%= grunt.template.today("yyyy-mm-dd") %> */\n',
          mangle: false
        },
        files: {
          '<%%= dirs.js %>/app.js': ['<%%= dirs.vendor %>/js/*', '<%%= dirs.src %>/js/*']
        }
      }
    }
  }); 

  // Load the plugins
  grunt.loadNpmTasks('grunt-bower-task');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  // Default task(s).
  grunt.registerTask('default', ['sass', 'autoprefixer', 'cssmin', 'uglify']);
  grunt.registerTask('scripts', ['watch:scripts']);
  grunt.registerTask('styles', ['watch:styles']);

};