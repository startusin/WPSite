<form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="search-form">
    <div class="input-group">
        <input class="form-control search-frm open_sans search-field" name="s" type="search" id="search" placeholder="Search" value="<?php echo get_search_query() ?>" aria-label="Search" autocomplete="off" />
        <button class="input-group-append submit-search s_b">
            <i class="fas fa-search srch-icon"></i>
        </button>
    </div>
</form>
