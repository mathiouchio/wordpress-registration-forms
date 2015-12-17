module.exports = function(grunt) {
  
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      css:{
        files: [
          'scss/*.sass',
          'scss/*.scss'
        ],
        tasks: ['compass'],
        options: { livereload: true }
      },
      js:{
        files: [
          'js/*'
        ],
        tasks: ['jshint','uglify'],
        options: { livereload: true }
      },
      livereload:{
        options: { livereload: true },
        files: ['../*', '*', '*/*'],
      }
    },
    compass: {
      dist: {
        options: {
          config: 'config.rb'
        }
      }
    },
    jshint: {
      all: ['Gruntfile.js', 'js/*.js']
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      },
      dist: {
        files: {
          '../script.min.js': ['js/*.js']
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('default', ['uglify','compass','watch']);

};