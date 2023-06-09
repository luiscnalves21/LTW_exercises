function attachBuyEvents() {
    for (const button of document.querySelectorAll('#products button')) {
        button.addEventListener('click', function(e) {
            const article = e.currentTarget.parentElement;

            const id = article.getAttribute('data-id');
            const row = document.querySelector(`#cart table tr[data-id="${id}"]`);

            const name = article.querySelector('h2').textContent;
            const price = article.querySelector('.price').textContent;
            const quantity = article.querySelector('.quantity').value;
            
            if (row) updateRow(row, price, quantity);
            else addRow(id, name, price, quantity);

            updateTotal();
        });
    }
}

function addRow(id, name, price, quantity) {
    const table = document.querySelector('#cart table');
    const row = document.createElement('tr');
    row.setAttribute('data-id', id)

    const idCell = document.createElement('td');
    idCell.textContent = id;

    const nameCell = document.createElement('td');
    nameCell.textContent = name;

    const quantityCell = document.createElement('td');
    quantityCell.textContent = quantity;

    const priceCell = document.createElement('td');
    priceCell.textContent = price;

    const totalCell = document.createElement('td');
    totalCell.textContent = parseInt(quantity)*parseInt(price);

    const deleteCell = document.createElement('td');
    deleteCell.classList.add('delete');
    deleteCell.innerHTML = '<a href="">X</a>';
    deleteCell.querySelector('a').addEventListener('click', function(e) {
        e.preventDefault();
        e.currentTarget.parentElement.parentElement.remove();
        updateTotal();
    });
    
    row.appendChild(idCell);
    row.appendChild(nameCell);
    row.appendChild(quantityCell);
    row.appendChild(priceCell);
    row.appendChild(totalCell);
    row.appendChild(deleteCell);

    table.appendChild(row);
}

function updateRow(row, price, quantity) {
    const quantityCell = row.querySelector('td:nth-child(3)');
    const totalCell = row.querySelector('td:nth-child(5)');

    quantityCell.textContent = parseInt(quantityCell.textContent) + parseInt(quantity);
    totalCell.textContent = parseInt(quantityCell.textContent) * parseInt(price);
}

function updateTotal() {
    const rows = document.querySelectorAll('#cart table > tr');
    const values = [...rows].map(r => parseInt(r.querySelector('td:nth-child(5)').textContent));
    const total = values.reduce((t, v) => t + v, 0);
    document.querySelector('#cart table tfoot th:last-child').textContent = total;
}

attachBuyEvents();
