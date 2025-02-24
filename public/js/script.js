function toggleMenu() {
    const navMenu = document.getElementById('nav-menu');
    navMenu.classList.toggle('active');
}

document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('search-bar');
    const searchResults = document.getElementById('search-results');

    // Event listener for search bar input
    searchBar.addEventListener('input', function () {
        const query = searchBar.value.trim();

        if (query.length > 0) {
            // AJAX request to fetch search results
            fetch(`/search-services?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    // Clear previous results
                    searchResults.innerHTML = '';

                    // Check if there are results
                    if (data.services.length > 0) {
                        data.services.forEach(service => {
                            const li = document.createElement('li');
                            li.className = 'dropdown-item';
                            li.innerHTML = `
                                <div style="display: flex; align-items: center;">
                                    <img src="/storage/${service.image}" alt="${service.title}" style="width: 40px; height: 40px; margin-right: 10px; border-radius: 5px;">
                                    <div>
                                        <span style="font-weight: bold;">${service.title}</span><br>
                                        <span style="font-size: 12px; color: gray;">${service.description.substring(0, 50)}...</span>
                                    </div>
                                </div>
                            `;
                            searchResults.appendChild(li);
                        });

                        searchResults.style.display = 'block';
                    } else {
                        searchResults.innerHTML = '<li class="dropdown-item text-center">No results found</li>';
                        searchResults.style.display = 'block';
                    }
                })
                .catch(error => console.error('Error fetching search results:', error));
        } else {
            searchResults.style.display = 'none';
        }
    });
});
