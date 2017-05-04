var gulp = require('gulp'),
    imagemin = require('gulp-imagemin'),
    del = require('del'),
    rev = require('gulp-rev'),
    uglify = require('gulp-uglify'),
    watch = require('gulp-watch'),
    browserSync = require('browser-sync').create();


gulp.task('watch_copyFontFiles', function() {
    return gulp.src('./app/fonts/**/*')
        .pipe(gulp.dest("./assets/fonts"));
});

gulp.task('watch_copyIconFiles', function() {
    return gulp.src('./app/ico/**')
        .pipe(gulp.dest("./assets/ico"));
});

gulp.task('watch_optimizeImages', function() {
    return gulp.src(['./app/images/**/*', '!./app/images/icons', '!./app/images/icons/**/*'])
        .pipe(imagemin({
            progressive: true,
            interlaced: true,
            multipass: true
        }))
        .pipe(gulp.dest("./assets/images"));
});

// gulp.task('usemin', ['styles', 'scripts'], function() {
//     return gulp.src("./header.php")
//         .pipe(usemin({
//             css: [function() {return rev()}, function() {return cssnano()}],
//             js: [function() {return rev()}, function() {return uglify()}]
//         }))
//         .pipe(gulp.dest("./assets"));
// });

gulp.task('watch_uglifyTrigger', function() {
    gulp.start("watch_uglify");
});

gulp.task('watch_uglify', function() {
    
    var scriptsToCopy = [
        './assets/scripts/**/*.js',
        '!./assets/scripts/modernizr.js'
    ]

    gulp.src(scriptsToCopy)
        .pipe(uglify())
        .pipe(gulp.dest('assets/scripts'));
});

// gulp.task('compress', function() {
//   gulp.src('lib/*.js')
//     .pipe(minify({
//         ext:{
//             src:'-debug.js',
//             min:'.js'
//         },
//         exclude: ['tasks'],
//         ignoreFiles: ['.combo.js', '-min.js']
//     }))
//     .pipe(gulp.dest('./assets'))
// });

gulp.task('watch', [
        'watch_copyFontFiles',
        'watch_copyIconFiles',
        'watch_optimizeImages',
        'watch_uglifyTrigger'
    ], function() {

    browserSync.init({
        notify: false,
        proxy: "http://localhost:8888/hallway"
    });

    watch('./*.php', function() {
        browserSync.reload();
    });

    watch('./app/styles/**/*.css', function() {
        gulp.start('cssInject');
    });

    watch('./app/scripts/**/*.js', function() {
        gulp.start('scriptsRefresh');
    })

});

gulp.task('cssInject', ['styles'], function() {
    return gulp.src('./assets/styles/styles.css')
        .pipe(browserSync.stream());
});

gulp.task('scriptsRefresh', ['scripts'], function() {
    browserSync.reload();
});






