<?php
    if (has_tableview($familyID)) {
        if (get_tview_count(session_id()) < 1) {
            $page->loaded = false;
        }
    } else {
        if (get_family_pricing_count(session_id(), $familyID) < 1) {
            $page->loaded = false;
        }
    }
?>
