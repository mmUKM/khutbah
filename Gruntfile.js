'use strict';
module.exports = function(grunt) {

  // Project configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // grunt-contrib-copy
    copy: {
      dist: {
        files: [{
          expand: true,
          cwd: 'node_modules/uikit/dist',
          src: '*/**/**',
          dest: 'lib/uikit'
        },
        {
          expand: true,
          cwd: 'node_modules/font-awesome',
          src: ['css/*','fonts/*'],
          dest: 'lib/font-awesome'
        }]
      }
    },
    // grunt-contrib-compass
    compass: {
      dist: { 
        options: { 
          sassDir: 'sass',
          cssDir: 'css',
          environment: 'production',
          outputStyle: 'expanded'
        }
      }
    },
    // grunt-contrib-uglify
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> v<%= pkg.version %> by <%= pkg.author %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        sourceMap: false
      },
      jquery: {
        src: 'node_modules/jquery/dist/jquery.js',
        dest: 'js/jquery.min.js'
      },
      ukmtheme: {
        src: 'js/scripts.js',
        dest: 'js/scripts.min.js'
      }
    },
    // grunt-contrib-cssmin
    cssmin: {
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1,
        keepSpecialComments: 0
      },
      target: {
        files: {
          'style.css': 'css/style.css',
          'css/admin.min.css': 'css/admin.css'
        }
      }
    },
    // grunt-banner
    usebanner: {
      taskName: {
        options: {
          position: 'top',
          banner: '/*\n'+
                  'Theme Name: <%= pkg.name %>\n'+
                  'Version: <%= pkg.version %>\n'+
                  'Description: <%= pkg.description %>\n'+
                  'Author: <%= pkg.author %>\n'+
                  '*/',
          linebreak: true
        },
        files: {
          src: [ 'style.css' ]
        }
      }
    },
    // grunt-contrib-clean
    clean: {
      js: ['lib/uikit/js/*.js', 'lib/uikit/js/components/*.js', '!lib/uikit/js/components/*.min.js', '!lib/uikit/js/*.min.js'],
      css: ['lib/uikit/css/*.css', '!lib/uikit/css/*.min.css'],
      dir: ['.sass-cache/']
    },
    // grunt-contrib-watch
    watch: {
      configFiles: {
        files: ['Gruntfile.js']
      },
      css: {
        files: [
          'sass/style.scss',
          'sass/*.scss'
        ],
        tasks: ['compass','cssmin','usebanner'],
          options: {
            livereload: true
          }
      },
      js: {
        files: ['js/scripts.js'],
        tasks: ['uglify'],
          options: {
            spawn: false
          }
      }
    }
    // end Project configuration
  });

  // load grunt task
  
  grunt.loadNpmTasks('grunt-banner');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-css-url-rewrite');

  // execute grunt task
  
  grunt.registerTask('default', ['compass', 'uglify', 'cssmin', 'usebanner']);

};