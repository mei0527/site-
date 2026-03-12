'use strict';

$(document).ready(function(){

    //ナビゲーションの開閉
    $('#open-nav').on('click',function(){
        $('#nav').toggleClass('show');
    });/* $('#open_nav').on */
    $('#mask').on('click',function(){
        console.log('click');
        $('#nav').removeClass('show');
        });/* $('#open_nav').on */


        
    //矢印でTOPにもどる

    $('#page-top').on('click',function(){
        $('html,body').animate({scrollTop:0},1000);
    });



    // 矢印の表示
    $('#page-top').hide();
    $(window).on('scroll',function(){
        if($(window).scrollTop()>0){
            
            
            $('#page-top').fadeIn(100);
        }else{
            $('#page-top').fadeOut(100);
        }
    });

    //下からスライドイン
    const winH=$(window).height();
    $(window).on('scroll',function(){
        const scr=$(window).scrollTop();
        $('.item').each(function(){
            const pos=$(this).offset().top;
            if (scr>pos-winH+50) {
                $(this).addClass('fadein');
            }else{
                $(this).removeClass('fadein');
            }//else
        });
    });


 });/* $(document).ready */