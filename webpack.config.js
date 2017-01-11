var ExtractTextPlugin = require('extract-text-webpack-plugin');
var OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');

module.exports = function () {
    return {
        entry: './assets/js/main.js',
        output: {
            path: './dist',
            filename: 'bundle.js'
        },
        module: {
            rules: [
                {
                    test: /\.(css|scss)$/,
                    loader: ExtractTextPlugin.extract({
                        loader: [
                            { loader: 'css-loader'},
                            { loader: 'resolve-url-loader?sourceMap'},
                            { loader: 'sass-loader?sourceMap'},
                            { loader: 'postcss-loader?sourceMap' },
                        ]
                    })

                // test: /\.sass$/,
                // exclude: /node_modules/,
                // use: [{
                //     loader: 'style-loader',
                //     options: {
                //         sourceMap: true
                //     }
                // },{
                //     loader: 'css-loader',
                //     options: {
                //         localIdentName: '[hash:8]-[name]-[local]',
                //         modules: true,
                //         sourceMap: true
                //     }
                // },{
                //     loader: 'postcss-loader',
                //     options: {
                //         sourceMap: true
                //     }
                // },{
                //     loader: 'sass-loader',
                //     options: {
                //         sourceMap: true,
                //     }
                // }]
                // // loader: ExtractTextPlugin.extract({
                // //     loader: [
                // //         {
                // //             loader: 'css-loader',
                // //             options: {
                // //                 modules: true
                // //             }
                // //         }
                // //     ]
                // // })
            }]
        },
        devtool: 'source-map',
        plugins: [
            new ExtractTextPlugin({ filename: 'bundle.css', disable: false, allChunks: true }),
            new OptimizeCssAssetsPlugin()
        ]
    }
}