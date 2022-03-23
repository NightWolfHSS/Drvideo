/**
* v2.8.1
* simple API
* js(es6), ajax, jquery - READY!
* other app
* Try TinyMCE plugin
* generate input images 
*/

// DRY !!!
//DOM-loaded
jQuery(document).ready(function($){
	//show
	$(".jx_open_list>p").mouseover(function(e){
		e.stopPropagation()
		$(".list").show("slow")
	})

	// for app
	$(".jx_open_app>p").mouseover(function(e){
		e.stopPropagation(e)
		$(".app").show("slow")
	})

	// show/hide - menu (moble)
	$(".push").mouseover(function() {
		$(".menu_x").toggle("slow")
	})

	// show/hide - aside (mobel)
	$(".as-t img").mouseover(function(){
		$(".aside").toggle("slow")	
	})
	// show/hide - add (mobel)
	$(".added").mouseover(function(e){
		e.stopPropagation(e)
		$(".add").show("slow")
	})

	$(".content").mouseover(function(){
		$(".list, .app, .add").hide("slow")
		return false
	})

	/*
	* just
	* poppup 
	*/
	$(".lx").click(function(){
		$(".top").css("top", "0px")
	})
	// hide
	$(".but_blue").click(function(){
		$(".top").css("top", "2000px")
	})

	/**
	 * Only admin staf 
	 * static url redirect
	 */
	$(".edit_itmx_one").click(function(){
		window.location.href = '/items'
	})
	// analog
	$(".edit_itmx_two").click(function(){
		window.location.href = '/add'
	})
	// analog
	$(".edit_itmx_three").click(function(){
		window.location.href = '/controllargs'
	})
	// analog
	$(".edit_itmx_five").click(function(){
		window.location.href = '/edito_admin'
	})

	/**
	* generate input add files
	* add button file and images
	*/
	$(".add_x").click(function() {
		renderHtml()
	})

	// create html
	$("body").on("click", ".move", function(e) {
		renderHtml()
	})

	// render
	function renderHtml() {
		$(".wp_images").append(
			"<div class='send_x'>"+
				"<label>загружаем картинку</label>"+
				"<input type='file' name='images[]' multiple='multiple' accept='image/'>"+
				"<div class='add_x move'>добавить загрузку картинки</div>"+
			"</div>"
		)
	}

	/**
	 * Start API
	 * save placeholder
	 * localStorage / 
	 * input save value
	 */
	function setDataSelectors(){
		$(".reload").each(function(index){
			let key = "input-"+index
			let value = $(this).val()
			localStorage.setItem(key, value)
		})
	} 	

	// call setDataSelectors
	$(".send_push").mouseenter(function(){
		setDataSelectors()
	})
	
	/**
	 * get each selector and 
	 * save in input data
	 * only add - Page
	 */
	let cheak_only_add_page = $(".page_current_add").attr("moxes")
	if(cheak_only_add_page === "val") {
		// method ready
		$(".reload").each(function(i){
			let key = "input-"+i
			for(let i = 0; i < localStorage.length; i++) {
				$(this).val(localStorage.getItem(key))
			}
		})		
		// just clear all localStorage
		$(".clear_data").click(function(){
			localStorage.clear()
			window.location.href = "/add"
		})
	}


	/**
	 * only (admin) tamplate config-admin
	 */
	if(window.location.href == "https://shoptd.kz/edito_admin") {
		// opt-slider option-menu-slider
		$(".opt-slider").click(function(e){
			e.preventDefault();
			$(".option-menu-slider").toggle("slow")
		})
		// opt_pieces menu
		$(".opt_pieces").click(function(e){
			e.preventDefault();
			$(".option-menu-opt-pieces").toggle("slow")
		})
		// partners menu
		$(".opt_partner").click(function(e){
			e.preventDefault();
			$(".option-menu-partners").toggle("slow")
		})
		// footer menu
		$(".opt_footer").click(function(e){
			e.preventDefault();
			$(".option-menu-footer").toggle("slow")
		})
		// footer mini
		$(".opt_mini").click(function(e){
			e.preventDefault();
			$(".option-menu-mini").toggle("slow")
		})
		// footer icon
		$(".opt_icon").click(function(e){
			e.preventDefault();
			$(".option-menu-icon").toggle("slow")
		})
	} 

})


