<form role="search" method="get" class="search-form search-wrapper" action="<?php echo home_url( '/' ); ?>">
    <input type="search"
           id="search" 
           class="search-field"
           placeholder="<?php echo esc_attr_x( 'Type here...', 'placeholder' ) ?>"
           value="<?php echo get_search_query() ?>"
           name="s"
           autocomplete="off"
    />
    <button type="submit" class="search-button">
        <img class="mobile-search-icon" src="<?php module_img('search.svg'); ?>" alt="Search" />
        <span class="desktop-search">Search</span>
    </button>
</form>