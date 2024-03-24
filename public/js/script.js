$(document).ready(function() {
    $('.sortable-icon').click(function(e) {
        e.preventDefault();
        let field = $(this).data('field');
        let order = $(this).hasClass('ascending') ? 'desc' : 'asc';
        $('.sortable-icon').removeClass('ascending descending rotate');
        $(this).addClass(order === 'asc' ? 'ascending' : 'descending rotate');

        if (field === 'name') {
            sortTable(field, order);
        }
    });
});

function sortTable(field, order) {
    let rows = Array.from(document.querySelector("tbody").querySelectorAll("tr"));
    let sortedRows = rows.sort((a, b) => {
        let aValue = a.querySelector("td:first-child").textContent.trim();
        let bValue = b.querySelector("td:first-child").textContent.trim();
        return order === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
    });

    let tbody = document.querySelector("tbody");
    tbody.innerHTML = '';
    sortedRows.forEach(row => tbody.appendChild(row));
}
