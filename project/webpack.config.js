const path = require("path");
const fs = require("fs");
const glob = require("glob");
const webpack = require("webpack");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const TerserPlugin = require("terser-webpack-plugin");
var OptimizeCssAssetsPlugin = require("optimize-css-assets-webpack-plugin");
var ScriptExtHtmlWebpackPlugin = require('script-ext-html-webpack-plugin');
const AsyncStylesheetWebpackPlugin = require('async-stylesheet-webpack-plugin');
var LiveReloadPlugin = require('webpack-livereload-plugin');
const PurgecssPlugin = require('purgecss-webpack-plugin');

const PATHS = {
    src: path.join(__dirname, "src")
};



//output
const thema = 'templates/travelsoft/thema';
const bitrixThema = 'templates/travelsoft/components/bitrix';
const tsOperatorThema = 'components/travelsoft';
//entry
const components= './src-travellab/scss/components/';
const mainStyle = './src-travellab/scss/';

const  pathSCSS = {
    [`${thema}/style`]:`${mainStyle}style.scss`,
    [`${thema}/componets/H1`]:`${components}H1.scss`,
    [`${thema}/componets/btn`]:`${components}btn.scss`,
    [`${thema}/componets/section-background`]:`${components}section-background.scss`,
    [`${thema}/componets/form`]:`${components}forms.scss`,

    [`${thema}/componets/contact-list`]:`${components}contact-list.scss`,
    [`${bitrixThema}/menu/top-menu-desctop/css/navbar`]:`${components}navbar.scss`,
    [`${bitrixThema}/menu/top-menu-desctop/css/header-search`]:`${components}header-search.scss`,
    [`${bitrixThema}/menu/top-menu-mobile/css/navbar`]:`${components}navbar.scss`,
    [`${bitrixThema}/menu/top-menu-mobile/css/header-search`]:`${components}header-search.scss`,
    [`${bitrixThema}/breadcrumb/template/css/breadcrumb`]:`${components}breadcrumb.scss`,

    [`${tsOperatorThema}/travelsoft.news.list/templates/home_slider/css/main-slider`]:`${components}main_slider-v3.scss`,
    [`${tsOperatorThema}/booking.search_form/templates/excursiontours/css/main-search_form`]:`${components}main-search_form-with-tabs-v2.scss`,

};


function generateHtmlPlugins(templateDir) {
    const templateFiles = fs.readdirSync(path.resolve(__dirname, templateDir));
    let arrPlugin = [];
    templateFiles.forEach(item => {
        const parts = item.split(".");
        const name = parts[0];
        const extension = parts[1];
        arrPlugin.push(new HtmlWebpackPlugin({
            filename: `${name}.html`,
            template: path.resolve(__dirname, `${templateDir}/${name}.${extension}`),
        }));
        arrPlugin.push( new AsyncStylesheetWebpackPlugin({preloadPolyfill: true})),
        arrPlugin.push(new ScriptExtHtmlWebpackPlugin({
          defaultAttribute: 'async'
        }));
        // arrPlugin.push( new PurgecssPlugin({
        //     paths: glob.sync(`${PATHS.src}/**/*`,  { nodir: true }),
        // }));
    });
    return arrPlugin;
}


// let cssFiles = fs.readdirSync(path.resolve(__dirname,'./src-travellab/scss/components'));
// cssFilesKey = cssFiles.map(item=>item.substr(0,item.length - 5));
//
// function generateInputCss (file,key){
//     let obj = {}; g
//     cssFiles.forEach((item,index)=>{
//
//         obj[`${cssFilesKey[index]}`] = `./src-travellab/scss/components/${item}`
//
//     })
//     return obj;
// };

//console.log( generateInputCss ());





let htmlPlugins = generateHtmlPlugins("./src-travellab/html/views");
//let css = generateInputCss();

