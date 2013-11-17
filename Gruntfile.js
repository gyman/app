module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        cssmin: {
            options: {
                keepSpecialComments: 0,
            },
            bundled: {
                options: {
                    /*                    keepSpecialComments: 0,
                     target: './web/assets/css',
                     root: 'web/',
                     debug: true,
                     processImport: true,
                     noRebase: false,
                     relativeTo: './web/assets', */
                },
                src: 'build/assets/css/bundled.css',
                dest: 'web/assets/css/bundled.min.css'
            },
            dashboard: {
                src: 'build/assets/css/dashboard.css',
                dest: 'web/assets/css/dashboard.min.css'
            },
            main: {
                src: [
                    'build/assets/css/main.css',
                    'build/assets/css/filters.css',
                    'build/assets/css/lists.css'
                ],
                dest: 'web/assets/css/main.min.css'
            },
        },
        uglify: {
            js: {
                files: {
                    'web/assets/js/bundled.min.js': [
                        'bower_components/jquery/dist/jquery.js',
                        'bower_components/jquery-ui/ui/jquery-ui.js',
                        'bower_components/jquery-migrate/jquery-migrate.min.js',
                        "bower_components/bootstrap/js/bootstrap-alert.js",
                        "bower_components/bootstrap/js/bootstrap-button.js",
                        "bower_components/bootstrap/js/bootstrap-carousel.js",
                        "bower_components/bootstrap/js/bootstrap-collapse.js",
                        "bower_components/bootstrap/js/bootstrap-dropdown.js",
                        "bower_components/bootstrap/js/bootstrap-modal.js",
                        "bower_components/bootstrap/js/bootstrap-scrollspy.js",
                        "bower_components/bootstrap/js/bootstrap-tab.js",
                        "bower_components/bootstrap/js/bootstrap-tooltip.js",
                        "bower_components/bootstrap/js/bootstrap-transition.js",
                        "bower_components/bootstrap/js/bootstrap-typeahead.js",
                        "bower_components/bootstrap/js/bootstrap-popover.js",
                        "bower_components/uri.js/src/URI.js",
                        "bower_components/moment/min/moment-with-locales.js",
                        "bower_components/select2/select2.js",
                        "bower_components/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js",
                        "bower_components/bootstrap-datetimepicker/src/js/locales/bootstrap-datetimepicker.pl.js",
                        "bower_components/DataTables/media/js/jquery.dataTables.js",
                        "bower_components/datatables-plugins/integration/bootstrap/1/dataTables.bootstrap.js",
                        "bower_components/modernizr/modernizr.js",
                        "bower_components/blockui/jquery.blockUI.js",
                        "bower_components/pnotify/pnotify.core.js",
                        "bower_components/jquery.uniform/jquery.uniform.js",
                        "bower_components/jquery.knob/js/jquery.knob.js",
                        "bower_components/qTip/jquery.qtip.js",
                        "bower_components/highcharts/highcharts.js",
                        "bower_components/highcharts/modules/exporting.js",
                        'bower_components/fullcalendar/dist/fullcalendar.js',
                        'bower_components/jquery-file-upload/js/jquery.iframe-transport.js',
                        'bower_components/jquery-file-upload/js/jquery.fileupload.js',
                        'bower_components/webcam/jquery.webcam.js',
                        'vendor/friendsofsymfony/jsrouting-bundle/FOS/JsRoutingBundle/Resources/public/js/router.js',
                        'build/assets/js/global_coffee.js'
                    ],
                },
            },
            coffee: {
                files: {
                    'web/assets/js/dashboard.min.js': ['build/assets/js/dashboard_coffee.js'],
                    'web/assets/js/members.min.js': ['build/assets/js/members_coffee.js'],
                    'web/assets/js/lists.min.js': ['build/assets/js/lists_coffee.js'],
                    'web/assets/js/filters.min.js': ['build/assets/js/filters_coffee.js'],

                },
            },
        },
        coffee: {
            global: {
                files: {
                    'build/assets/js/global_coffee.js': [
                        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/configs.coffee',
                        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/AbstractModal.coffee',
                        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/modal.coffee',
                        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/main.coffee',
                        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/keyboardTyping.coffee',
                        'web/bundles/lists/coffee/reloadAjax.coffee',
                    ]
                },
            },
            dashboard: {
                files: {
                    'build/assets/js/dashboard_coffee.js': [
                        "src/Gyman/Bundle/DashboardBundle/Resources/coffee/ActivityTab.coffee",
                        "src/Gyman/Bundle/DashboardBundle/Resources/coffee/dashboard.coffee",
                    ],
                },
            },
            members: {
                files: {
                    'build/assets/js/members_coffee.js': [
                        "src/Gyman/Bundle/MembersBundle/Resources/coffee/members.editMember.coffee",
                        "src/Gyman/Bundle/MembersBundle/Resources/coffee/members.webcam.coffee",
                        "src/Gyman/Bundle/MembersBundle/Resources/coffee/members.filter.coffee",
                    ]
                }
            },
            lists: {
                files: {
                    'build/assets/js/lists_coffee.js': [
                        "src/Gyman/Bundle/ListsBundle/Resources/coffee/reloadAjax.coffee",
                        "src/Gyman/Bundle/ListsBundle/Resources/coffee/members.list.coffee",
                        "src/Gyman/Bundle/ListsBundle/Resources/coffee/entries.list.coffee",
                        "src/Gyman/Bundle/ListsBundle/Resources/coffee/vouchers.list.coffee",
                    ]
                }
            },
            filters: {
                files: {
                    'build/assets/js/filters_coffee.js': [
                        "src/Gyman/Bundle/FiltersBundle/Resources/coffee/NewFilterModal.coffee",
                        "src/Gyman/Bundle/FiltersBundle/Resources/coffee/tabs.coffee",
                    ]
                }
            },
        },
        concat: {
            options: {
                stripBanners: true,
            },
            "bundled-css": {
                src: [
                    'build/assets/css/bootstrap.css',
                    'build/assets/css/bootstrap-responsive.css',
                    'build/assets/css/select2.css',
                    'build/assets/css/select2-bootstrap.css',
                    'build/assets/css/bootstrap-datetimepicker.css',
                    'bower_components/font-awesome/css/font-awesome.css',
                    'bower_components/fullcalendar/dist/fullcalendar.css',
                    'bower_components/jquery.uniform/themes/default/css/uniform.default.css',

                    'bower_components/DataTables/media/css/jquery.dataTables.css',
                    'bower_components/datatables-plugins/integration/bootstrap/1/dataTables.bootstrap.css',

                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery-ui-timepicker-addon.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.autocomplete.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.combobox.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.core.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.dialog.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.progressbar.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.resizable.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.slider.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.spinner.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.theme.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.ui.tooltip.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/jquery.pnotify.default.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/main.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/custom.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/ie8.css',
                    'src/Gyman/Bundle/LayoutBundle/Resources/css/icons.css',
//                    'build/assets/css/main.css',
//                    'build/assets/css/dashboard.css',
                ],
                dest: 'build/assets/css/bundled.css',
                nonull: true
            },
        },
        copy: {
            "webcam-swf": {
                flatten: true,
                expand: true,
                cwd: 'bower_components/webcam/',
                src: 'jscam_canvas_only.swf',
                dest: 'web/assets/swf/'
            },
            "select2-images": {
                expand: true,
                cwd: 'bower_components/select2',
                src: '*',
                dest: 'build/assets/images/'
            },
            "bootstrap-datetimepicker": {
                src: "bower_components/bootstrap-datetimepicker/src/less/bootstrap-datetimepicker.less",
                dest: "bower_components/bootstrap/less/bootstrap-datetimepicker.less"
            },
            fonts: {
                expand: true,
                flatten: true,
                src: [
                    './src/**/fonts/*',
                    "./src/**.ttf",
                    "./src/**.woff",
                    "./src/**.otf",
                    './bower_components/**/fonts/*',
                    "./bower_components/**.ttf",
                    "./bower_components/**.woff",
                    "./bower_components/**.otf"
                ],
                dest: "./web/assets/fonts/"
            },
            "images": {
                expand: true,
                flatten: true,
                cwd: '',
                src: [
//                    './bower_components/**/images/**',
//                    './bower_components/**/img/**',
                    './src/**/Resources/**/images/**',
//                    '**.jpg',
//                    '**.jpeg',
//                    '**.gif',
//                    '**.png',
                ],
                dest: "./web/assets/images"
            },
        },
        less: {
            default: {
                options: {
                    paths: ["assets/css"],
                    relativeUrl: true
                },
                files: {
                    "build/assets/css/bootstrap.css": "bower_components/bootstrap/less/bootstrap.less",
                    "build/assets/css/bootstrap-responsive.css": "bower_components/bootstrap/less/responsive.less",
                    "build/assets/css/bootstrap-datetimepicker.css": "bower_components/bootstrap/less/bootstrap-datetimepicker.less",
                    "build/assets/css/dashboard.css": "src/Gyman/Bundle/DashboardBundle/Resources/less/dashboard.less",
                    "build/assets/css/lists.css": "src/Gyman/Bundle/ListsBundle/Resources/less/*.less",
                    "build/assets/css/main.css": "src/Gyman/Bundle/DefaultBundle/Resources/less/main.less",
                    "build/assets/css/filters.css": "src/Gyman/Bundle/FiltersBundle/Resources/less/filters.less",
                }
            }
        },
        cssUrlRewrite: {
            select2: {
                src: './bower_components/select2/select2.css',
                dest: "./build/assets/css/select2.css",
                options: {
                    skipExternal: true,
                    cwd: './'
                }
            },
            "select2-bootstrap": {
                src: './bower_components/select2/select2-bootstrap.css',
                dest: "./build/assets/css/select2-bootstrap.css",
                options: {
                    skipExternal: true,
                    cwd: './'
                }
            }
        }
    });

//    grunt.loadNpmTasks('grunt-bowercopy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-coffee');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks("grunt-css-url-rewrite");
    grunt.loadNpmTasks("grunt-image-embed");

    grunt.registerTask('default', ['cssUrlRewrite', 'copy', 'coffee', 'less', 'concat', 'cssmin', 'uglify']);

    grunt.registerTask('compile-coffee', ['coffee', 'uglify:coffee']);
    grunt.registerTask('compile-less', ['less', 'cssmin']);
};
