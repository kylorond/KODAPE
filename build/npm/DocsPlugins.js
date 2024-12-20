const Plugins = [
  {
    from: 'dist/css/',
    to  : 'docs/assets/css/'
  },
  {
    from: 'dist/js/',
    to  : 'docs/assets/js/'
  },
  {
    from: 'node_modules/jquery/dist/',
    to  : 'docs/assets/plugins/jquery/'
  },
  {
    from: 'node_modules/popper.js/dist/',
    to  : 'docs/assets/plugins/popper/'
  },
  {
    from: 'node_modules/bootstrap/dist/js/',
    to  : 'docs/assets/plugins/bootstrap/js/'
  },
  {
    from: 'node_modules/@fortawesome/fontawesome-free/css/',
    to  : 'docs/assets/plugins/fontawesome-free/css/'
  },
  {
    from: 'node_modules/@fortawesome/fontawesome-free/webfonts/',
    to  : 'docs/assets/plugins/fontawesome-free/webfonts/'
  },
  {
    from: 'node_modules/overlayscrollbars/js/',
    to  : 'docs/assets/plugins/overlayScrollbars/js/'
  },
  {
    from: 'node_modules/overlayscrollbars/css/',
    to  : 'docs/assets/plugins/overlayScrollbars/css/'
  }
]

module.exports = Plugins
