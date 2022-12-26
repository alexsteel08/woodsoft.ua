jQuery(document).ready(function($){
    $('.menu__icon').click(function(event) {
       $('.header__menu').toggleClass('open');
       $('body').toggleClass('_lock');
    });
});

jQuery(document).ready(function($){
    $('.filter_prod_img').click(function(event) {
        $('.filter_prod_filter').toggleClass('open');
    });
});
jQuery(document).ready(function($){
    $('.filter_prod_img').click(function(event) {
        $('.filter_prod_filter').toggleClass('open');
    });
});
jQuery(document).ready(function($){
    $('.second_content').click(function(event) {
        $('.tc-extra-product-options').toggleClass('open');
    });
    // $('.tmcp-field-wrap').click(function(event) {
    //     $('.tc-extra-product-options').removeClass('open');
    // });

});

jQuery(document).ready(function($){

});

jQuery(document).ready(function($){
    $('.wpcf7-intl-tel').on('input', function() {
        $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё-і]/, ''))
    });
});

jQuery(function($){
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        /*Если сделали скролл на 100px задаём новый класс для header*/
        if(height > 20){
            $('header').addClass('header_shadow');
        } else{
            /*Если меньше 100px удаляем класс для header*/
            $('header').removeClass('header_shadow');
        }
    });
});


// Dynamic Adapt v.1
// HTML data-da="where(uniq class name),position(digi),when(breakpoint)"
// e.x. data-da="item,2,992"

"use strict";

(function () {
    let originalPositions = [];
    let daElements = document.querySelectorAll('[data-da]');
    let daElementsArray = [];
    let daMatchMedia = [];
    //Заполняем массивы
    if (daElements.length > 0) {
        let number = 0;
        for (let index = 0; index < daElements.length; index++) {
            const daElement = daElements[index];
            const daMove = daElement.getAttribute('data-da');
            if (daMove != '') {
                const daArray = daMove.split(',');
                const daPlace = daArray[1] ? daArray[1].trim() : 'last';
                const daBreakpoint = daArray[2] ? daArray[2].trim() : '767';
                const daType = daArray[3] === 'min' ? daArray[3].trim() : 'max';
                const daDestination = document.querySelector('.' + daArray[0].trim())
                if (daArray.length > 0 && daDestination) {
                    daElement.setAttribute('data-da-index', number);
                    //Заполняем массив первоначальных позиций
                    originalPositions[number] = {
                        "parent": daElement.parentNode,
                        "index": indexInParent(daElement)
                    };
                    //Заполняем массив элементов
                    daElementsArray[number] = {
                        "element": daElement,
                        "destination": document.querySelector('.' + daArray[0].trim()),
                        "place": daPlace,
                        "breakpoint": daBreakpoint,
                        "type": daType
                    }
                    number++;
                }
            }
        }
        dynamicAdaptSort(daElementsArray);

        //Создаем события в точке брейкпоинта
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daBreakpoint = el.breakpoint;
            const daType = el.type;

            daMatchMedia.push(window.matchMedia("(" + daType + "-width: " + daBreakpoint + "px)"));
            daMatchMedia[index].addListener(dynamicAdapt);
        }
    }
    //Основная функция
    function dynamicAdapt(e) {
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daElement = el.element;
            const daDestination = el.destination;
            const daPlace = el.place;
            const daBreakpoint = el.breakpoint;
            const daClassname = "_dynamic_adapt_" + daBreakpoint;

            if (daMatchMedia[index].matches) {
                //Перебрасываем элементы
                if (!daElement.classList.contains(daClassname)) {
                    let actualIndex = indexOfElements(daDestination)[daPlace];
                    if (daPlace === 'first') {
                        actualIndex = indexOfElements(daDestination)[0];
                    } else if (daPlace === 'last') {
                        actualIndex = indexOfElements(daDestination)[indexOfElements(daDestination).length];
                    }
                    daDestination.insertBefore(daElement, daDestination.children[actualIndex]);
                    daElement.classList.add(daClassname);
                }
            } else {
                //Возвращаем на место
                if (daElement.classList.contains(daClassname)) {
                    dynamicAdaptBack(daElement);
                    daElement.classList.remove(daClassname);
                }
            }
        }
        customAdapt();
    }

    //Вызов основной функции
    dynamicAdapt();

    //Функция возврата на место
    function dynamicAdaptBack(el) {
        const daIndex = el.getAttribute('data-da-index');
        const originalPlace = originalPositions[daIndex];
        const parentPlace = originalPlace['parent'];
        const indexPlace = originalPlace['index'];
        const actualIndex = indexOfElements(parentPlace, true)[indexPlace];
        parentPlace.insertBefore(el, parentPlace.children[actualIndex]);
    }
    //Функция получения индекса внутри родителя
    function indexInParent(el) {
        var children = Array.prototype.slice.call(el.parentNode.children);
        return children.indexOf(el);
    }
    //Функция получения массива индексов элементов внутри родителя
    function indexOfElements(parent, back) {
        const children = parent.children;
        const childrenArray = [];
        for (let i = 0; i < children.length; i++) {
            const childrenElement = children[i];
            if (back) {
                childrenArray.push(i);
            } else {
                //Исключая перенесенный элемент
                if (childrenElement.getAttribute('data-da') == null) {
                    childrenArray.push(i);
                }
            }
        }
        return childrenArray;
    }
    //Сортировка объекта
    function dynamicAdaptSort(arr) {
        arr.sort(function (a, b) {
            if (a.breakpoint > b.breakpoint) { return -1 } else { return 1 }
        });
        arr.sort(function (a, b) {
            if (a.place > b.place) { return 1 } else { return -1 }
        });
    }
    //Дополнительные сценарии адаптации
    function customAdapt() {
        //const viewport_width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    }
}());


