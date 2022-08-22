const formAddTask = document.querySelector('#formAddTask');

// redirect on the DB 
const URL_ACTIONS = 'actions.php';

// add event listener on submit
formAddTask.addEventListener('submit', async function (e) {
    e.preventDefault();

    // get data from the form
    const formData = new FormData(e.target);

    // send POST to create a task
    await fetch(URL_ACTIONS, {
        method: 'POST',
        body: formData
    })
        .then(data => data.json())
        .then(json => {
            // if code is not add task, then function stops
            if (json.code !== 'ADD_TASK_OK') return;
        })

})