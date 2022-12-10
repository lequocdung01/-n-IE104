var imgPosition =document.querySelectorAll('.aspect-ratio-169 img');
var imgContainer =document.querySelector('.aspect-ratio-169');
var dotItem=document.querySelectorAll(".dot");
let imgNuber = imgPosition.length;
let index = 0;

//console.log(imgPossition)
imgPosition.forEach(function(image,index){
    image.style.left = index*100 +"%"
    dotItem[index].addEventListener("click",function(){
        Slider(index)
    })
})
function imgSlider (){
    {
        index++;
        //console.log(index)
        if(index>=imgNuber) {index=0}
        Slider(index)
    }
}
function Slider(index){
    imgContainer.style.left = "-" +index*100+ "%"
    const dotActive=document.querySelector('.active'    )
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active")
}
setInterval(imgSlider,2000)
const header=document.querySelector('header')
window.addEventListener("scroll",function(){
    x=this.window.pageYOffset
    if(x>0)
    {
        header.classList.add("sticky")
    }
    else{
        header.classList.remove("sticky")
    }
});
//-------------------------------------MENU SLIDER-CARTEGORY---------------------------------------//
//------------------------------------Đổi ảnh------------------------------------------//
const butTon = document.querySelector(".product-content-right-product-bottom-top")
if(butTon){
    butTon.addEventListener("click",function(){
        document.querySelector("product-content-right-product-bottom-content-big").classList.toggle("activeB")
    })
}

const bigImg =document.querySelector(".product-content-left-big-img img")
const smallImg = document.querySelectorAll(".product-content-left-small-img img")
smallImg.forEach(function(imgItem,X){
    imgItem.addEventListener("click",function(){
        bigImg.src=imgItem.src
    })
})