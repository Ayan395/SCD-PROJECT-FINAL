<header>
    <h3>Market Masters</h3>
    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/service') }}">Services</a>
        <a href="{{ url('/contact') }}">Contact</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </nav>
</header>

<div class="search-container ms-auto" style="position: relative; max-width: 300px; margin: 20px auto;">
    <input 
        type="text" 
        id="searchInput" 
        placeholder="Search for Services" 
        class="form-control"
        autocomplete="off"
    />
    <div id="searchResults" class="dropdown-menu mt-2" style="display: none; position: absolute; width: 100%; z-index: 1000;">
        <!-- Dynamic dropdown items will be added here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Event handler for search input
        $('#searchInput').on('keyup', function() {
            let query = $(this).val().trim();

            if (query.length > 0) {
                // Perform the AJAX request
                $.ajax({
                    url: '{{ url("/search-services") }}', // Adjust the URL to match your route
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        if (response.length > 0) {
                            let resultsHTML = response.map(item => 
                                `<a href="/service/${item.id}" class="dropdown-item">
                                    ${item.name}
                                </a>`
                            ).join('');
                            $('#searchResults').html(resultsHTML).show();
                        } else {
                            $('#searchResults').html('<p class="dropdown-item text-muted">No results found</p>').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                $('#searchResults').empty().hide(); // Hide results if input is empty
            }
        });

        // Hide results when clicking outside the search box
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#searchInput, #searchResults').length) {
                $('#searchResults').hide();
            }
        });
    });
</script>
