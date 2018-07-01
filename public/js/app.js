/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2016 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(document, window, $) {
  'use strict';

  window.App = Site.extend({
    handleSlidePanel: function() {
      if (typeof $.slidePanel === 'undefined') return;

      var defaults = $.components.getDefaults("slidePanel");
      var options = $.extend({}, defaults, {
        template: function(options) {
          return '<div class="' + options.classes.base + ' ' + options.classes.base + '-' + options.direction + '">' +
            '<div class="' + options.classes.base + '-scrollable"><div>' +
            '<div class="' + options.classes.content + '"></div>' +
            '</div></div>' +
            '<div class="' + options.classes.base + '-handler"></div>' +
            '</div>';
        },
        afterLoad: function() {
          this.$panel.find('.' + this.options.classes.base + '-scrollable').asScrollable({
            namespace: 'scrollable',
            contentSelector: '>',
            containerSelector: '>'
          });
        }
      });

      $(document).on('click', '[data-toggle=slidePanel]', function(e) {
        $.slidePanel.show({
          url: $(this).data('url'),
          settings: {
            cache: false
          }
        }, options);

        e.stopPropagation();
      });
    },
    handleMultiSelect: function() {
      var $all = $('.select-all');

      $(document).on('change', '.multi-select', function(e, isSelectAll) {
        if (isSelectAll) return;

        var $select = $('.multi-select'),
          total = $select.length,
          checked = $select.find('input:checked').length;
        if (total === checked) {
          $all.find('input').prop('checked', true);
        } else {
          $all.find('input').prop('checked', false);
        }
      });

      $all.on('change', function() {
        var checked = $(this).find('input').prop('checked');

        $('.multi-select input').each(function() {
          $(this).prop('checked', checked).trigger('change', [true]);
        });

      });
    },

    handleListActions: function() {
      $(document).on('click', '[data-toggle="list-editable"]', function() {
        var $btn = $(this),
          $list = $btn.parents('.list-group-item'),
          $content = $list.find('.list-content'),
          $editable = $list.find('.list-editable');

        $content.hide();
        $editable.show();
        $editable.find('input:first-child').focus().select();
      });

      $(document).on('keydown', '.list-editable [data-bind]', function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);

        if (keycode == 13 || keycode == 27) {
          var $input = $(this),
            bind = $input.data('bind'),
            $list = $input.parents('.list-group-item'),
            $content = $list.find('.list-content'),
            $editable = $list.find('.list-editable'),
            $update = bind ? $list.find(bind) : $list.find('.list-text');

          if (keycode == 13) {
            $update.html($input.val());
          } else {
            $input.val($update.text());
          }

          $content.show();
          $editable.hide();
        }
      });

      $(document).on('click', '[data-toggle="list-editable-close"]', function() {
        var $btn = $(this),
          $list = $btn.parents('.list-group-item'),
          $content = $list.find('.list-content'),
          $editable = $list.find('.list-editable');

        $content.show();
        $editable.hide();
      });
    },

    run: function(next) {
      this.handleSlidePanel();
      this.handleListActions();
      next();
    }
<<<<<<< HEAD
});

/***/ }),
/* 42 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "container" }, [
      _c("div", { staticClass: "row justify-content-center" }, [
        _c("div", { staticClass: "col-md-8" }, [
          _c("div", { staticClass: "card card-default" }, [
            _c("div", { staticClass: "card-header" }, [
              _vm._v("Example Component")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "card-body" }, [
              _vm._v(
                "\n                    I'm an example component.\n                "
              )
            ])
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-0ca92eac", module.exports)
  }
}

/***/ }),
/* 43 */
/***/ (function(module, exports) {

throw new Error("Module build failed: ModuleBuildError: Module build failed: Error: Missing binding C:\\xampp\\htdocs\\AlFalah\\node_modules\\node-sass\\vendor\\win32-x64-64\\binding.node\nNode Sass could not find a binding for your current environment: Windows 64-bit with Node.js 10.x\n\nFound bindings for the following environments:\n  - Windows 64-bit with Node.js 8.x\n\nThis usually happens because your environment has changed since running `npm install`.\nRun `npm rebuild node-sass --force` to build the binding for your current environment.\n    at module.exports (C:\\xampp\\htdocs\\AlFalah\\node_modules\\node-sass\\lib\\binding.js:15:13)\n    at Object.<anonymous> (C:\\xampp\\htdocs\\AlFalah\\node_modules\\node-sass\\lib\\index.js:14:35)\n    at Module._compile (internal/modules/cjs/loader.js:678:30)\n    at Object.Module._extensions..js (internal/modules/cjs/loader.js:689:10)\n    at Module.load (internal/modules/cjs/loader.js:589:32)\n    at tryModuleLoad (internal/modules/cjs/loader.js:528:12)\n    at Function.Module._load (internal/modules/cjs/loader.js:520:3)\n    at Module.require (internal/modules/cjs/loader.js:626:17)\n    at require (internal/modules/cjs/helpers.js:20:18)\n    at Object.<anonymous> (C:\\xampp\\htdocs\\AlFalah\\node_modules\\sass-loader\\lib\\loader.js:3:14)\n    at Module._compile (internal/modules/cjs/loader.js:678:30)\n    at Object.Module._extensions..js (internal/modules/cjs/loader.js:689:10)\n    at Module.load (internal/modules/cjs/loader.js:589:32)\n    at tryModuleLoad (internal/modules/cjs/loader.js:528:12)\n    at Function.Module._load (internal/modules/cjs/loader.js:520:3)\n    at Module.require (internal/modules/cjs/loader.js:626:17)\n    at require (internal/modules/cjs/helpers.js:20:18)\n    at loadLoader (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\loadLoader.js:13:17)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at runLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\NormalModule.js:195:19)\n    at C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:364:11\n    at C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:170:18\n    at loadLoader (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\loadLoader.js:27:11)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at runLoaders (C:\\xampp\\htdocs\\AlFalah\\node_modules\\loader-runner\\lib\\LoaderRunner.js:362:2)\n    at NormalModule.doBuild (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\NormalModule.js:182:3)\n    at NormalModule.build (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\NormalModule.js:275:15)\n    at Compilation.buildModule (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\Compilation.js:157:10)\n    at moduleFactory.create (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\Compilation.js:460:10)\n    at factory (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\NormalModuleFactory.js:243:5)\n    at applyPluginsAsyncWaterfall (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\NormalModuleFactory.js:94:13)\n    at C:\\xampp\\htdocs\\AlFalah\\node_modules\\tapable\\lib\\Tapable.js:268:11\n    at NormalModuleFactory.params.normalModuleFactory.plugin (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\CompatibilityPlugin.js:52:5)\n    at NormalModuleFactory.applyPluginsAsyncWaterfall (C:\\xampp\\htdocs\\AlFalah\\node_modules\\tapable\\lib\\Tapable.js:272:13)\n    at resolver (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\NormalModuleFactory.js:69:10)\n    at process.nextTick (C:\\xampp\\htdocs\\AlFalah\\node_modules\\webpack\\lib\\NormalModuleFactory.js:196:7)\n    at process._tickCallback (internal/process/next_tick.js:61:11)");

/***/ })
/******/ ]);
=======
  });
})(document, window, jQuery);
>>>>>>> dashboard-test
