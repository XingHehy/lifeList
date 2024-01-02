window.addEventListener('scroll', function () {
    var btnTop = document.querySelector('.btn-top');
    if (window.pageYOffset > 95) {
        btnTop.style.display = 'block';
    } else {
        btnTop.style.display = 'none';
    }
});

document.querySelector('.btn-top').addEventListener('click', function () {
    window.scrollTo({top: 0, behavior: 'smooth'});
});


window.addEventListener('DOMContentLoaded', function () {
    var lazyImages = [].slice.call(document.querySelectorAll('img[data-src]'));

    if ('IntersectionObserver' in window) {
        var lazyImageObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var lazyImage = entry.target;
                    lazyImage.src = lazyImage.dataset.src;
                    lazyImage.classList.remove('lazy');
                    lazyImageObserver.unobserve(lazyImage);
                }
            });
        });

        lazyImages.forEach(function (lazyImage) {
            lazyImageObserver.observe(lazyImage);
        });
    } else {
        // 如果不支持 IntersectionObserver，则立即加载所有图片
        lazyImages.forEach(function (lazyImage) {
            lazyImage.src = lazyImage.dataset.src;
            lazyImage.classList.remove('lazy');
        });
    }
});


//获取所有ol元素
var olItems = document.querySelectorAll('ol');

//随机排序函数
var random = function () {
    return Math.random() > 0.5 ? -1 : 1;
}

for (var i = 0; i < olItems.length; i++) {
    var liItems = olItems[i].querySelectorAll('li'); //获取当前ol中的li元素

    var liArr = new Array(); //用来存放li元素的数组

    for (var j = 0; j < liItems.length; j++) {
        liArr.push(liItems[j]); //将li元素存入li数组
    }

    liArr.sort(random); //打乱li元素数组排列顺序

    for (var k = 0; k < liArr.length; k++) {
        olItems[i].appendChild(liArr[k]); //将打乱后的li元素重新插入到ol中
    }
}


function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}


function openSubTab(evt, subTabName) {
    var i, subtabcontent, subtablinks, tabcontent;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    subtabcontent = document.getElementsByClassName("subtabcontent");
    for (i = 0; i < subtabcontent.length; i++) {
        subtabcontent[i].style.display = "none";
    }
    subtablinks = document.getElementsByClassName("subtablinks");
    for (i = 0; i < subtablinks.length; i++) {
        subtablinks[i].className = subtablinks[i].className.replace(" active", "");
    }

    // 新增的代码
    var parentTabLink = evt.currentTarget.parentElement.parentElement;
    parentTabLink.className += " active";

    document.getElementById(subTabName).style.display = "block";
    evt.currentTarget.className += " active";
}


