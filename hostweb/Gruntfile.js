module.exports = function(grunt) {
    "use strict";

    grunt.initConfig({

        pkg : grunt.file.readJSON('package.json'),

        requirejs : {
            compile : {
                options : {

                    baseUrl : './hostweb/assets/js/app/bower_components/',

                    paths : {
                        jquery : 'jquery2/jquery.min'
                    },

                    name : 'main',

                    out : './hostweb/assets/js/global.js',

                    removeCombined : false

                }
            }
        },

        sass : {

            dist : {

                files : {
                    './assets/css/style.css' : './assets/scss/style.scss'
                },

                options : {
                    style : 'compressed'
                }

            }

        },

        watch : {

            css : {

                files : '**/*.scss',
                tasks : ['sass']

            }

        }

    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['sass']);

};