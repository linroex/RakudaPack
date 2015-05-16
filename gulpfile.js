var gulp = require("gulp");
var twig = require("gulp-twig");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var rename = require("gulp-rename");
var cssmin = require("gulp-cssmin");

var path = {
    scripts: ["resources/source/js/jquery-2.1.4.js", "resources/source/js/bootstrap.js"],
    styles: "resources/source/css/**.css"
};

gulp.task("watch", function(){
    gulp.watch("resources/source/css/**.css", ['styles']);
    gulp.watch("resources/source/js/**.js", ['scripts']);
    gulp.watch("resources/source/**/*.html", ['twig', 'rename']);
    gulp.watch(["resources/source/image/**", "resources/source/fonts/**"], ['move']);
});

gulp.task("scripts", function(){
    return gulp.src(path.scripts)
		.pipe(uglify())
		.pipe(concat("all.min.js"))
		.pipe(gulp.dest("resources/views/js"));
});

gulp.task("styles", function(){
    return gulp.src(path.styles)
		.pipe(cssmin())
		.pipe(concat("all.min.css"))
		.pipe(gulp.dest("resources/views/css"));
});

gulp.task("rename", function(){
    return gulp.src("resources/source/twig-dest/**.html")
	.pipe(rename({extname: ".blade.php"}))
	.pipe(gulp.dest("resources/views"));
});

gulp.task("twig", function(){
    gulp.src("resources/source/**.html")
        .pipe(twig())
        .pipe(gulp.dest("resources/source/twig-dest"));
});

gulp.task("move", function(){
    gulp.src("resources/source/image/**")
	.pipe(gulp.dest("resources/views/image"));

    gulp.src("resources/source/fonts/**")
	.pipe(gulp.dest("resources/views/fonts"));
});
