const path = require('path')

module.exports = {
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            '@': path.resolve('resources/js'),
            '~': path.resolve('node_modules')
        }
    }
}
