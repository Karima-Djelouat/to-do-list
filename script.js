const formAddTask = document.querySelector('#formAddTask');
const tableTasks = document.querySelector('.table');
const inputTaskName = document.querySelector('#inputTaskName');
const checkboxes = document.querySelectorAll('.form-check-input');

// redirect on the DB 
const URL_ACTIONS = 'actions.php';

const updateTask = async function(e) {
    await fetch(URL_ACTIONS, {
        method: 'PUT',
        body: JSON.stringify({
            action: 'update_task',
            one: e.target.checked, // or : "e.target.checked"
            taskId: this.dataset.id
        })
    })
};

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateTask);
})

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

            const row = tableTasks.insertRow();
            const firstCell = row.insertCell();
            const secondCell = row.insertCell();

            firstCell.classList.add('text-center');

            const checkbox = document.createElement('input');
            const taskName = document.createTextNode(json.taskName);

            checkbox.type = 'checkbox';
            checkbox.addEventListener('change', updateTask)
            checkbox.classList.add('form-check-input');
            checkbox.dataset.id = json.taskId;

            firstCell.appendChild(checkbox);
            secondCell.appendChild(taskName);

            inputTaskName.value = '';
            
        })

})