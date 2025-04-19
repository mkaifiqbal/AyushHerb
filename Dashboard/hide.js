function toggleDetails(element) {
            const details = element.nextElementSibling;
            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                element.innerHTML = "<h1>Hide Details</h1>";
            } else {
                details.classList.add('hidden');
                element.innerHTML = "<h1>Show Details</h1>";
            }
        };