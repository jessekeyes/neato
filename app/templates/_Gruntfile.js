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
        tasks: ['sass:build', 'uglify:build', 'sass:prod']
      },
      scripts: {
        files: ['<%%= dirs.vendor %>/js/*', '<%%= dirs.src %>/js/**/*.js'],
        tasks: ['uglify:build']
      },
      styles: {
        files: ['<%%= dirs.sass %>/**/*.scss'],
        tasks: ['sass:build', 'sass:prod']
      },
    },
    sass: {
      build: {
        files: [{
          expand: true,
          cwd: '<%%= dirs.sass %>',
          src: ['*.scss'],
          dest: '<%%= dirs.src %>/css',
          ext: '.css'
        }]
      },
      prod: {
        options: {
          style: 'compressed'
        },
        files: {
          '<%%= dirs.css %>/main.min.css' : '<%%= dirs.src %>/css/main.css',
          '<%%= dirs.css %>/admin.min.css' : '<%%= dirs.src %>/css/admin.css'
        }
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

  // Default task(s).
  grunt.registerTask('default', ['sass:build', 'uglify:build', 'sass:prod']);
  grunt.registerTask('scripts', ['watch:scripts']);
  grunt.registerTask('styles', ['watch:styles']);

};