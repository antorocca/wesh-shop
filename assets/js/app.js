/*print subcat for category*/
const categorySelect = document.getElementById('cats');

categorySelect.addEventListener('change', (event) => {
    console.log('updated');
    let catId = event.target.value;
    if (catId == "none") {
        document.getElementById('subcats').innerHTML = '';
    } else {
        fetch(`http://localhost:8080/wesh-shop/api/subcat.php?cat=${catId}`)
        .then(response => response.json())
        .then((data) => {
            let options = data
            .map(element => `<option value="${element.id}">${element.catName}</option>`)
            .join();
            document.getElementById('subcats').innerHTML = options;
            })
            .catch(err => {
                console.error(err)
            })
        }
    });

    
    // categorySelect.addEventListener('change', async (event) => {
//     let catId = event.target.value;
//     const response = await fetch(`http://localhost:8080/wesh-shop/api/soucat.php?cat=${catId}`)
//     const data = await response.json();
//     const options = data
//         .map(element => `<option value="${element.id}">${element.catName}</option>`)
//         .join();

//     document.getElementById('soucats').innerHTML = options;
// });

// if any part of this code is used you have a contractual obligation to help henry develop the front end of his site