var page = 2;
jQuery(function($) {
    $('body').on('click', '.loadmore', function() {
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security
        };

        $.post(blog.ajaxurl, data, function(response) {
            if($.trim(response) != '') {
                $('.blog-posts').append(response);
                page++;
            } else {
                $('.loadmore').hide();
            }
        });
    });
});


jQuery(function($){
    $('#true_loadmore').click(function(){
        $(this).text('Loading ...');
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl,
            data:data,
            type:'POST',
            success:function(data){
                if( data ) {
                    $('#true_loadmore').text('OLDER POSTS').before(data);
                    current_page++;
                    if (current_page == max_pages) $("#true_loadmore").remove();
                } else {
                    $('#true_loadmore').remove();
                }
            }
        });
    });
});



jQuery(document).ready(function($){
    $(function(){
        var current = location.pathname;
        $('.blog_category_list ul li a').each(function(){
            var $this = $(this);
            // if the current path is like this link, make it active
            if($this.attr('href').indexOf(current) !== -1){
                $this.addClass('current');
            }
        })
    })
});


jQuery(document).ready(function($){
    $(function(){
        $(".wrapper .tab").click(function() {
            $(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
            $(".tab_item").hide().eq($(this).index()).fadeIn()
        }).eq(0).addClass("active");
    })
});


// jQuery(document).ready(function($){
//     $(function(){
//         $(document).resize(function () {
//             var screen = $(window);
//
//             if (screen.width < 600) {
//                 $('swiper').removeClass('.swiper1,.swiper-initialized,.swiper-horizontal,.swiper-pointer-events,.swiper-free-mode,.swiper-backface-hidden');
//             } else {
//                 $('swiper').addClass('.swiper1,.swiper-initialized,.swiper-horizontal,.swiper-pointer-events,.swiper-free-mode,.swiper-backface-hidden');
//             }
//
//     })
// });




jQuery(document).ready(function($){

    setShareLinks();

    function socialWindow(url) {
        var left = (screen.width -570) / 2;
        var top = (screen.height -570) / 2;
        var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;  window.open(url,"NewWindow",params);}

    function setShareLinks() {
        var pageUrl = encodeURIComponent(document.URL);
        var tweet = encodeURIComponent($("meta[property='og:description']").attr("content"));

        $(".share-social.facebook").on("click", function() { url="https://www.facebook.com/sharer.php?u=" + pageUrl;
            socialWindow(url);
        });

        $(".share-social.twitter").on("click", function() {
            url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + tweet;
            socialWindow(url);
        });

        $(".share-social.linkedin").on("click", function() {
            url = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
            socialWindow(url);
        })
    }


});


//
//
//
// jQuery(function($){
//     $(document).on('click', '.second_content', function (event) {
//
//     });
// });
//
// jQuery(document).ready(function($){
//
//         var $button = $('.tm-fb-value').clone();
//         $('.variable_content').html($button);
//
// });


//video

// jQuery(document).ready(function($){
//     $('.slick-slider').slick({
//         dots:true,
//
//
//     });
// });



jQuery(document).ready(function($){
    let div = document.createElement('div');
    div.className = 'close_variations';
    let text = document.createTextNode('');
    div.appendChild(text);
    document.getElementById('tm-extra-product-options').appendChild(div)
    $('.close_variations').click(function(event) {
        $('.tc-extra-product-options').removeClass('open');
    });
});

jQuery(document).ready(function($){
    $('.tc-label-wrap').click(function(){
        if($('#liberty_color > div > div > div > ul > li.tmcp-field-wrap.tmhexcolorimage-li-nowh.tc-mode-startimages').hasClass('tc-active')){
            $("body").find('#simple_color > div > div > div > ul > li.tmcp-field-wrap.tmhexcolorimage-li-nowh.tc-mode-startimages').removeClass('tc-active');
        }
        if($('#simple_color > div > div > div > ul > li.tmcp-field-wrap.tmhexcolorimage-li-nowh.tc-mode-startimages').hasClass('tc-active')){
            $("body").find('#liberty_color > div > div > div > ul > li.tmcp-field-wrap.tmhexcolorimage-li-nowh.tc-mode-startimages').removeClass('tc-active');
        }
    });
});



jQuery(document).ready(function($){
    $('.tc-label-wrap, .tm-epo-field-label').click(function(){
        if($('.tmcp-field-wrap.tmhexcolorimage-li-nowh.tc-mode-images').hasClass('tc-active')){
            $("body").find('.tmcp-field-wrap.tmhexcolorimage-li-nowh.tc-mode-images').removeClass('tc-active');
        }

    });
    $('.tc-label-wrap, .tm-epo-field-label').click(function(){
        if($('.tmcp-field-wrap.tmhexcolorimage-li-nowh.tc-mode-startimages').hasClass('tc-active')){
            $("body").find('.tmcp-field-wrap.tmhexcolorimage-li-nowh.tc-mode-startimages').removeClass('tc-active');
            $("body").find('.tm-epo-reset-radio').click();
        }

    });
    // $('.simple > .tc-section-inner-wrap > .tc-row > .tm-collapse .tm-section-label').click(function(){
    //     if($('.tc-cell.tc-col-auto.tc-epo-label.tm-section-label.tm-toggle.tcwidth-100').hasClass('toggle-header-closed')){
    //         $("body").find('.tc-cell.tc-col-auto.tc-epo-label.tm-section-label.tm-toggle.tcwidth-100').removeClass('toggle-header-open');
    //         // $("body").find('.tc-cell.tc-col-auto.tc-epo-label.tm-section-label.tm-toggle.tcwidth-100').addClass('toggle-header-closed');
    //         $("body").find('.tm-collapse-wrap').css("display", "none");
    //         $("body").find('.tm-collapse-wrap').removeClass('open');
    //         $("body").find('.tm-collapse-wrap').addClass('closed');
    //
    //
    //     } else if ($('.tc-cell.tc-col-auto.tc-epo-label.tm-section-label.tm-toggle.tcwidth-100').hasClass('toggle-header-open')){
    //         $("body").find('.tc-cell.tc-col-auto.tc-epo-label.tm-section-label.tm-toggle.tcwidth-100').removeClass('toggle-header-closed');
    //         // $("body").find('.tc-cell.tc-col-auto.tc-epo-label.tm-section-label.tm-toggle.tcwidth-100').addClass('toggle-header-closed');
    //         $("body").find('.tm-collapse-wrap').css("display", "block");
    //         $("body").find('.tm-collapse-wrap').addClass('open');
    //         $("body").find('.tm-collapse-wrap').removeClass('closed');
    //
    //
    //     }
    //
    //
    // });tm-epo-reset-radio
});
