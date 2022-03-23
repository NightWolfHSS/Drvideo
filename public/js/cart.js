/**
 * use NATIVE JAVASCRIPT for Faster using
 * cart ready ! 
 * we use Snake case notation 
 * localStore/ pay systems work in only javascript 
 * /2021/year/
*/

/** Ready DOM*/
document.addEventListener('DOMContentLoaded', function() {
    
    /**
     * api cart ready
     */
    function api_begin() {
        // staff
        let cart = {},
        product_id,
        product_name,
        img,
        price = 0,
        push;

        /**
        * cheak cart
        * return object else boolean
        */  
        function check_data() {
            if (localStorage.getItem('coin') != undefined) {
               return cart = JSON.parse(localStorage.getItem('coin'))
            } else {
               return false 
            }
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
        * check and save
        * get data / staff 
        * add stuff in the cart and save 
        */
        function add_product() {
            // one more time cheking object 
           check_data()

           /**
           * get staff - use attribute and elems  
           */
           product_id   = this.getAttribute('article')
           img          = this.getAttribute('img')
           product_name = document.querySelector('.product_name').innerHTML
           price        = document.querySelector('.price').innerHTML
           // parse int
           priceX       = parseInt(price.replace(/[^+\d]/g, ''))

           /**
           * if there is add - else create new obj with data
           */
           if (cart.hasOwnProperty(product_id)) {
               cart[product_id][3] += 1
           } else {
               cart[product_id] = [img, product_name, priceX, 1]
           }
           save_data(cart)
           alert('добавлено')
        }

        // is there an object
        check_data()

        // hendler - run method 
        push = document.querySelector('.primary-btn').addEventListener('click', add_product, false)

    }

    // run the systems
    api_begin()

})
