var homeClick = document.querySelector(".list-item-home"),
    serClick = document.querySelector(".list-item-ser"),
    contClick = document.querySelector(".list-item-cont");
    

homeClick.onclick = homecuurent;
serClick.onclick = sercuurent;
contClick.onclick = contcuurent;
//window.scrollTo(0,0);


//home function
    function homecuurent(){
        if(homeClick.classList.contains("current")){
            homeClick.classList.add("current")
            serClick.classList.remove("current")
            contClick.classList.remove("current")
            window.scrollTo(0,0);
        }else{
            homeClick.classList.add("current")
            serClick.classList.remove("current")
            contClick.classList.remove("current")
            window.scrollTo(0,0);
        }
    }
//ser function
function sercuurent(){
    if(serClick.classList.contains("current")){
        serClick.classList.add("current")
        homeClick.classList.remove("current")
        contClick.classList.remove("current")
        window.scrollTo(0,600);
    }else{
        serClick.classList.add("current")
        homeClick.classList.remove("current")
        contClick.classList.remove("current")
        window.scrollTo(0,600);
    }
}
//cont function
function contcuurent(){
    if(contClick.classList.contains("current")){
        contClick.classList.add("current")
        homeClick.classList.remove("current")
        serClick.classList.remove("current")
        window.scrollTo(0,20000);

    }else{
        contClick.classList.add("current")
        homeClick.classList.remove("current")
        serClick.classList.remove("current")
        window.scrollTo(0,20000);

    }
}
