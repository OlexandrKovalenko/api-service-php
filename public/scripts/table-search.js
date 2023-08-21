const searchInput = document.querySelector('.table-search');
if (searchInput) {
    const tableCells = document.querySelectorAll('.table-cell-number');
    const tableBody = document.querySelector('.table-body');

    searchInput.addEventListener('input', function () {
        const searchText = this.value.trim().toLowerCase();
        tableCells.forEach(cell => {
            if(!cell.textContent.toLowerCase().includes(searchText))
                cell.closest('tr').setAttribute('hidden', '')

            if(cell.textContent.toLowerCase().includes(searchText))
                cell.closest('tr').removeAttribute('hidden')
        });
    });
}