const configProd = {
    entry: {
        "index":"./src-travellab/js/index.js",
        //...pathSCSS

    },
    output: {
        path: path.resolve(__dirname, './demo1'),
        filename: 'js/[name].js',
    },
    devtool: "source-map",
    mode: "prod",
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.(gif|png|jpe?g|svg)$/i,
                use: [
                    "file-loader",
                    {
                        loader: "image-webpack-loader",
                        options: {
                            mozjpeg: {
                                progressive: true,
                                quality: 65
                            },
                            // optipng.enabled: false will disable optipng
                            optipng: {
                                enabled: false
                            },
                            pngquant: {
                                quality: [0.65, 0.9],
                                speed: 4
                            },
                            gifsicle: {
                                interlaced: false
                            },
                            // the webp option will enable WEBP
                            webp: {
                                quality: 75
                            }
                        }
                    }
                ]
            },
            {
                test: /\.(sass|scss|css)$/,
                include: path.resolve(__dirname, "src-travellab/scss"),
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {}
                    },
                    {
                        loader: "css-loader",
                        options: {
                            sourceMap: true,
                            url: false
                        }
                    },
                    {
                        loader: "postcss-loader",
                        options: {
                            ident: "postcss",
                            sourceMap: true,
                            plugins: [
                                require('autoprefixer')({
                                    'browsers': ['> 1%', 'last 2 versions']
                                }),
                            ]
                        }
                    },
                    {
                        loader: "sass-loader",
                        options: {
                            sourceMap: true
                        }
                    }
                ]
            },
            {
                test: /\.html$/,
                include: [path.resolve(__dirname, "src-travellab/html/includes")],
                use: ["raw-loader"]
            },
        ]
    },
    optimization: {
        minimizer: [
            new TerserPlugin({
                sourceMap: true,
                extractComments: true
            }),

        ],



    },
    plugins: [
        new LiveReloadPlugin({}),

        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
        }),

        // new OptimizeCssAssetsPlugin({
        //   assetNameRegExp: /\.optimize\.css$/,
        //   cssProcessor: require("cssnano"),
        //   cssProcessorPluginOptions: {
        //     preset: ["default", { discardComments: { removeAll: true } }]
        //   },
        //   canPrint: true
        // }),


        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery"
        }),


        new CopyWebpackPlugin([
            {
                from: "./src-travellab/assets",
                to: "./assets"
            },
            {
                from: "./src-travellab/fonts",
                to: "./fonts"
            },
            {
                from: "./src-travellab/favicon",
                to: "./favicon"
            },
            {
                from: "./src-travellab/img",
                to: "./img"
            },
            {
                from: "./src-travellab/uploads",
                to: "./uploads"
            }
        ]),

    ].concat(htmlPlugins),


};
const configDev = {
    entry: {
        "index":"./src-travellab/js/index.js",


    },
    output: {
        path: path.resolve(__dirname, 'local/'),
        filename: 'js/[name].js',
    },
    devtool: "source-map",
    mode: "dev",
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.(gif|png|jpe?g|svg)$/i,
                use: [
                    "file-loader",
                    {
                        loader: "image-webpack-loader",
                        options: {
                            mozjpeg: {
                                progressive: true,
                                quality: 65
                            },
                            // optipng.enabled: false will disable optipng
                            optipng: {
                                enabled: false
                            },
                            pngquant: {
                                quality: [0.65, 0.9],
                                speed: 4
                            },
                            gifsicle: {
                                interlaced: false
                            },
                            // the webp option will enable WEBP
                            webp: {
                                quality: 75
                            }
                        }
                    }
                ]
            },
            {
                test: /\.(sass|scss|css)$/,
                include: path.resolve(__dirname, "src-travellab/scss"),
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {}
                    },
                    {
                        loader: "css-loader",
                        options: {
                            sourceMap: true,
                            url: false
                        }
                    },
                    {
                        loader: "postcss-loader",
                        options: {
                            ident: "postcss",
                            sourceMap: true,
                            plugins: [
                                require('autoprefixer')({
                                    'browsers': ['> 1%', 'last 2 versions']
                                }),
                            ]
                        }
                    },
                    {
                        loader: "sass-loader",
                        options: {
                            sourceMap: true
                        }
                    }
                ]
            },
            {
                test: /\.html$/,
                include: [path.resolve(__dirname, "src-travellab/html/includes")],
                use: ["raw-loader"]
            },
        ]
    },
    optimization: {
        minimizer: [
            new TerserPlugin({
                sourceMap: true,
                extractComments: true
            }),

        ],



    },
    plugins: [
        new LiveReloadPlugin({}),

        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),

        // new OptimizeCssAssetsPlugin({
        //   assetNameRegExp: /\.optimize\.css$/,
        //   cssProcessor: require("cssnano"),
        //   cssProcessorPluginOptions: {
        //     preset: ["default", { discardComments: { removeAll: true } }]
        //   },
        //   canPrint: true
        // }),


        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery"
        }),


        new CopyWebpackPlugin([
            {
                from: "./src-travellab/assets",
                to: "./assets"
            },
            {
                from: "./src-travellab/fonts",
                to: "./fonts"
            },
            {
                from: "./src-travellab/favicon",
                to: "./favicon"
            },
            {
                from: "./src-travellab/img",
                to: "./img"
            },
            {
                from: "./src-travellab/uploads",
                to: "./uploads"
            }
        ]),

    ].concat(htmlPlugins),


};

module.exports = (env, argv) => {
    if (argv.mode === "production") {
       // configProd.plugins.push(new CleanWebpackPlugin());
        return configProd;
    }
   else{
        return configDev;
    }

};
