/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ (function(module, exports) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
  Copyright (c) 2018 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString === Object.prototype.toString) {
					for (var key in arg) {
						if (hasOwn.call(arg, key) && arg[key]) {
							classes.push(key);
						}
					}
				} else {
					classes.push(arg.toString());
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./assets/css/blocks.scss":
/*!********************************!*\
  !*** ./assets/css/blocks.scss ***!
  \********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

"use strict";
module.exports = window["wp"]["element"];

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/extends.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/extends.js ***!
  \************************************************************/
/***/ (function(__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ _extends; }
/* harmony export */ });
function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!*****************************!*\
  !*** ./assets/js/blocks.js ***!
  \*****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _css_blocks_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../css/blocks.scss */ "./assets/css/blocks.scss");


const {
  registerBlockType
} = wp.blocks;
const {
  apiFetch
} = wp;
const {
  useState,
  useEffect
} = wp.element;
const {
  date
} = wp.date;
const {
  useSelect
} = wp.data;

const {
  InspectorControls,
  useBlockProps
} = wp.blockEditor;
const {
  PanelBody,
  SelectControl,
  RangeControl,
  ColorPicker,
  Spinner
} = wp.components;

registerBlockType("events/all-events", {
  apiVersion: 2,
  title: "Все События",
  category: "common",
  supports: {},
  attributes: {
    quantity: {
      type: "number",
      default: 6
    },
    borderRadius: {
      type: "string"
    },
    borderWeight: {
      type: "string"
    },
    borderColor: {
      type: "string"
    }
  },
  edit: props => {
    console.log(props);
    const {
      attributes: {
        quantity,
        borderRadius,
        borderWeight,
        borderColor
      },
      setAttributes
    } = props;
    const blockProps = useBlockProps({
      className: classnames__WEBPACK_IMPORTED_MODULE_2___default()("events-posts-block", "entries", "clr")
    });
    let results = null; // const [events, setEvents] = useState([]);
    // useEffect(() => {
    //   apiFetch({path: "maverick/v1/events"}).then((events) => {
    //     console.log(events);
    //     setEvents(events);
    //   });
    // }, [quantity]);
    // console.log(events);

    const events = useSelect(select => {
      return select("core").getEntityRecords("postType", "events", {
        per_page: quantity
      });
    }, [quantity]);
    console.log(events);
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(PanelBody, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(SelectControl, {
      label: "\u041A\u043E\u043B-\u0432\u043E \u043D\u0430 \u0441\u0442\u0440\u0430\u043D\u0438\u0446\u0443",
      value: quantity,
      options: [{
        label: "1",
        value: 1
      }, {
        label: "2",
        value: 2
      }, {
        label: "3",
        value: 3
      }, {
        label: "6",
        value: 6
      }],
      onChange: val => setAttributes({
        quantity: val
      })
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(PanelBody, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(RangeControl, {
      label: "\u0420\u0430\u0434\u0438\u0443\u0441 \u0433\u0440\u0430\u043D\u0438\u0446\u044B",
      value: borderRadius,
      min: "0",
      max: "50",
      onChange: val => setAttributes({
        borderRadius: val
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(RangeControl, {
      label: "\u0428\u0438\u0440\u0438\u043D\u0430 \u0433\u0440\u0430\u043D\u0438\u0446\u044B",
      value: borderWeight,
      min: "0",
      max: "6",
      onChange: val => setAttributes({
        borderWeight: val
      })
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(PanelBody, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(ColorPicker, {
      color: borderColor,
      onChangeComplete: color => {
        let colorString;

        if ("undefined" === typeof color.rgb || 1 === color.rgb.a) {
          colorString = color.hex;
        } else {
          const {
            r,
            g,
            b,
            a
          } = color.rgb;
          colorString = `rgba(${r}, ${g}, ${b}, ${a})`;
        }

        setAttributes({
          borderColor: colorString || ""
        });
      },
      disableAlpha: true
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, blockProps, {
      id: "blog-entries"
    }), events ? events.map(event => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("article", {
      className: "large-entry blog-entry clr"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", {
      className: "blog-entry-inner clr"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", {
      className: "thumbnail"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("a", {
      href: event.link
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("img", {
      src: event.events_featured_image,
      alt: ""
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("header", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("h2", {
      className: "blog-entry-header"
    }, event.title.rendered)), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("ul", {
      className: "meta obem-default clr"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("li", {
      className: "meta-author"
    }, event.author_name), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("li", {
      className: "meta-date"
    }, date("j F, Y", event.date)), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("li", {
      className: "meta-cat"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("a", {
      href: event.events_cat_obj[0].link
    }, event.events_cat_obj[0].name))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", {
      className: "blog-entry-summary"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", {
      className: "events_extra-cols"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("p", {
      className: "date-event",
      style: {
        borderRadius: `${borderRadius}px`,
        borderWidth: `${borderWeight}px`,
        borderStyle: "solid",
        borderColor: borderColor
      }
    }, date("j F", event.acf.date_event)), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("p", {
      className: "location-event"
    }, event.acf.location_event)), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("p", {
      dangerouslySetInnerHTML: {
        __html: event.content.rendered
      }
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", {
      className: "blog-entry-readmore"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("a", {
      href: event.link
    }, "\u041F\u0440\u043E\u0434\u043E\u043B\u0436\u0438\u0442\u044C \u0447\u0442\u0435\u043D\u0438\u0435"))))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(Spinner, null)));
  },
  save: () => {
    return null;
  }
});
}();
/******/ })()
;
//# sourceMappingURL=blocks.js.map