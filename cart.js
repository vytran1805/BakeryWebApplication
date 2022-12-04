// create an array that stores data to search
let filterarray=[];
let pastry = [
    {
        id:1,
        src: "pics/plain-croissant.jpg",
        name: 'croissant',
        type: 'plain croissant',
        price: 4.49,
        desc: "A buttery, flaky, French viennoiserie pastry inspired by the shape of the Austrian kipferl but using the French yeast-leavened laminated dough."},

    {
        id:2,
        src: "pics/almond-croissant.jpg",
        name: 'croissant',
        type: 'Almond Croissant',
        price: 4.99,
        desc: "A classic version of the breakfast pastry with a sweet almond filling or frangipane swirled throughout the dough and topped with toasted almonds baked right into the top."},

    {
        id:3,
        src: "pics/pain-au-chocolat.jpg",
        name: 'croissant',
        type: 'Pain au Chocolat',
        price: 4.99,
        desc: "A type of viennoiserie sweet pastry consisting of a cuboid-shaped piece of yeast-leavened laminated dough, with dark chocolate in the center."},

    {
        id:4,
        src: "pics/pain-au-raisin.jpg",
        name: 'croissant',
        type: 'Pain aux Raisin',
        price: 4.99,
        desc: "A French spiral-shaped pastry made with a combination of leavened buttery dough or sweetened bread dough, raisins, and crème pâtissière."},
   
    {
        id:5,
        src: "pics/chocolate-chip-cookies.jpg",
        name: 'cookies',
        type: 'Chocolate chip cookies',
        price: 8.49,
        desc: "Drop cookies that features chocolate chips or chocolate morsels as its distinguishing ingredient."},

    {
        id:6,
        src: "pics/peanut-butter-cookies.jpg",
        name: 'cookies',
        type: 'Peanut butter cookies',
        price: 8.49,
        desc: "A type of cookie that is distinguished for having peanut butter as a principal ingredient."},

    {
        id:7,
        src: "pics/matcha-cookies.jpg",
        name: 'cookies',
        type: 'Matcha cookies',
        price: 9.49,
        desc: "Matcha Cookies are soft and chewy sugar cookies with a beautiful bright matcha green tea flavor."},

    {
        id:8,
        src: "pics/sugar-cookies.jpg",
        name: 'cookies',
        type: 'Sugar cookies',
        price: 6.49,
        desc: "Cookies with the main ingredients being sugar, flour, butter, eggs, vanilla, and either baking powder or baking soda."},

    
    {
        id:9,
        name: 'cakes',
        src: "pics/cupcakes.jpg",
        type: 'Assorted cupcakes',
        price: 12.49,
        desc: "An assortment of flavours in 2-bite size junior cupcakes. Great treats for any event! Includes 12 different flavours in every pack. "},

    {
        id:10,
        src: "pics/macarons.jpg",
        name: 'cakes',
        type: 'Macarons',
        price: 14.49,
        desc: "A sweet meringue-based confection made with egg white, icing sugar, granulated sugar, almond meal, and food colouring."},
];
const categories = [...new Set(pastry.map((item)=>
    {return item}))]
    let i=0;
document.getElementById('root').innerHTML =categories.map((item)=>{

    var {src,name,type, price, desc} = item;
    return(
        `<div class='box'>
            <div class='img-box'>
                <img src="${src}" width="100%"/>
            </div>
            <div class='bottom'>
                <h5 class="text-capitalize text-center">${type}</h5>
                <p class="mt-2 text-end"><i>${price}</i></p>`+
                "<button id='add-to-cart-btn' onclick='addtocart("+(i++)+")'>Add to cart</button>"+
            `</div>
        </div>`
    )
}).join('')

var cart =[];

function addtocart(a){
    cart.push({...categories[a]});
    displaycart();
}
function delElement(a){
    cart.splice(a, 1);
    displaycart();
}

function displaycart(){
    let j = 0, total=0;
    document.getElementById("count").innerHTML=cart.length;
    if(cart.length==0){
        document.getElementById("cartItem").innerHTML = "Your cart is empty";
        document.getElementById("total").innerHTML = "$ "+total+".00";
    }
    else{
        document.getElementById("cartItem").innerHTML = cart.map((item)=>
        {
            var {name, type, price, desc} = item;
            //calculate total cost after each item added
            cart.forEach(function(item) {
                total=total+price;  
                return total;
            });
            document.getElementById("total").innerHTML = "$ "+total;
            
            return( 
                `<div class='cart-item'>
                    <div class='row-img'>
                        <img src="${src}" width="100%" class='rowimg'/>
                    </div>
                    <p style='font-size:12px;'>${type}</p>
                    <h2 style='font-size: 15px;'>$ ${price}.00</h2>`+
                    "<i class='fa-solid fa-trash' onclick='delElement("+ (j++) +")'></i>"+
                `</div>`
            );
        }).join('');
    }

    
}