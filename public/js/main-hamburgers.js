
$(".hamburger").on('click',function(){
    this.classList.toggle("is-active");
    if($(this).hasClass("is-active")==true){
        $('body').css('overflow','hidden');
        $('.modal-menu').addClass('active');
    }else{
        $('.modal-menu').removeClass('active');
        $('body').css('overflow','auto');
    }
})
