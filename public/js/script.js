const form = document.querySelector('.form');
console.log(data);

function getItems() {
    const values = data.map(element => {
        const markup = `
            <div class="form-group">
            <label class="text-capitalize" for="${element}">${element}:</label>
            <input type="text" id=${element} name=${element} class="form-control">
            </div>
            `
        return markup;
    });
    //console.log(values);
    values.forEach(element => {
        form.insertAdjacentHTML('afterbegin', element);

    });
}

// getItems();

// // getItems();

// //{ <tr><td></td></tr> }