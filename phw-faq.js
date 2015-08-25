jQuery(document).ready(function() {

    //lunr.stopWordFilter.stopWords = {};
    
    var idx = lunr(function () {
        this.field('question', { boost: 10 });
        this.field('tags');
        this.field('answer');
    });

    faq.forEach(function(name) {
      idx.add(name);
    });

    var originalFAQList = jQuery("#faq-list").clone();

    var result;
    jQuery("#faq-search").keyup(function() {
        result = idx.search(jQuery(this).val());

        if (jQuery("#faq-search").val() == "" || result == "") {
            jQuery("#faq-list").replaceWith(originalFAQList.clone());
            jQuery("#faq-list .acc-sublist").addClass("hidden");
        }
        else {
            clearFAQList();
            result.forEach(function(item) {
                faq.forEach(function(q) {
                    if (item.ref == q.id) {
                        addQAItem(q);
                    }
                });
            });
    
        }
        addClickHandler();
    });

    function clearFAQList() {jQuery("#faq-list").empty();}

    function addQAItem(q) {
        jQuery("#faq-list").append("<div class='acc-list'><a class='acc-list-category'>" + q.question + "</a><div class='acc-sublist hidden'>" + q.answer + "</div></div>");      
    }

    function addClickHandler() {
        jQuery( '.acc-list-category' ).click( function() {
    		jQuery( this ).parent().children('.acc-sublist').toggleClass('hidden');
    		jQuery( this ).parent().toggleClass('open-item');
    	});
    }

});