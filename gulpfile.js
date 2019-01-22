// --------------------------------------------
// Dependencies
// --------------------------------------------
var autoprefixer = require('gulp-autoprefixer'),
  concat = require('gulp-concat'),
  del = require('del'),
  gulp = require('gulp'),
  minifycss = require('gulp-minify-css'),
  plumber = require('gulp-plumber'),
  sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps'),
  rename = require('gulp-rename'),
  uglify = require('gulp-uglify'),
  images = require('gulp-imagemin'),
  browserSync = require('browser-sync').create(),
  imagemin = require('gulp-imagemin'),
  babel = require('gulp-babel'),
  swPrecache = require('sw-precache'),
  jquery = require('jquery');


// paths
var styleSrc = 'content/themes/svt/src/sass/**/*.sass',
  styleDest = 'content/themes/svt/',
  htmlSrc = 'content/themes/svt/src/',
  htmlDest = 'content/themes/svt/',
  vendorSrc = 'content/themes/svt/src/js/vendors/',
  vendorDest = 'content/themes/svt/js/',
  scriptSrc = 'content/themes/svt/src/js/*.js',
  scriptDest = 'content/themes/svt/js/';




// --------------------------------------------
// Stand Alone Tasks
// --------------------------------------------





// Compiles all SASS files


gulp.task('sass', function () {
  return gulp
    .src(styleSrc)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))

    .pipe(minifycss())
    .pipe(autoprefixer('last 2 versions'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(styleDest));
});





gulp.task('images', function () {
  gulp.src('content/themes/svt/src/img/**/*')
    .pipe(images())
    .pipe(imagemin())
    .pipe(gulp.dest('img'));
});

// Uglify js files
gulp.task('scripts', function () {
  gulp.src('content/themes/svt/src/js/*.js')
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(babel({
      "presets": ["env"]
    }))
    .pipe(concat('main.min.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(scriptDest));
});

// //Concat and Compress Vendor .js files
// gulp.task('vendors', function () {
//   gulp.src(
//     [
//       'node_modules/jquery/dist/jquery.js',
//       'node_modules/rangeslider.js/dist/rangeslider.js',
//       'content/themes/svt/src/js/vendors/*.js'
//     ])
//     .pipe(plumber())
//     .pipe(concat('vendors.min.js'))
//     .pipe(uglify())
//     .pipe(gulp.dest('js'));
// });




// Watch for changes
gulp.task('watch', function () {

  // Serve files from the root of this project
  browserSync.init({

    proxy: 'svtinternational.digital'


  });

  gulp.watch(styleSrc, ['sass']);
  gulp.watch(styleSrc, ['images']);
  gulp.watch(scriptSrc, ['scripts']);
  gulp.watch(vendorSrc, ['vendors']);
  gulp.watch([
    '**/*.php',
    'content/themes/svt/*.css',
    'content/themes/svt/css/*.css',
    'content/themes/svt/js/*.js',
    'content/themes/svt/src/sass/*.sass',
    'content/themes/svt/src/sass/**/*.sass',
    'content/themes/svt/js/vendors/*.js'
  ]).on('change', browserSync.reload);

});


// use default task to launch Browsersync and watch JS files
gulp.task('default', ['sass', 'scripts', 'watch', 'images'], function () {});