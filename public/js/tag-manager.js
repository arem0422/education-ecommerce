dataLayer = [];

function _getItemGoogle(item) {
    //{"id":pid,"idlms":idlms,"nombre":pname, "precio":pprice, "pold":ppriceold,"imagen":pimg, "profname":nombreprof}
    return {
        item_id: item.id,
        item_name: item.nombre, // Name or ID is required.
        price: sanitizerNumber(item.precio),
        quantity: 1,
        currency: "CLP",
        item_brand: "Sasi",
    };
}

function sanitizerNumber(n){

    let m = n.replace('$','');
    m = m.replace('.','');
    m = m.trim();

    return parseInt(m);
}

function _getProductos() {
    let items = [];
    try {
        let carro = JSON.parse(sessionStorage.getItem("carrito"));
        for (i = 0; i < carro["productos"].length; i++) {
            items.push(_getItemGoogle(carro["productos"][i]));
        }
    } catch (error) {
        console.log(error);
    }

    return items;
}
/**
 * A function to handle a click on a checkout button.
 */
function begin_checkout(items) {
    dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
    dataLayer.push({
        event: "begin_checkout",
        ecommerce: {
            items: _getProductos(),
        },
    });
}

function purchase(compra) {

    dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
    dataLayer.push({
        event: "purchase",
        ecommerce: {
            compra,
            items: _getProductos(),
            value: compra.total_compra,// Valor total del carro
            transaction_id: compra.n_orden // Número de orden de compra
        },
    });
}

function add_to_cart(item) {
    // Measure when a product is added to a shopping cart
    dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
    dataLayer.push({
        event: "add_to_cart",
        ecommerce: {
            items: [_getItemGoogle(item)],
        },
    });
}

function remove_to_cart(item) {
    // Measure the removal of a product from a shopping cart.
    dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
    dataLayer.push({
        event: "remove_from_cart",
        ecommerce: {
            items: [_getItemGoogle(item)],
        },
    });
}
