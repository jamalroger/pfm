const form = document.querySelector('.form');
const tableBody = document.getElementById('table-body');
console.log(tableBody);


function getItems() {
    const values = data.map(element => {
        return Object.keys(element).map(key => {
            const markup = `
            <div class="form-group">
            <label class="text-capitalize" for="${key}">${key}:</label>
            <input type="text" id=${key} name=${key} value=${element[key]} class="form-control">
            </div>
            `
            return markup;
        });
    });
    values.forEach(elements => {
        elements.forEach(element => {
            form.insertAdjacentHTML('afterbegin', element);
        })

    });
}
// getItems();

//{ <tr><td></td></tr> }