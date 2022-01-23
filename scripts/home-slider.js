let prevbutton = document.getElementsByClassName('slider-prev')[0]
let nextbutton = document.getElementsByClassName('slider-next')[0]
let images = document.getElementsByClassName('slider-item')
let index = 0
let image_length = images.length
let inanim = 'animate__fadeIn'
let outanim = 'animate__fadeOut'
let autoChangeInterval = setInterval(()=>{nextbutton.click()}, 4000)
prevbutton.addEventListener('click', () => 
{
    images[index].style.display = 'none'
    images[index].classList.remove(inanim)

    index --
    if (index < 0) index = image_length - 1

    images[index].style.display = 'block' 
    images[index].classList.add(inanim)
    clearInterval(autoChangeInterval)
    autoChangeInterval = setInterval(()=>{nextbutton.click()}, 4000)
})

nextbutton.addEventListener('click', () => 
{
    images[index].style.display = 'none'
    images[index].classList.remove(inanim)

    index ++
    if (index >= image_length) index = 0

    images[index].style.display = 'block'
    images[index].classList.add(inanim)
    clearInterval(autoChangeInterval)
    autoChangeInterval = setInterval(()=>{nextbutton.click()}, 4000)
})

