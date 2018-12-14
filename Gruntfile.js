'use strict';
module.exports = function(grunt) {

  // Project configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // grunt-contrib-copy
    copy: {
      dist: {
        files: [
        {
          expand: true,
          cwd: 'bower_components/uikit',
          src: ['css/**','js/**'],
          dest: 'lib/uikit'
        },
        {
          expand: true,
          cwd: 'bower_components/jquery/dist',
          src: '*',
          dest: 'lib/jquery'   
        }]
      }
    },
    // grunt-contrib-compass
    compass: {
      dist: { 
        options: { 
          sassDir: 'sass',
          cssDir: '.',
          environment: 'production',
          outputStyle: 'expanded'
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
      js: ['js/*.js', '!js/*.min.js'],
      css: ['img/*.css', 'css/*.css', '!css/*.min.css']
    },
    // grunt-contrib-watch
    watch: {
      configFiles: {
        files: ['Gruntfile.js', 'bower.js', 'version.json']
      },
      css: {
        files: [
          'sass/main.scss',
          'sass/*.scss'
        ],
        tasks: ['compass','usebanner'],
          options: {
            livereload: true
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
  grunt.loadNpmTasks('grunt-contrib-watch');

  // execute grunt task
  
  grunt.registerTask('default', ['copy', 'compass', 'usebanner']);

};
