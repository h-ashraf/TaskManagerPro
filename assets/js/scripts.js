document.addEventListener("DOMContentLoaded", function () {
    // Fetch all tasks
    const fetchTasks = (filter = '') => {
        fetch(`../api/tasks.php${filter ? `?filter=${filter}` : ''}`)
            .then(response => response.json())
            .then(tasks => {
                const tableBody = document.querySelector("#taskTable tbody");
                tableBody.innerHTML = "";
                tasks.forEach(task => {
                    tableBody.innerHTML += `
                        <tr>
                            <td>${task.id}</td>
                            <td>${task.title}</td>
                            <td>${task.description}</td>
                            <td>${task.due_date}</td>
                            <td>${task.status}</td>
                            <td>
                                <button class="btn btn-success mark-completed" data-id="${task.id}">Complete</button>
                                <button class="btn btn-danger delete-task" data-id="${task.id}">Delete</button>
                            </td>
                        </tr>
                    `;
                });
            });
    };

    // Event Listener for Task Actions
    document.body.addEventListener("click", (e) => {
        const target = e.target;
        if (target.classList.contains("mark-completed")) {
            const taskId = target.getAttribute("data-id");
            fetch(`../api/tasks.php`, {
                method: "PUT",
                body: `id=${taskId}&status=Completed`,
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    fetchTasks();
                });
        } else if (target.classList.contains("delete-task")) {
            const taskId = target.getAttribute("data-id");
            if (confirm("Are you sure you want to delete this task?")) {
                fetch(`../api/tasks.php`, {
                    method: "DELETE",
                    body: `id=${taskId}`,
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        fetchTasks();
                    });
            }
        }
    });

    // Event Listener for Filter
    document.querySelector("#filterTasks").addEventListener("change", (e) => {
        const filter = e.target.value;
        fetchTasks(filter);
    });

    // Fetch tasks on page load
    fetchTasks();
});
