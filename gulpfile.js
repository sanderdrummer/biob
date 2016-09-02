var gulp = require('gulp');

var concat = require('gulp-concat');
var less = require('gulp-less');
var minifyCSS = require('gulp-minify-css');


// compile and concat less
// 
// 
gulp.task('main', function(){
    gulp.src('./less/main.less')
    .pipe(less())
    .pipe(minifyCSS())
    .pipe(gulp.dest('./css/'));
});

gulp.task('default', function(){

    
    gulp.watch('./less/**/*.less', [
        'main'
    ]
    );  
});
