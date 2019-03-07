var sitedirectory = '';
var sitepath = '/';
if (sitedirectory.length > 0) {
    sitepath = "/" + sitedirectory + "/";
}

var urls = {
    index: sitepath,
    login_record: sitepath + "ajax/json/login-record/",
    child_cat: sitepath + "ajax/json/get-cat-child/"
};
var config = {
	urls: {
		index: sitepath,
		categories: sitepath + "products/categories/",
		json: {
			login_record: sitepath + "ajax/json/login-record/",
			child_cat: sitepath + "ajax/json/get-cat-child/",
			getbillingcustid: sitepath + "ajax/json/get-billing-custid/"
		},
		load: {
			itemsearchresults: sitepath + "ajax/load/item-search-results/"
		}
		
		
	}
};
