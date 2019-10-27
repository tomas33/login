const webpack = require('webpack');
const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');

const config = {
	entry: './src/index.js',
	output: {
		path: path.resolve(__dirname, 'src/build'),
		filename: '[name].[contenthash].js'
	},
	module: {
		rules: [
			{
				test: /\.png$/,
				use: [
					{
						loader: 'url-loader'
					}
				]
			},
			{
				test: /\.vue$/,
				loader: 'vue-loader'
			},
			
			{
				test: /\.js$/,
				use: 'babel-loader',
				exclude: /node_modules/
			},
			{
				test: /\.css$/,
				use: [
					'vue-style-loader',
					'css-loader'
				]
			},
			{
				test: /\.svg$/,
				use: 'file-loader'
			},
			
		]
	},
	resolve: {
		extensions: [
			'.js',
			'.vue'
		]
	},
	plugins: [
		new VueLoaderPlugin(),
		new HtmlWebpackPlugin({
			template: require('html-webpack-template'),
			inject: false,
			appMountId: 'form',
		})
	],
	optimization: {
		runtimeChunk: 'single',
		splitChunks: {
			cacheGroups: {
				vendor: {
					test: /[\\/]node_modules[\\/]/,
					name: 'vendors',
					chunks: 'all'
				}
			}
		}
	}
};

module.exports = config;