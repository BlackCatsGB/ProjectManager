const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = [
    {
        entry: {
            main: path.resolve(__dirname, 'src/index.jsx')
        },
        output: {
            path: path.resolve(__dirname, 'dist'),
            filename: 'bundle.[chunkhash].js'
        },
        resolve: {
            extensions: ['.js', '.jsx'],
            alias: {
                components: path.resolve(__dirname, 'src/components'),
                containers: path.resolve(__dirname, 'src/containers')
            }
        },
        module: {
            rules: [
                {
                    test: /\.jsx?$/,
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader'
                    }
                },
                {
                    test: /\.s?a?c?ss$/,
                    use: ExtractTextPlugin.extract({
                        fallback: 'style-loader',
                        use: [
                            'css-loader',
                            'postcss-loader',
                            'sass-loader'
                        ]
                    })
                },
                {
                    test: /\.(jpg|jpeg|gif|png)$/,
                    exclude: /node_modules/,
                    loader: 'file-loader',
                    options: {
                        name: 'images/[name].[ext]'
                    }
                },
            ]
        },
        plugins: [
            new ExtractTextPlugin({
                filename: 'main.[chunkhash].css',
                disable: false,
                allChunks: true
            }),
            new HtmlWebpackPlugin({
                template: path.resolve(__dirname, 'src/index.html'),
                filename: 'index.html'
            })
        ],
        devServer: {
            contentBase: path.join(__dirname, 'dist'),
            port: 9000,
            historyApiFallback: true
        }
    },
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //сборка файлов без хеша в проект Yii2
    {
        entry: {
            main: path.resolve(__dirname, 'src/index.jsx')
        },
        output: {
            path: path.resolve(__dirname, 'frontend/assets/DemandApp'),
            filename: 'react_demands.js'
        },
        resolve: {
            extensions: ['.js', '.jsx'],
            alias: {
                components: path.resolve(__dirname, 'src/components'),
                containers: path.resolve(__dirname, 'src/containers')
            }
        },
        module: {
            rules: [
                {
                    test: /\.jsx?$/,
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader'
                    }
                },
                {
                    test: /\.s?a?c?ss$/,
                    use: ExtractTextPlugin.extract({
                        fallback: 'style-loader',
                        use: [
                            'css-loader',
                            'postcss-loader',
                            'sass-loader'
                        ]
                    })
                },
                {
                    test: /\.(jpg|jpeg|gif|png)$/,
                    exclude: /node_modules/,
                    loader: 'file-loader',
                    options: {
                        name: 'images/[name].[ext]'
                    }
                },
            ]
        },
        plugins: [
            new ExtractTextPlugin({
                filename: 'react_demands.css',
                disable: false,
                allChunks: true
            }),
        ],
        devServer: {
            contentBase: path.join(__dirname, 'dist'),
            port: 9000,
            historyApiFallback: true
        }
    }
]