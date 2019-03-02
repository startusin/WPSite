module.exports = function(grunt) {

    function scss_path_to_css(path) {
        path = path.replace(/\/scss\//, "/css/");
        path = path.replace(/\.scss$/, ".css");
        return path;
    }


    // Project configuration.
    grunt.initConfig({
        sass: {
            options: {
                sourcemap: 'file'
            },
            compressed: {
                options: {
                    style: 'compressed'
                },
                files: [{
                    expand: true,
                    cwd: 'public/wp-content/themes/common/',
                    src: ['**/*.scss', '!**/_*.scss'],
                    dest: 'public/wp-content/themes/common/',
                    ext: '.css',
                    extDot: 'last',
                    rename: function(dest, src) {
                        return scss_path_to_css(dest + src);
                    }
                }]
            },
            expanded: {
                options: {
                    style: 'expanded'
                },
                files: [{
                    expand: true,
                    cwd: 'public/wp-content/themes/common/',
                    src: ['**/*.scss', '!**/_*.scss'],
                    dest: 'public/wp-content/themes/common/',
                    ext: '.css',
                    extDot: 'last',
                    rename: function(dest, src) {
                        return scss_path_to_css(dest + src);
                    }
                }]
            }
        },
        watch: {
            css: {
                files: ['public/wp-content/themes/common/**/*.scss'],
                tasks: ['sass:expanded'],
                options: {
                    spawn: false,
                    interrupt: true,
                    debounceDelay: 250
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task(s).
    grunt.registerTask('default', ['sass:expanded', 'watch']);
    grunt.registerTask('prod', ['sass:expanded']);
};