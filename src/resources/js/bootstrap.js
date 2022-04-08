import 'bootstrap';

let elements = document.querySelectorAll('[data-action="delete"]');

for (let element of [...elements]) {
    element.addEventListener('click', function () {

            let id = element.getAttribute('data-product-id');

            let url = '/workplace/change/';
            url += id;

            fetch(url, {
                method: "GET",
            }).then(() => {
                window.location.reload()
            });
        }
    )
}

