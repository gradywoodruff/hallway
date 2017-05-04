module.exports = {
	entry: {
		App: "./app/scripts/App.js",
		Vendor: "./app/scripts/Vendor.js"
	},
	output: {
		path: "./assets/scripts",
		filename: "[name].js"
	},
	module : {
		loaders: [
			{
				loader: 'babel-loader',
				query: {
					presets: ['es2015']
				},
				test: /\.js$/,
				exclude: /node_modules/
			}
		]
	}
}