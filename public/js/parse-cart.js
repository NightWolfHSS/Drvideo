/**
 * Rendering stuff the cart
 * show data and pay
 */

/* the stuff */
let wp_content = document.querySelector('.list_staf')
let product_id, img, product_name, price, 
show_total = document.querySelector('.total').innerHTML = 0 
let cart = {}

/**
 * cheak cart
 * return object else boolean
 */  
function check_data() {
    if (localStorage.getItem('coin') != undefined) {
        cart = JSON.parse(localStorage.getItem('coin'))
        if (JSON.stringify(cart) === '{}') {
            return false
        } else {
            return cart
        }
    } else {
        return false 
    }
}


/* Load items and show it*/
generate_cart()
/* buttons ready */
manipulations_stuff_ready()

/**
 * total Summ 
 * return array [items]
 */
function total_the_summ() {
    let total_sm = []
    for(let key in cart) {
        total = cart[key][2] * cart[key][3] 
        total_sm.unshift(total)
    }
    return total_sm
}

/**
 * total Summ
 * return result 
 */
function total_res_ready() {
    total = total_the_summ()
    let total_item = 0;
    for(var i in total) {
         total_item += total[i]
    }
    // console.log(total_item)
    return total_item
}


/**
 * just save in localStorage
 * converting in string values
 */
function save_data(data) {
    localStorage.setItem('coin', JSON.stringify(data))
    return false
}

/**
 * cart generate data
 * return [null] or [values]
 */
function generate_cart() {
    /* get data or null */
    cart_staff = check_data()
    show_total = document.querySelector('.total').innerHTML = total_res_ready()

    /* get and show info/data */
    if (cart_staff != false) {
    stuff = ''
    for (let items in cart) {
        stuff += '<div class="box_item">' +

                    '<div class="logo_item">' +
                        '<img src=' + cart[items][0] + ' alt="logo">' +
                    '</div>' +

                    '<div class="text_item">' +
                        '<p>'+'Название товара: ' + cart[items][1] + '</p>' +
                        '<div class="enter_more">' + 
                            '<i class="pl fa fa-plus-circle" aria-hidden="true" article="' + items + '" img="' + cart[items][0] + '" product_name="' + cart[items][1] + '" price="' + cart[items][2] + '"></i>' + ' '+
                            '(' + cart[items][3] + ')' + ' шт.'+
                            '<i class="mn fa fa-minus-circle" aria-hidden="true"article="' + items + '" img="' + cart[items][0] + '" product_name="' + cart[items][1] + '" price="' + cart[items][2] + '"></i>' +
                            '(' + cart[items][2] * cart[items][3] +  ') тг' +
                            '<i class="del fa fa-times" aria-hidden="true" article="' + items + '"></i> удалить' +
                        '</div>' +
                    '</div>' +
                '</div>'
                
    }
        wp_content.innerHTML = stuff // show content
    } else {
        wp_content.innerHTML = '<div class="spl-line"> ' + 
                                    '<p>корзина пуста </p>' +  
                               '</div>'
    }   

    // buttons ready
    manipulations_stuff_ready()
}


/**
 * all methods ready
 * add/delete/clear
 */
function manipulations_stuff_ready() {
    // botton
    let add = document.querySelectorAll('.pl')
    let min = document.querySelectorAll('.mn')
    let del = document.querySelectorAll('.del')

    // define event for button
    if (add && min && del != null) {
        for(let item = 0; item < add.length; item++) {
            add[item].addEventListener('click', addItem, false)
        }
        for(let item = 0; item < min.length; item++) {
            min[item].addEventListener('click', removeItem, false)
        }
        for(let item = 0; item < del.length; item++) {
            del[item].addEventListener('click', clear, false)
        }
    }
}

/** 
* get data / staff
* add and save 
*/
function addItem() {
    /**
    * get staff - use attribute and elems  
    */
    product_id = this.getAttribute('article')
    /* add item */
    if (cart.hasOwnProperty(product_id)) {
        cart[product_id][3] += 1
    } 

    // the save
    save_data(cart)
    // refresh data
    generate_cart()
}

/** 
* get data / staff
* remove end save
*/
function removeItem() {

    /**
    * get staff - use attribute
    */
    product_id = this.getAttribute('article')

    /**
    * delete current elem if product == 0 
    */
    if (cart.hasOwnProperty(product_id)) {
        cart[product_id][3] += -1
        if (cart[product_id][3] == 0) {
            delete cart[product_id]
        }
    }    

    // the save
    save_data(cart)
    // refresh data
    generate_cart()
}


/**
 * Delete current product
 */
function clear() {

    /**
    * get staff - use attribute
    */
     product_id = this.getAttribute('article')

     /**
     * delete current elem product 
     */
    delete cart[product_id]

    // the save
    save_data(cart)
    // refresh data
    generate_cart()
}