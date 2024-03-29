/*! dgtUIkit 3.1.7 | http://www.getuikit.com | (c) 2014 - 2019 YOOtheme | MIT License */

(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('uikit-util')) :
    typeof define === 'function' && define.amd ? define('uikitnotification', ['uikit-util'], factory) :
    (global = global || self, global.dgtUIkitNotification = factory(global.dgtUIkit.util));
}(this, function (uikitUtil) { 'use strict';

    var obj;

    var containers = {};

    var Component = {

        functional: true,

        args: ['message', 'status'],

        data: {
            message: '',
            status: '',
            timeout: 5000,
            group: null,
            pos: 'top-center',
            clsClose: 'dgt-notification-close',
            clsMsg: 'dgt-notification-message'
        },

        install: install,

        computed: {

            marginProp: function(ref) {
                var pos = ref.pos;

                return ("margin" + (uikitUtil.startsWith(pos, 'top') ? 'Top' : 'Bottom'));
            },

            startProps: function() {
                var obj;

                return ( obj = {opacity: 0}, obj[this.marginProp] = -this.$el.offsetHeight, obj );
            }

        },

        created: function() {

            if (!containers[this.pos]) {
                containers[this.pos] = uikitUtil.append(this.$container, ("<div class=\"dgt-notification dgt-notification-" + (this.pos) + "\"></div>"));
            }

            var container = uikitUtil.css(containers[this.pos], 'display', 'block');

            this.$mount(uikitUtil.append(container,
                ("<div class=\"" + (this.clsMsg) + (this.status ? (" " + (this.clsMsg) + "-" + (this.status)) : '') + "\"> <a href=\"#\" class=\"" + (this.clsClose) + "\" data-dgt-close></a> <div>" + (this.message) + "</div> </div>")
            ));

        },

        connected: function() {
            var this$1 = this;
            var obj;


            var margin = uikitUtil.toFloat(uikitUtil.css(this.$el, this.marginProp));
            uikitUtil.Transition.start(
                uikitUtil.css(this.$el, this.startProps),
                ( obj = {opacity: 1}, obj[this.marginProp] = margin, obj )
            ).then(function () {
                if (this$1.timeout) {
                    this$1.timer = setTimeout(this$1.close, this$1.timeout);
                }
            });

        },

        events: ( obj = {

            click: function(e) {
                if (uikitUtil.closest(e.target, 'a[href="#"],a[href=""]')) {
                    e.preventDefault();
                }
                this.close();
            }

        }, obj[uikitUtil.pointerEnter] = function () {
                if (this.timer) {
                    clearTimeout(this.timer);
                }
            }, obj[uikitUtil.pointerLeave] = function () {
                if (this.timeout) {
                    this.timer = setTimeout(this.close, this.timeout);
                }
            }, obj ),

        methods: {

            close: function(immediate) {
                var this$1 = this;


                var removeFn = function () {

                    uikitUtil.trigger(this$1.$el, 'close', [this$1]);
                    uikitUtil.remove(this$1.$el);

                    if (!containers[this$1.pos].children.length) {
                        uikitUtil.css(containers[this$1.pos], 'display', 'none');
                    }

                };

                if (this.timer) {
                    clearTimeout(this.timer);
                }

                if (immediate) {
                    removeFn();
                } else {
                    uikitUtil.Transition.start(this.$el, this.startProps).then(removeFn);
                }
            }

        }

    };

    function install(dgtUIkit) {
        dgtUIkit.notification.closeAll = function (group, immediate) {
            uikitUtil.apply(document.body, function (el) {
                var notification = dgtUIkit.getComponent(el, 'notification');
                if (notification && (!group || group === notification.group)) {
                    notification.close(immediate);
                }
            });
        };
    }

    /* global dgtUIkit, 'notification' */

    if (typeof window !== 'undefined' && window.dgtUIkit) {
        window.dgtUIkit.component('notification', Component);
    }

    return Component;

}));
