const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
const path = require("path");
const CompressionPlugin = require("compression-webpack-plugin");
const JavaScriptObfuscator = require('webpack-obfuscator');
//获取决定路径
function resolve(dir) {
    return path.join(__dirname, dir);
}

const env = process.env.NODE_ENV;
var plugins = [
    new CompressionPlugin({
        algorithm: 'gzip', //'brotliCompress'
        test: /\.js$|\.html$|\.css/, // + $|\.svg$|\.png$|\.jpg
        threshold: 10240, //对超过10k的数据压缩
        deleteOriginalAssets: false, //不删除原⽂件
        minRatio: 0.8
    }),
];
const isObfuscator = false
if (env === 'production' && isObfuscator === true) {
    plugins.push(
        new JavaScriptObfuscator({
            rotateUnicodeArray: true, // 必须为true
            compact: true, // 紧凑 从输出混淆代码中删除换⾏符。
            controlFlowFlattening: false, // 此选项极⼤地影响了运⾏速度降低1.5倍的性能。 启⽤代码控制流展平。控制流扁平化是源代码的结构转换，阻碍了程理解。
            controlFlowFlatteningThreshold: 0.8,
            deadCodeInjection: true, // 此选项⼤⼤增加了混淆代码的⼤⼩（最多200％） 此功能将随机的死代码块（即：不会执⾏的代码）添加到混淆输出中，从⽽使得更难以进⾏反向⼯程设计。
            deadCodeInjectionThreshold: 0.5,
            debugProtection: true, // 调试保护  如果您打开开发者⼯具，可以冻结您的浏览器。
            debugProtectionInterval: true, // 如果选中，则会在“控制台”选项卡上使⽤间隔强制调试模式，这使得使⽤“开发⼈员⼯具”的其他功能变得更加困难。它是如何⼯作的？⼀个调⽤调试器的特殊代码;在整个混淆的源代码中反复插⼊。
            disableConsoleOutput: true, // 通过⽤空函数替换它们来禁⽤console.log，console.info，console.error和console.warn。这使得调试器的使⽤更加困难。
            domainLock: [], // 锁定混淆的源代码，使其仅在特定域和/或⼦域上运⾏。这使得有⼈只需复制并粘贴源代码并在别处运⾏就变得⾮常困难。多个域和⼦域可以将代码锁定到多个域或⼦域。例如，要锁定它以使代码仅在www.example.com上运⾏添加www.example.com，以使其在example.com的任何⼦域上运⾏，请使⽤.example.com。
            identifierNamesGenerator: 'hexadecimal',  //  使⽤此选项可控制标识符（变量名称，函数名称等）的混淆⽅式。
            identifiersPrefix: '', // 此选项使所有全局标识符都具有特定前缀。
            inputFileName: '',
            log: false,
            renameGlobals: false, // 不要启动 通过声明启⽤全局变量和函数名称的混淆。
            reservedNames: [], // 禁⽤模糊处理和⽣成标识符，这些标识符与传递的RegExp模式匹配。例如，如果添加^  someName，则混淆器将确保以someName开头的所有变量，函数名和函数参数都不会被破坏。
            reservedStrings: [], // 禁⽤字符串⽂字的转换，字符串⽂字与传递的RegExp模式匹配。例如，如果添加^ some * string，则混淆器将确保以某些字符串开头的所有字符串都不会移动到`stringArray`。
            rotateStringArray: true, //
            seed: 0, // 默认情况下（seed = 0），每次混淆代码时都会得到⼀个新结果（即：不同的变量名，插⼊stringArray的不同变量等）。如果需要可重复的结果，请将种⼦设置为特定的整数。
            selfDefending: false, // 此选项使输出代码能够抵抗格式化和变量重命名。如果试图在混淆代码上使⽤JavaScript美化器，代码将不再起作⽤，使得理解和修改它变得更加困难。需要紧凑代码设置。
            sourceMap: false, // 请确保不要上传嵌⼊了内嵌源代码的混淆源代码，因为它包含原始源代码。源映射可以帮助您调试混淆的Java Script源代码。如果您希望或需要在⽣产中进⾏调试，可以将单独的源映射⽂件上载到秘密位置，然后将浏览器指向该位置。
            sourceMapBaseUrl: '', // 这会将源的源映射嵌⼊到混淆代码的结果中。如果您只想在计算机上进⾏本地调试，则⾮常有⽤。
            sourceMapFileName: '',
            sourceMapMode: 'separate',
            stringArray: true, // 将stringArray数组移位固定和随机（在代码混淆时⽣成）的位置。这使得将删除的字符串的顺序与其原始位置相匹配变得更加困难。如果原始源代码不⼩，建议使⽤此选项，因为辅助函数可以引起注意。
            stringArrayEncoding: ['none'], // 此选项可能会略微降低脚本速度。使⽤Base64或RC4对stringArray的所有字符串⽂字进⾏编码，并插⼊⼀个特殊的函数，⽤于在运⾏时将其解码回来。
            stringArrayThreshold: 0.8, // 您可以使⽤此设置调整字符串⽂字将插⼊stringArray的概率（从0到1）。此设置在⼤型代码库中很有⽤，因为对stringArray函数的重复调⽤会降低代码的速度。
            target: 'browser', // 您可以将混淆代码的⽬标环境设置为以下之⼀： Browser 、Browser No Eval 、Node ⽬前浏览器和节点的输出是相同的。
            transformObjectKeys: false, // 转换（混淆）对象键。例如，此代码var a = {enabled：true};使⽤此选项进⾏模糊处理时，将隐藏已启⽤的对象键：var a = {};a [_0x2ae0 [（'0x0'）] = true;。 理想情况下与String Array设置⼀起使⽤。
            unicodeEscapeSequence: true, // 将所有字符串转换为其unicode表⽰形式。例如，字符串“Hello World！”将被转换为“'\ x48 \ x65 \ x6c \ x6c \ x6f \ x2 0 \ x57 \ x6f \ x72 \ x6c \ x64 \ x21”。
        })
    );
}

mix.js('resources/app.js', 'public/js').vue()
    .postCss('resources/app.css', 'public/css', [
        require("autoprefixer")({
            // 配置使用 autoprefixer
            overrideBrowserslist: ["last 15 versions"]
        }),
        require("postcss-pxtorem")({
            rootValue: 16, // 换算的基数
            // 忽略转换正则匹配项。插件会转化所有的样式的px。比如引入了三方UI，也会被转化。目前我使用 selectorBlackList字段，来过滤
            //如果个别地方不想转化px。可以简单的使用大写的 PX 或 Px 。
            selectorBlackList: ["ig"],
            propList: ["*"],
            exclude: /node_modules/
        })
    ]).webpackConfig({
    resolve: {
        alias: {
            '@': resolve('/resources'),
            '@Components': resolve('/resources/components'),
            '@Assets': resolve('/resources/assets'),
            '@Views': resolve('/resources/views')
        }
    },
    plugins: plugins
});
