function showcategorymenu(pagecat, cata, catb, catc, catd, cate) {
	//console.log( document.location.hostname);
	if (pagecat.length > 0) {
		$('#' + cata + " a").addClass("bold-active");
		var menu = [cate, catd, catc, catb, cata];
		var categories = [];
		for (var i = 0; i < menu.length; i++) {
			if (menu[i] != '') {
				categories.push(menu[i]);
			}
		}
		//FOR DEBUG
		//console.log('categories size: ' + categories.length);
		var level = 1;

		children_of(cata, categories, level);
	}

}

function children_of(cat, menu, level) {
    var jsonurl = config.urls.json.child_cat+"?cat=" + cat;


    $.getJSON(jsonurl, function(json) {
        $.each(json, function( key, child ) {
            var catid = child.catid.replace(/["'()]/g,"");
            var parent = child.sub.replace(/["'()]/g,"");
            var catlink = "<a href='"+config.urls.categories+"?cat=" + catid + "'> " + child.catdesc + "</a>";

            // if this category list exits then just add the categories under it, else make the category list then put the first list item
            if ( $( "#" + parent + "-" + catid + "-ul" ).length > 0 ) {
                //console.log('it exists');
                $("<li class='"+level+"' id="+catid+"></li>").html("<li id='"+catid+"'>"+catlink+"</li>").appendTo($("#" + parent + "-" + catid + "-ul"));
            } else {
                $("<ul id='"+parent + "-" + catid +"-ul' class='list-unstyled'></ul>").html("<li class='"+level+"' id='"+catid+"'>"+catlink+"</li>").appendTo($("#" + parent ));
                //console.log("it doesn't exist, now making " + parent + "- " + catid + "-ul");
            }

            // if this catid is in the second to last spot in the menu array then bolden that category
            // then pop the parent out of the array, then go down to the next level
            if (catid === menu[menu.length - 2]) {
                $('#' + catid + " a").addClass("bold-active");
                menu.pop();
                level = level + 1;
                children_of(catid, menu, level);
            }
        });
    });

}
