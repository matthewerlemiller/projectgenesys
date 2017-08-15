const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const plugins = [];

plugins.push(
    new webpack.DefinePlugin({ 'process.env.NODE_ENV': JSON.stringify(process.env.NODE_ENV || 'development')})
)

plugins.push(new webpack.optimize.CommonsChunkPlugin({ name: 'commons', filename: 'commons.js' }));

if (process.env.NODE_ENV === 'production') {
    plugins.push(new webpack.optimize.UglifyJsPlugin({
        comments: false,
        compress: {
            warnings: false
        },
        mangle: true
    }));
}

if (process.env.NODE_ENV === 'development') {
    devtool = 'eval';
} else {
    devtool = 'source-map';
}

module.exports = {
    entry: {
        main: './public/src/index.js',
    },
    output: {
        filename: '[name]-bundle.js',
        publicPath: '/bin/',
        path: path.resolve(__dirname, './public/bin/')
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                loader: "babel-loader",
            },
            {
                test: /\.svg$/,
                use: [
                    {
                        loader: 'babel-loader'
                    },
                    {
                        loader: 'react-svg-loader'
                    }
                ]
            },
            {
                test: /\.css$/,
                use: [
                    { loader: "style-loader" },
                    { loader: "css-loader" }
                ]
            }
        ]
    },
    resolve: {
        extensions: ['.js', '.jsx'],
        alias: {
            components: path.resolve(__dirname, 'public/src/components/'),
            utils: path.resolve(__dirname, 'public/src/utils/'),
            styles: path.resolve(__dirname, 'public/src/styles/')
        }
    },
    plugins : plugins
}
