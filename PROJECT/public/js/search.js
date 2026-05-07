document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    if (!searchInput) return;

    const resultContainer = document.getElementById('result');
    let timeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(timeout);
        const query = this.value.trim();

        if (query.length < 2) {
            resultContainer.innerHTML = '';
            return;
        }

        timeout = setTimeout(function() {
            fetch('app/api/search.php?q=' + encodeURIComponent(query))
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        resultContainer.innerHTML = '<p class="col-12 text-center">No results found</p>';
                        return;
                    }

                    let html = '';
                    data.forEach(food => {
                        html += `
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="images/${food.image}" class="card-img-top" style="height: 250px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5>${food.food_name}</h5>
                                        <p class="text-muted small">${food.description}</p>
                                        <p class="fw-bold">$${food.price}</p>
                                        <a href="index.php?page=detail&id=${food.id}" class="btn btn-dark w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    resultContainer.innerHTML = html;
                })
                .catch(error => {
                    console.error('Search error:', error);
                    resultContainer.innerHTML = '<p class="col-12 text-center text-danger">Search error</p>';
                });
        }, 300);
    });
});
