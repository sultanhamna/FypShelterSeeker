<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Finder</title>
</head>
<body>
    <h1>Property Finder</h1>

    <!-- Initial Filter Form -->
    <form id="initial-filter-form">
        <label for="post_id">Select Post:</label>
        <select id="post_id" name="post_id">
            <option value="">Select Post</option>
        </select>

        <label for="location_id">Select Location:</label>
        <select id="location_id" name="location_id">
            <option value="">Select Location</option>
        </select>

        <button type="submit">Search Properties</button>
    </form>

    <!-- Property List -->
    <div id="property-list"></div>

    <!-- Filter Properties Button -->
    <button id="filter-button">Filter Properties</button>

    <!-- Additional Filters Form (Initially Hidden) -->
    <form id="filter-form" style="display: none;">
        <label for="category_id">Select Category:</label>
        <select id="category_id" name="category_id">
            <option value="">Select Category</option>
        </select>

        <label for="type_id">Select Type:</label>
        <select id="type_id" name="type_id">
            <option value="">Select Type</option>
        </select>

        <button type="submit">Apply Filters</button>
    </form>

    <script>
        const initialFilterForm = document.getElementById('initial-filter-form');
        const filterForm = document.getElementById('filter-form');
        const filterButton = document.getElementById('filter-button');
        const propertyListDiv = document.getElementById('property-list');

        let postId = null;
        let locationId = null;
        let categoryId = null;
        let typeId = null;

        // Function to populate a select dropdown with options
        const populateSelectOptions = (selectId, data, valueField, textField) => {
            const selectElement = document.getElementById(selectId);
            const optionsHtml = data.map(item => `<option value="${item[valueField]}">${item[textField]}</option>`).join('');
            selectElement.innerHTML += optionsHtml;
        };

        // Populate post options dynamically
        fetch('http://localhost:8000/api/post')
            .then(response => response.json())
            .then(data => populateSelectOptions('post_id', data.posts, 'id', 'post_name'))
            .catch(error => console.error('Error fetching post options:', error));

        // Populate location options dynamically
        fetch('http://localhost:8000/api/location')
            .then(response => response.json())
            .then(data => populateSelectOptions('location_id', data.locations, 'id', 'location_name'))
            .catch(error => console.error('Error fetching location options:', error));

        // Populate category options dynamically
        fetch('http://localhost:8000/api/category')
            .then(response => response.json())
            .then(data => populateSelectOptions('category_id', data.categories, 'id', 'category_name'))
            .catch(error => console.error('Error fetching category options:', error));

        // Populate type options dynamically
        fetch('http://localhost:8000/api/type')
            .then(response => response.json())
            .then(data => populateSelectOptions('type_id', data.types, 'id', 'type_name'))
            .catch(error => console.error('Error fetching type options:', error));

        // Handle initial filter form submission
        initialFilterForm.addEventListener('submit', (e) => {
            e.preventDefault();
            postId = document.getElementById('post_id').value;
            locationId = document.getElementById('location_id').value;
            fetchProperties(postId, locationId, null, null);
        });

        // Show additional filters form
        filterButton.addEventListener('click', () => {
            filterForm.style.display = 'block';
        });

        // Handle additional filters form submission
        filterForm.addEventListener('submit', (e) => {
            e.preventDefault();
            categoryId = document.getElementById('category_id').value;
            typeId = document.getElementById('type_id').value;
            fetchProperties(postId, locationId, categoryId, typeId);
        });

        // Function to fetch properties based on filters
        function fetchProperties(postId, locationId, categoryId, typeId) {
            const url = new URL('http://localhost:8000/api/properties');
            const params = new URLSearchParams({
                post_id: postId,
                location_id: locationId,
                category_id: categoryId,
                type_id: typeId
            });
            url.search = params.toString();

            fetch(url.toString(), {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                const propertyListHtml = data.properties.map(property => `
                    <div>
                        <h2>${property.category}</h2>
                        <p>Type: ${property.type}</p>
                        <p>Location: ${property.location}</p>
                        <p>Price: ${property.price}</p>
                        <p>Description: ${property.description}</p>
                        <img src="${property.images[0].images}" alt="Property Image" style="max-width: 200px;">
                    </div>
                `).join('');
                propertyListDiv.innerHTML = propertyListHtml;
            })
            .catch(error => console.error('Error fetching properties:', error));
        }
    </script>
</body>
</html>
