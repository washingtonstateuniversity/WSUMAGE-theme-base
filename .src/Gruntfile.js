module.exports = function(grunt) {

    var skin_path = "./skin/frontend/wsu_base/default/";
    var admin_skin_path = "./skin/adminhtml/default/default/";

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        /*concat: {
            options: {
                sourceMap: true
            },
            dist: {
                src: 'css/*.css',
                dest: 'tmp-style.css'
            }
        },*/
        watch: {
            files: [ "./app/**/*.*","./js/**/*.*","./errors/**/*.*","./skin/**/*.*","./media/**/*.*" ],
            tasks: [/*"concat", "sass", "postcss", "cssmin", "copy", "csslint",*/
            "clean", "sass", "concat", "jshint", "autoprefixer", "cssmin", "uglify", "copy", "sync", "phpcbf", "phpcs", "sync"]
        },


        sass: {
            options: {
                sourceMap: true
            },
            dev: {
                files: [
                    { src: skin_path + "src/scss/theme.scss", dest: "./.build/_pre_sass/theme.css" },
                    { src: skin_path + "src/scss/admin_preview.scss", dest: "./.build/_pre_sass/admin_preview.css" },
                ]
            },
        },
        copy:{
            maps: {
                files: [
                    { expand: true, src: ["./.build/_pre_sass/theme.css.map"], dest: skin_path, flatten: true, },
                ]
            },
            preview_maps: {
                files: [
                    { expand: true, src: ["./.build/_pre_sass/admin_preview.css.map"], dest: admin_skin_path+"wsu/css/", flatten: true },
                    { expand: true, src: ["./.build/wsu/css/admin_preview.css"], dest: admin_skin_path+"wsu/css/", flatten: true },
                    { expand: true, src: ["./.build/theme.css"], dest: skin_path, flatten: true },
                ]
            }
        },

        concat: {
            front_styles: {
                src: [
                    "./.build/_pre_sass/theme.css"
                ],
                dest: "./.build/css/theme.css",
            },
            admin_preview_styles: {
                src: [
                    "./.build/_pre_sass/admin_preview.css"
                ],
                dest: "./.build/css/admin_preview.css",
            },
        },
        uglify: {
            options: {
                banner: "/*! <%= pkg.name %> <%= pkg.version %> <%= grunt.template.today('yyyy-mm-dd') %> */\n" +
                    "/*   */\n"
            },
            preview_build: {
                src: admin_skin_path+"wsu/js/preview.js",
                dest: admin_skin_path+"wsu/js/_preview.js"
            },
            /*admin_build: {
                src: "build/js/admin.maps.wsu.edu.js",
                dest: "dis/js/admin.maps.wsu.edu.js"
            }*/
        },
        autoprefixer: {
            options: {
                browsers: ["> 1%", "last 2 versions", "Firefox ESR", "Opera 12.1", "ie 8", "ie 9","ie 10"]
            },
            front_styles: {
                src: "./.build/css/theme.css",
                dest: "./.build/_precss/theme.css"
            },
            admin_preview_styles: {
                src: "./.build/css/admin_preview.css",
                dest: "./.build/_precss/admin_preview.css"
            },
        },
        cssmin: {
            options: {
                sourceMap: true,
            },
            combine: {
                files: {
                    // Hmmm, in reverse order
                    "./.build/theme.css": ["./.build/_precss/theme.css"],
                    "./.build/wsu/css/admin_preview.css": ["./.build/_precss/admin_preview.css"],
                }
            }
        },
        sync:{
            /*maps: {
                files: [
                    { expand: true, src: ["build/_precss/style.map"], dest: "", flatten: true, },
                ]
            },*/

            dev: {
                files: [
                    { expand: true, src: ["./app/**/*","./js/**/*","./errors/**/*","./skin/**/*","./media/**/*"], dest: "../" },
                    { expand: true, src: ["./app/**/*","./js/**/*","./errors/**/*","./skin/**/*","./media/**/*"], dest: "E:\\_GIT\\MAGE\\server\\app\\stores\\html\\" },
                ]
            }

        },
        csslint: {
            main: {
                src: [ "style.css" ],
                options: {
                    "fallback-colors": false,              // unless we want to support IE8
                    "box-sizing": false,                   // unless we want to support IE7
                    "compatible-vendor-prefixes": false,   // The library on this is older than autoprefixer.
                    "gradients": false,                    // This also applies ^
                    "overqualified-elements": false,       // We have weird uses that will always generate warnings.
                    "ids": false,
                    "regex-selectors": false,              // audit
                    "adjoining-classes": false,
                    "box-model": false,                    // audit
                    "universal-selector": false,           // audit
                    "unique-headings": false,              // audit
                    "outline-none": false,                 // audit
                    "floats": false,
                    "font-sizes": false,                   // audit
                    "important": false,                    // This should be set to 2 one day.
                    "unqualified-attributes": false,       // Should probably be 2 one day.
                    "qualified-headings": false,
                    "known-properties": 1,              // Okay to ignore in the case of known unknowns.
                    "duplicate-background-images": 2,
                    "duplicate-properties": 2,
                    "star-property-hack": 2,
                    "text-indent": 2,
                    "display-property-grouping": 2,
                    "shorthand": 2,
                    "empty-rules": false,
                    "vendor-prefix": 2,
                    "zero-units": 2
                }
            }
        },
        jshint: {
            files: [
                    //"src/js/zeroclipboard/ZeroClipboard.js",
                ],
            options: {
                // options here to override JSHint defaults
                boss: true,
                curly: true,
                eqeqeq: true,
                eqnull: true,
                expr: true,
                immed: true,
                noarg: true,
                //onevar: true,
                //quotmark: "double",
                smarttabs: true,
                //trailing: true,
                undef: true,
                unused: true,
                globals: {
                    jQuery: true,
                    $: true,
                    console: true,
                    module: true,
                    document: true,
                    window:true,
                    define:true,
                    alert:true,
                    setTimeout:true,
                    ZeroClipboard:true,
                    MutationObserver:true,
                    google:true,
                    tinyMCE:true,
                    tinymce:true,
                    addthis:true,
                }
            }
        },
        clean: {
            options: {
                force: true
            },
            temp: [ "../app/**/*","../js/**/*","../errors/**/*.*","../skin/**/*","../media/**/*" ]
        },

        phpcs: {
            options: {
                bin: "./vendor/bin/phpcs --standard=Ecg --extensions=php --ignore=\"vendor/*,node_modules/*\"",
                standard: "./vendor/magento-ecg/coding-standard/Ecg/ruleset.xml"
            },
            psr_2: {
                src:'./',
                options: {
                    bin: "./vendor/bin/phpcs --extensions=php --ignore=\"vendor/*,node_modules/*\"",
                    standard: "./phpcs_psr2.ruleset.xml"
                },
            },
            Ecg: {
                src:'./'
            },
        },
        phpcbf: {
            options: {
                bin: "./vendor/bin/phpcbf --extensions=php --ignore=\"vendor/*,node_modules/*\"",
                standard: "./vendor/magento-ecg/coding-standard/Ecg/ruleset.xml"
            },
            psr_2: {
                src:'./',
                options: {
                    bin: "./vendor/bin/phpcbf --extensions=php --ignore=\"vendor/*,node_modules/*\"",
                    standard: "./phpcs_psr2.ruleset.xml"
                },
            },
            Ecg: {
                src:'./'
            },
        },

    });

    grunt.loadNpmTasks( "grunt-postcss" );
    grunt.loadNpmTasks( "grunt-sass" );
    grunt.loadNpmTasks( "grunt-sync" );
    grunt.loadNpmTasks( "grunt-contrib-copy" );
    grunt.loadNpmTasks( "grunt-contrib-cssmin" );
    grunt.loadNpmTasks( "grunt-contrib-concat" );
    grunt.loadNpmTasks( "grunt-contrib-csslint" );
    grunt.loadNpmTasks( "grunt-contrib-clean" );
    grunt.loadNpmTasks( "grunt-contrib-watch" );
    grunt.loadNpmTasks( "grunt-phpcs" );
    grunt.loadNpmTasks( 'grunt-phpcbf' );

    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-contrib-jshint");
    grunt.loadNpmTasks("grunt-contrib-cssmin");
    grunt.loadNpmTasks("grunt-contrib-concat");
    grunt.loadNpmTasks("grunt-autoprefixer");





    // Default task(s).
    grunt.registerTask("default", [/*"concat",*/ "sass", "postcss", "cssmin", "copy", "csslint", "clean", "phpcbf", "phpcs"]);
};
