function ChangeState()
{
    var path = document.getElementById("changeImage").src;
    console.log(path);
    if(path.includes("imgs/sys/menu.png"))
    {
        document.getElementById("changeImage").src = "imgs/sys/cross.png";
        document.getElementById("main").style.marginLeft = "20%";
        document.getElementById("sidemenu").style.width = "20%";
    }
    else
    {
        document.getElementById("changeImage").src = "imgs/sys/menu.png";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("sidemenu").style.width = "0";
    }
}