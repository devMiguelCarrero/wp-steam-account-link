const gulp = require("gulp");
const zip = require("gulp-zip");
const M = require("minimatch");

const bundle = () => {
  return gulp
    .src([
      "**/*",
      "!node_modules/**",
      "!src/**",
      "!bundled/**",
      "!gulpfile.js",
      "!package.json",
      "!package-lock.json",
      "!webpack.config.js",
      "!gitignore",
    ])
    .pipe(zip("wp-steam-account-link.zip"))
    .pipe(gulp.dest("bundled"));
};

exports.bundle = bundle;
