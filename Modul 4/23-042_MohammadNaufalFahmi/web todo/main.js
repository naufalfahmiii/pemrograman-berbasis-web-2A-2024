const taskInput = document.getElementById("task");
const addBtn = document.getElementById("add");
const taskList = document.getElementById("taskList");

// Add task
addBtn.addEventListener("click", () => {
    const taskText = taskInput.value.trim();
    if (taskText !== "") {
        createTask(taskText);
        taskInput.value = "";
    }
});

// Create a new task
function createTask(text) {
    const taskItem = document.createElement("li");
    const span = document.createElement("span");
    span.textContent = text;

    const deleteBtn = document.createElement("button");
    deleteBtn.textContent = "Delete";
    deleteBtn.className = "delete";

    const editBtn = document.createElement("button");
    editBtn.textContent = "Edit";
    editBtn.className = "edit";

    taskItem.appendChild(span);
    taskItem.appendChild(editBtn);
    taskItem.appendChild(deleteBtn);
    taskList.appendChild(taskItem);

    // Delete task
    deleteBtn.addEventListener("click", () => {
        if (!taskItem.classList.contains("completed")) {
            taskItem.remove();
        } else {
            alert("Completed tasks cannot be deleted.");
        }
    });

    // Edit task
    editBtn.addEventListener("click", () => {
        if (!taskItem.classList.contains("completed")) {
            const newText = prompt("Edit your task", span.textContent);
            if (newText !== null && newText.trim() !== "") {
                span.textContent = newText.trim();
            }
        } else {
            alert("Completed tasks cannot be edited.");
        }
    });

    // Mark completed
    taskItem.addEventListener("click", (event) => {
        if (event.target === taskItem || event.target === span) {
            taskItem.classList.toggle("completed");
        }
    });
}
