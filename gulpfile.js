const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const webpack = require('webpack-stream');
const uglify = require('uglifyjs-webpack-plugin');

gulp.task('serve', function () {
  browserSync.init({
    proxy: 'http://127.0.0.1:8000',
    port: 8080,
    open: true,
    notify: false
  });
  gulp.watch('resources/scss/**/*.scss', ['styles']);
  gulp.watch('resources/js/**/*.js', ['scripts']);
  gulp.watch('resources/views/**/*.blade.php').on('change', browserSync.reload);
});

gulp.task('styles', function () {
  return gulp.src('resources/scss/app.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: [
        'Last 2 Chrome versions',
        'Last 2 Edge versions',
        'IE 11'
      ],
      cascade: false
    }))
    .pipe(rename('styles.min.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('public/'))
    .pipe(browserSync.stream());
});

gulp.task('scripts', function () {
  return gulp.src('resources/js/app.js')
    .pipe(webpack({
      devtool: 'source-map',
      output: { filename: 'app.min.js' },
      module: {
        rules: [
          { test: /\.js$/, exclude: /node_modules/, use: { loader: 'babel-loader', options: { presets: ['env'] } } }
        ]
      },
      plugins: [
        new uglify({ sourceMap: true })
      ]
    })).on('error', function () { this.emit('end') })
    .pipe(gulp.dest('public/'))
    .pipe(browserSync.stream());
});

gulp.task('default', ['serve', 'styles', 'scripts']);
