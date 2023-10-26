
    document.getElementById('categoryFilter').addEventListener("change", function() {
        let form = document.getElementById('filterForm');
        loadFilterResults(form);
    });

    function loadFilterResults(form) {
        const xhr = new XMLHttpRequest()
        let formData = new FormData(form);
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('filterResults').innerHTML = xhr.responseText;
            }
        };
        xhr.addEventListener('error', function() {
            console.log("Error");
        });

        xhr.open('POST', form.action);
        xhr.send(formData);
    }

