const fs = require('fs');
let mix = require('laravel-mix');

function ArchitectWidgets() {
    const widgets = JSON.parse(fs.readFileSync('./Widgets/widgets.json'));

    var reactFiles = [];
    var cssFiles = [];

    widgets.forEach(function(widget){
        widget.src.forEach(function(fileName) {
            switch(fileName.split('.').pop()) {
                case "js":
                    reactFiles.push('./widgets/' + widget.name + '/' + fileName);
                    break;

                case "sass":
                case "scss":
                    // Compile widget SCSS on the fly
                    mix.sass('./widgets/' + widget.name + '/' + fileName, './public/widgets/css/');

                    cssFiles.push('public/widgets/css/' + fileName + '.css');
                    break;
            }
        });
    });

    // Compile react & build one file CSS
    mix
        .react(reactFiles, 'public/widgets/widgets.js')
        .styles(cssFiles, 'public/widgets/widgets.css');


    //copy images
    widgets.forEach(function(widget){
      mix.copy('Widgets/'+widget.name+'/'+widget.name+'.jpg', 'public/widgets/images');
    });

    //         .extract(['react'])
}

ArchitectWidgets.prototype.apply = function(compiler) {
    compiler.plugin('emit', function(compilation, callback) {
        callback();
    });
};

module.exports = ArchitectWidgets;
