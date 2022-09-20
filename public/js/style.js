

var header = document.getElementById('header');
var nav = document.getElementById('navbarDesktop');
var navMobile = document.getElementById('navMobile');
var search = document.getElementById('search');
var autocomplete = document.getElementById('autocomplete');
var mobileProduct=document.getElementById('mobile-product');
var firstProductItem=document.getElementById('product-item1');
var endProductItem=document.getElementById('product-item5');
//mobileProduct?.addEventListener('touchstart',handleDragStart,false)
//mobileProduct?.addEventListener('touchmove',handleDragEnter,false)
//mobileProduct?.addEventListener('touchend',handleDragEnd,false)
var xDown;
function handleDragStart(e){
  //  var crt = this.cloneNode(true);
  //  e.dataTransfer.setDragImage(crt, 0, 0);

   xDown=e.touches[0].clientX;

}
var moveValue=0;
function checkValueDragProductItem(){
    if(firstProductItem.getBoundingClientRect().left>15||(15>endProductItem.getBoundingClientRect().right)){

        return false;
    }
    else return true;
}
function handleDragEnter(e){

    if(checkValueDragProductItem()){
        var xUp=e.touches[0].clientX;
        if(xUp>xDown){
            $('.product-item-mobile').css('transform',`translate(${xUp-xDown+moveValue}px,0)`)
        }
        else{

            $('.product-item-mobile').css('transform',`translate(${xUp-xDown+moveValue}px,0)`)

        }
    }
}
function handleDragEnd(e){

    if(firstProductItem.getBoundingClientRect().left>15){

        $('.product-item-mobile').css('transform',`translate(0px,0)`)
        moveValue=0;
        return
    }
    if(document.body.clientWidth-15>endProductItem.getBoundingClientRect().right){

        moveValue=-(1115-(document.body.clientWidth));
        $('.product-item-mobile').css('transform',`translate(${moveValue}px,0)`)

        return
    }

        moveValue=moveValue+e.changedTouches[0].clientX-xDown;

}
$(document).on('click', function (event) {
    if (!$(event.target).closest('#autocomplete').length) {
        $('.autocomplete').hide()
    }
  });

window.addEventListener('scroll', function () {

    let positionNav = nav?.offsetTop + header?.getBoundingClientRect().top;

    if (positionNav < 0) {
        $('#navbarDesktop').addClass('navFixed')
        $('#navMobile').addClass('navFixed')
    }
    else {
        $('#navbarDesktop').removeClass('navFixed')
        $('#navMobile').removeClass('navFixed')
    }
})
function showMenuMobile() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


