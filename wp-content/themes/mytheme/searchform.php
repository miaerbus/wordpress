<form action="/wordpress" type="get">
    <label for="search">Search</label>
    <input type="hidden" name="cat" value="6">
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" required>
    <button type="submit">Search!</button>
</form>