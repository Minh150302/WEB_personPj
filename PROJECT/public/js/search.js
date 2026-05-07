document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    if(!searchInput) return;

    searchInput.addEventListener('keyup', function() {
        const query = this.value.trim();
        
        if(query.length < 1) {
            document.getElementById('result').innerHTML = '';
            return;
        }

        fetch(`api/search.php?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                let html = '';
                
                if(data.length === 0) {
                    html = '<div class="col-12"><p class="text-center text-muted">No foods found</p></div>';
                } else {
                    data.forEach(food => {
                        html += `
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="images/${food.image}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5>${food.name}</h5>
                                        <p class="text-muted text-sm">${food.description}</p>
                                        <p class="fw-bold">$${food.price}</p>
                                        <a href="index.php?page=detail&id=${food.id}" class="btn btn-dark w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                }
                
                document.getElementById('result').innerHTML = html;
            })
            .catch(error => console.error('Error:', error));
    });
});
