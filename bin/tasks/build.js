var gulp = require('gulp'),
    imagemin = require('gulp-imagemin'),
    del = require('del'),
    rev = require('gulp-rev'),
    uglify = require('gulp-uglify');

gulp.task('deleteDistFolder', function() {
    return del("./docs");
});

gulp.task('copyGeneralFiles', ['deleteDistFolder'], function() {
    var pathsToCopy = [
        './*.php',
        './style.css',
        '!./app/images/**',
        '!./app/styles/**',
        '!./app/scripts/**'
    ]

    return gulp.src(pathsToCopy)
        .pipe(gulp.dest("./docs"));
});

gulp.task('copyPartsFiles', ['deleteDistFolder'], function() {
    var pathsToCopy = [
        './parts/*.php'
    ]

    return gulp.src(pathsToCopy)
        .pipe(gulp.dest("./docs/parts"));
});

gulp.task('copyFontFiles', ['deleteDistFolder'], function() {

    var fontsToCopy = [
        './app/fonts/**/*'
    ]

    return gulp.src(fontsToCopy)
        .pipe(gulp.dest("./docs/assets/fonts"));
});

gulp.task('copyIconFiles', ['deleteDistFolder'], function() {

    var iconsToCopy = [
        './app/ico/**'
    ]

    return gulp.src(iconsToCopy)
        .pipe(gulp.dest("./docs/assets/ico"));
});

gulp.task('optimizeImages', ['deleteDistFolder'], function() {
    return gulp.src(['./app/images/**/*', '!./app/images/icons', '!./app/images/icons/**/*'])
        .pipe(imagemin({
            progressive: true,
            interlaced: true,
            multipass: true
        }))
        .pipe(gulp.dest("./docs/assets/images"));
});

// gulp.task('usemin', ['styles', 'scripts'], function() {
//     return gulp.src("./header.php")
//         .pipe(usemin({
//             css: [function() {return rev()}, function() {return cssnano()}],
//             js: [function() {return rev()}, function() {return uglify()}]
//         }))
//         .pipe(gulp.dest("./docs"));
// });

gulp.task('uglifyTrigger', ['deleteDistFolder'], function() {
    gulp.start("uglify");
});

gulp.task('uglify', function() {
    
    var scriptsToCopy = [
        './assets/scripts/**/*.js',
        '!./assets/scripts/modernizr.js'
    ]

    gulp.src(scriptsToCopy)
        .pipe(uglify())
        .pipe(gulp.dest('./docs/assets/scripts'));
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
//     .pipe(gulp.dest('./docs'))
// });

gulp.task('build', [
        'deleteDistFolder',
        'copyGeneralFiles',
        'copyPartsFiles',
        'copyFontFiles',
        'copyIconFiles',
        'optimizeImages',
        'uglifyTrigger'
    ]);






