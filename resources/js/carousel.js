const thumbs_ElementList = document.querySelectorAll('.thumb-img')
console.log(thumbs_ElementList);
const mainImg_Element =document.querySelector('.main-img')
console.log(mainImg_Element)
thumbs_ElementList.forEach(element => {
 element.addEventListener('click',getActive)
});

Object.keys(thumbs_ElementList).forEach(key => {
 console.log(key, thumbs_ElementList[key]);
});

function getActive(e){
console.log("ambacabanane")
console.log(e)
}
