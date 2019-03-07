<div class="input-group">
    <div class="input-group-btn search-panel" id="recent-order-search">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <span id="search_concept">Filter by</span> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#all" selected="selected">All</a></li> <li><a href="#custpo">Customer PO</a></li>
          <li><a href="#orderno">Order / Invoice Number</a></li> <li><a href="#itemid">Item ID</a></li> <li><a href="#tracknbr">Tracking #</a></li>
        </ul>
    </div>
    <input type="hidden" name="search-type" value="all" id="search_param-re">       
    <input type="text" class="form-control" name="query" placeholder="Search term...">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
    </span>
</div>
