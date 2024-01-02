window.addWheelListener = function (elem, callback, useCapture) {
    if (elem.addEventListener) {
        // 使用addEventListener()方法添加事件处理器
        elem.addEventListener("wheel", callback, useCapture);
    } else if (elem.attachEvent) {
        // 使用attachEvent()方法添加事件处理器（适用于IE浏览器）
        elem.attachEvent("onwheel", callback);
    }
};

var lightbox = {
    // 初始化函数
    init: function () {
        // 获取所有图片元素
        var images = document.getElementsByTagName("img");

        // 为每个图片添加点击事件
        for (var i = 0; i < images.length; i++) {
            images[i].addEventListener("click", function (e) {
                // 禁用默认行为
                e.preventDefault();

                // 创建遮罩层
                var overlay = document.getElementById("overlay");
                overlay.style.display = "block";

                // 创建弹出框
                var lightbox = document.getElementById("lightbox");
                lightbox.innerHTML = "<img src='" + this.getAttribute("src") + "'>";
                lightbox.style.display = "block";
                var img = lightbox.getElementsByTagName("img")[0];
                var scale = 1;
                if ("ontouchstart" in window) {
                    // 在移动设备上使用触摸事件

                    var lastDistance = null;
                    lightbox.addEventListener("touchmove", function (e) {
                        // 阻止页面滚动
                        e.preventDefault();

                        if (e.touches.length == 2) {
                            // 计算两个手指之间的距离
                            var distance = Math.sqrt(Math.pow(e.touches[0].pageX - e.touches[1].pageX, 2) + Math.pow(e.touches[0].pageY - e.touches[1].pageY, 2));

                            if (lastDistance !== null) {
                                // 计算缩放比例
                                var delta = distance - lastDistance;
                                scale += delta * 0.01;
                                scale = Math.max(0.5, Math.min(3, scale));

                                // 设置图片的缩放样式
                                img.style.transform = "scale(" + scale + ")";
                            }

                            // 保存上一次的距离
                            lastDistance = distance;
                        }
                    });

                    lightbox.addEventListener("touchend", function (e) {
                        lastDistance = null;
                    });
                } else {
                    // 在电脑上使用滚轮事件

                    addWheelListener(lightbox, function (e) {
                        // 阻止页面滚动
                        e.preventDefault();

                        // 计算缩放比例，并限制在0.5到3之间
                        var delta = Math.max(-1, Math.min(1, e.deltaY));
                        scale += delta * 0.1;
                        scale = Math.max(0.5, Math.min(3, scale));

                        // 设置图片的缩放样式
                        img.style.transform = "scale(" + scale + ")";
                    });
                }
            });
        }

        // 为遮罩层添加点击事件
        var overlay = document.getElementById("overlay");
        overlay.addEventListener("click", function (e) {
            // 关闭灯箱
            lightbox.close();
        });
    },

    // 关闭函数
    close: function () {
        var overlay = document.getElementById("overlay");
        var lightbox = document.getElementById("lightbox");
        overlay.style.display = "none";
        lightbox.style.display = "none";
        lightbox.innerHTML = "";
    }
};

// 初始化灯箱
lightbox.init();