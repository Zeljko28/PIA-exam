if ( (!document.URL.includes("login.php")) || (!document.URL.includes("signup.php"))) {
    var menuItems = document.getElementById("menu-items");  

    menuItems.style.maxHeight = "0px";

    function menuDrop(){
        if(menuItems.style.maxHeight == "0px"){
            menuItems.style.maxHeight = "200px";
        }

        else{
            menuItems.style.maxHeight = "0px";
        }
    }
}

if ( document.URL.includes("product.php")) {
        var productImg = document.getElementById("product-img");
        var smallImg = document.getElementsByClassName("small-img");

        smallImg[0].onclick = function(){
            productImg.src = smallImg[0].src;
        }

        smallImg[1].onclick = function(){
            productImg.src = smallImg[1].src;
        }

        smallImg[2].onclick = function(){
            productImg.src = smallImg[2].src;
        }

        smallImg[3].onclick = function(){
            productImg.src = smallImg[3].src;
        }


        
}



if( document.URL.includes("account.php")){
    
    var x = document.getElementById("new-password");
    var y = document.getElementById("input");
    y.onclick = () => {
        if (x.type === "password") {
            x.type = "text";
        } 
        else {
            x.type = "password";
        } 
    }
}