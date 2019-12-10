
<html>
<body>
<script>
function logout() {
    sessionStorage.removeItem("login_success")
    sessionStorage.removeItem("cart")
}
function login() {
    sessionStorage.setItem("login_success", true)
    //document.cookie = "login_success=true";
    alert("Hi")
    document.cookie = "email=harshrajm@gmail.com";
}

function getCookie(name)
{
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
}

function addToCart() {
    
    if(!getCookie("login_success")) {
        alert("Please login to add items to cart!");
    } else {
        const item = {
            productname: docu,
            productprice: 10,
            quantity: Math.floor(Math.random() * Math.floor(3))
        };
        let currentCart = [];
        let itemexists = false;
        if(sessionStorage.getItem('cart')){
            currentCart = JSON.parse(sessionStorage.getItem('cart'));
            if(currentCart && currentCart.length) {
                currentCart.forEach(cartItem => {
                    if(item.productname === cartItem.productname) {
                        cartItem.quantity = item.quantity;
                        itemexists = true;
                    }
                })
            }
        }
        if(!itemexists) {
            currentCart.push(item);
        }
        sessionStorage.setItem("cart", JSON.stringify(currentCart))
    }
}
</script>
<button type="button" onclick="addToCart()">Add to cart</button><br><br><br>
<button type="button" onclick="login()">Login</button><br><br><br>
<button type="button" onclick="logout()">Logout</button>
</div>
</body>
</html>