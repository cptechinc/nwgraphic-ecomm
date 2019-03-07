<?php 
	foreach ($page->featureditems as $feature) {
		switch($feature->type) {
			case 'ITM':
				$itemid = $feature->id; 
				$subheading = $feature->subheading;
				include $config->paths->content."home/page-items/item.php"; 
				break;	
			case 'PCAT':
				$catid = $feature->id; 
				$subheading = $feature->subheading;
				include $config->paths->content."home/page-items/category.php"; 
				break;	
			case 'CAT':
				$catid = $feature->id; 
				$subheading = $feature->subheading;
				include $config->paths->content."home/page-items/category.php"; 
				break;
			
		}
  
	} 
?>
