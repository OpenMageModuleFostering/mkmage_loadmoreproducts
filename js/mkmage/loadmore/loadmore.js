
jQuery( document ).ready(function() {
	if (jQuery("#type_of_load").val() == 'button') {
		jQuery("#load_on_click").on( "click", function() {
			loadMore();
		});
	}
	if (jQuery("#type_of_load").val() == 'scroll') {
		jQuery("#load_on_click").css("display","none");
		function bindScroll(){
		   if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 1) {
			   jQuery(window).unbind('scroll');
			   if(!jQuery('#endCollection').length) {
			   		loadMore();
			   		jQuery(window).bind('scroll', bindScroll);		
				}
		   }
		}
		 jQuery(window).scroll(bindScroll);
	}
});

function loadMore()
{
  // console.log("More loaded");
   	var url = jQuery("#loadmore_ajax").val();
	var page = jQuery("#page_num").val();
	var num_spetps = jQuery("#num_spetps").val();
	var subcat_ajax = jQuery("#subcat_ajax").val();
	var product_id_ajax = jQuery("#product_id_ajax").val();
	var item_per_load = jQuery("#item_per_load").val();
	var obj = {
		"page": page,
		"category": subcat_ajax,
		"item_per_load": item_per_load,
		"product": product_id_ajax
	};
	//console.log(obj);
		if (parseInt(parseInt(page)+2) > num_spetps) { 
			jQuery("#load_on_click").css("display","none");
		}
		if (page < num_spetps) {
			jQuery("#page_num").val(parseInt(parseInt(page)+1));
			console.log()
			var request = jQuery.ajax({ 
				url: url,
				data: obj, 
				type: 'POST',
				beforeSend: function(){ jQuery("#loadingicon").css("display","block"); },
				dataType: 'html'
			});
		
			request.done(function(data){
				//console.log(data);
				jQuery('#loadmore').append(data);
				jQuery("#loadingicon").css("display","none");
				if(jQuery('#endCollection').length) {
					if(jQuery('#endCollection').val()) {
						jQuery("#load_on_click").remove();
					}				
				}
			});
		} 
 }

