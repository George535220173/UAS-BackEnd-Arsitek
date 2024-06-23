<!-- Search Form and Sorting Dropdown -->
<form method="GET" action="{{ url()->current() }}" class="mb-4 d-flex flex-column form-inline">
    <div class="d-flex w-100 mb-2">
        <div class="input-group mr-2 sort-group">
            <select name="sort" class="form-control" onchange="this.form.submit()">
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>A-Z</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Z-A</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest to Latest</option>
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest to Oldest</option>
            </select>
        </div>
        <div class="input-group flex-grow-1 search-group">
            <input type="text" name="search" class="form-control" placeholder="Search projects..." value="{{ request('search') }}">
            <span class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </span>
        </div>
    </div>
    <!-- Category Dropdown -->
    <div class="input-group category-group mt-2">
        <select name="category" class="form-control" onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
</form>
