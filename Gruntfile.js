module.exports = function (grunt) {
    var cssVendors = [
        "build/assets/css/bootstrap.css", // bootstrap 2.3.2 files compiled from less
        'bower_components/font-awesome/css/font-awesome.css',
        'bower_components/fullcalendar/dist/fullcalendar.css',
        'bower_components/jquery.uniform/themes/default/css/uniform.default.css',

        'bower_components/select2/select2.css',
        'bower_components/select2/select2-bootstrap.css',

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
    ];

    var lessFiles = [
        "bower_components/bootstrap/less/bootstrap.less",
        "bower_components/bootstrap/less/responsive.less",
        "bower_components/bootstrap/less/bootstrap-datetimepicker.less",
        "src/Gyman/Bundle/DashboardBundle/Resources/less/dashboard.less",
        "src/Gyman/Bundle/ListsBundle/Resources/less/*.less",
        "src/Gyman/Bundle/DefaultBundle/Resources/less/main.less",
        "src/Gyman/Bundle/FiltersBundle/Resources/less/filters.less",
        "src/Gyman/Bundle/ScheduleBundle/Resources/public/less/schedule.less",
        "src/Gyman/Bundle/EntriesBundle/Resources/public/less/*.less",
        "src/Gyman/Bundle/TimelineBundle/Resources/less/timeline.less"
    ];

    var mainLibraries = [
        'bower_components/jquery/dist/jquery.js',
        'bower_components/jquery-ui/ui/jquery-ui.js',
        'bower_components/jquery-migrate/jquery-migrate.min.js',

        'bower_components/underscore/underscore.js',

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
        "bower_components/bootstrap/js/bootstrap-popover.js",

        "bower_components/typeahead.js/dist/typeahead.jquery.js",

        "bower_components/uri.js/src/URI.js",
        "bower_components/uri.js/src/URI.fragmentQuery.js",
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
    ];

    var coffeeFiles = [
        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/configs.coffee',
        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/main.coffee',
        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/AbstractModal.coffee',
        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/modal.coffee',
        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/keyboardTyping.coffee',
        'src/Gyman/Bundle/DefaultBundle/Resources/coffee/SwitchClub.coffee',

        'web/bundles/lists/coffee/reloadAjax.coffee',

        "src/Gyman/Bundle/DashboardBundle/Resources/coffee/ActivityTab.coffee",
        "src/Gyman/Bundle/DashboardBundle/Resources/coffee/SearchInput.coffee",
        "src/Gyman/Bundle/DashboardBundle/Resources/coffee/ActionMenu.coffee",
        "src/Gyman/Bundle/DashboardBundle/Resources/coffee/Timeline.coffee",
        "src/Gyman/Bundle/DashboardBundle/Resources/coffee/dashboard.coffee",

        "src/Gyman/Bundle/MembersBundle/Resources/coffee/members.editMember.coffee",
        "src/Gyman/Bundle/MembersBundle/Resources/coffee/members.webcam.coffee",
        "src/Gyman/Bundle/MembersBundle/Resources/coffee/members.filter.coffee",

        "src/Gyman/Bundle/ListsBundle/Resources/coffee/reloadAjax.coffee",
        "src/Gyman/Bundle/ListsBundle/Resources/coffee/members.list.coffee",
        "src/Gyman/Bundle/ListsBundle/Resources/coffee/entries.list.coffee",
        "src/Gyman/Bundle/ListsBundle/Resources/coffee/vouchers.list.coffee",

        "src/Gyman/Bundle/FiltersBundle/Resources/coffee/NewFilterModal.coffee",
        "src/Gyman/Bundle/FiltersBundle/Resources/coffee/tabs.coffee",

        "src/Gyman/Bundle/ScheduleBundle/Resources/coffee/schedule-calendar.coffee",
        "src/Gyman/Bundle/ScheduleBundle/Resources/coffee/schedule.showEvent.coffee",
        "src/Gyman/Bundle/ScheduleBundle/Resources/coffee/schedule.newEvent.coffee",
        "src/Gyman/Bundle/ScheduleBundle/Resources/coffee/schedule.editEvent.coffee",

        "src/Gyman/Bundle/EntriesBundle/Resources/coffee/entries.modal.class.coffee",
        "src/Gyman/Bundle/EntriesBundle/Resources/coffee/entries.closeEntry.coffee",
        "src/Gyman/Bundle/EntriesBundle/Resources/coffee/entries.newEntry.coffee",
        "src/Gyman/Bundle/EntriesBundle/Resources/coffee/entries.editEntry.coffee",

        "src/Gyman/Bundle/VouchersBundle/Resources/coffee/vouchers.closeVoucher.coffee",
        "src/Gyman/Bundle/VouchersBundle/Resources/coffee/vouchers.newVoucher.coffee"
    ];

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        clean: {
            build:            { src: "build/assets" },
            web:              { src: [ "web/assets", "web/js", "web/css", "web/fonts", "web/images"] },
            "dev-assets":     { src: ["!web/js/*.js", "!web/js/*.min.js", "!web/css/*.css", "!web/css/*.min.css"] }
        },
        watch: {
            scripts: {
                files: coffeeFiles,
                tasks: ['coffee:development'],
                options: {
                    spawn: false,
                },
            },
            styles: {
                files: lessFiles,
                tasks: ['less:development-project'],
                options: {
                    spawn: false,
                },
            }
        },
        less: {
            "development-vendors": {
                options: {
                    paths: [ "bower_components" ],
                    compress: false,
                    yuicompress: false,
                    optimization: 0
                },
                files : {
                    "build/assets/css/bootstrap.css" : [
                        "bower_components/bootstrap/less/bootstrap.less",
                        "bower_components/bootstrap/less/responsive.less",
                        "bower_components/bootstrap/less/bootstrap-datetimepicker.less",
                    ]
                }
            },
            "development-project": {
                options: {
                    paths: [ "src", 'app/Resources' ],
                    compress: false,
                    yuicompress: false,
                    optimization: 0
                },
                files : {
                    "web/css/project.css" : [
                        "src/**/*.less",
                        "app/Resources/**/*.less"
                    ]
                }
            },
        },
        uglify: {
            production: {
                files: {
                    'web/js/vendors.min.js': 'web/js/vendors.js',
                    'web/js/project.min.js': 'web/js/project.js'
                },
            },
        },
        cssmin: {
            "production-vendors": {
                src: 'web/css/vendors.css',
                dest: 'web/css/vendors.min.css'
            },
            "production-project": {
                src: 'web/css/project.css',
                dest: 'web/css/project.min.css'
            },
        },
        coffee: {
            development: {
                files: {
                    'web/js/project.js': coffeeFiles
                },
            },
        },
        concat: {
            "vendors.css": {
                src: cssVendors,
                dest: 'web/css/vendors.css',
                nonull: true
            },
            "vendors.js": {
                src: mainLibraries,
                dest: 'web/js/vendors.js',
                nonull: true
            },
        },
        exec: {
            "assets-install": {
                command: './app/console assets:install web --symlink',
                stdout: true
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
            "datetimepicker": {
                src: "bower_components/bootstrap-datetimepicker/src/less/bootstrap-datetimepicker.less",
                dest: "bower_components/bootstrap/less/bootstrap-datetimepicker.less"
            },
            fonts: {
                expand: true,
                flatten: true,
                filter: 'isFile',
                src: [
                    './vendor/gyman/supr/css/fonts/*',
                ],
                dest: "./web/fonts/"
            },
            images: {
                expand: true,
                flatten: true,
                cwd: '',
                filter: 'isFile',
                src: [
                    './vendor/gyman/supr/images/**/*.{png,jpg,svg,gif}',
                    './bower_components/bootstrap/images/*.{png,jpg,svg,gif}',
                    './bower_components/DataTables/media/images/*.{png,jpg,svg,gif}',
                    './bower_components/jquery-file-upload/img/*.{png,jpg,svg,gif}',
                    './bower_components/jquery.uniform/themes/default/images/*.{png,jpg,svg,gif}',
                    './bower_components/select2/*.{png,jpg,svg,gif}',
                ],
                dest: "./web/images"
            },

        },
    });

    grunt.registerTask('css:development', [
        "copy:datetimepicker",                  // datetimepicker to bootstrap dir
        "less:development-vendors",             // compiles *.less from vendors
        "concat:vendors.css",                   // concatenates vendors into one web/css/vendors.css file
        "less:development-project",             // compiles *.less from project into one web/css/project.css file
    ]);

    grunt.registerTask('js:development', [
        "coffee:development",                  // compiles *.coffee files into one web/js/project.js
        "concat:vendors.js",                   // concatenates vendors into one web/js/vendors.js
    ]);

    grunt.registerTask('development', [
        "clean:build",
        "clean:web",
        "css:development",
        "js:development",
        "copy:webcam-swf",
        "copy:images",
        "copy:fonts",
    ]);

    grunt.registerTask('production', [
        "development",
        "cssmin:production-vendors",
        "cssmin:production-project",
        "uglify:production",
        "clean:dev-assets"
    ]);

    grunt.registerTask('default', [
        'production'
    ]);

    grunt.config.set('color', 0);
    grunt.option('no-color');

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-coffee');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks("grunt-contrib-clean");
    grunt.loadNpmTasks("grunt-exec");
    grunt.loadNpmTasks('grunt-contrib-watch');
    //grunt.loadNpmTasks("grunt-css-url-rewrite");
    //grunt.loadNpmTasks("grunt-image-embed");
};
