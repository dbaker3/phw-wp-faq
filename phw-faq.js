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

    jQuery("#faq-search").keyup(function() {
        var result = idx.search(jQuery(this).val());

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
        // Show chat option of question isn't found
//        if (jQuery("#faq-search").val() != "" && result == "" && !stopWordsOnly()) {
//            jQuery("#faq-alt-assist").removeClass("hidden");
//            clearFAQList();
//        } else jQuery("#faq-alt-assist").addClass("hidden");
        addClickHandler();
    });

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

function stopWordsOnly() {
    var searchquery = jQuery("#faq-search").val().trim().toLowerCase();
    var searchqueryarray = searchquery.split(' ');
    searchqueryarray.pop(); console.log(searchqueryarray);

    for (var i = 0; i < searchqueryarray.length; i++) {
        if (searchqueryarray.indexOf(lunr.stopWordFilter.stopWords[searchqueryarray[i]]) > -1) {
            found = true;
        }
        else return false;
    }
    return true;
}