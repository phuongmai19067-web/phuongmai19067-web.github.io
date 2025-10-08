<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do List</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        #taskInput {
            width: calc(100% - 70px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #addButton {
            width: 60px;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #addButton:hover {
            background-color: #4cae4c;
        }

        #taskList {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }

        #taskList li {
            background-color: #eee;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #taskList li.completed {
            text-decoration: line-through;
            color: #888;
            background-color: #ddd;
        }

        .delete-button {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }

        .delete-button:hover {
            background-color: #c9302c;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>My To-Do List</h1>
        <input type="text" id="taskInput" placeholder="Add a new task...">
        <button id="addButton">Add</button>
        <ul id="taskList">
            </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const taskInput = document.getElementById('taskInput');
            const addButton = document.getElementById('addButton');
            const taskList = document.getElementById('taskList');

            // Function to add a new task
            function addTask() {
                const taskText = taskInput.value.trim();

                if (taskText !== "") {
                    // Create the list item and its content
                    const newTask = document.createElement('li');
                    newTask.innerHTML = `<span>${taskText}</span>
                                        <button class="delete-button">Delete</button>`;
                    
                    // Add a click listener to the new task to toggle 'completed'
                    newTask.addEventListener('click', function(event) {
                        // Check if the click was on the list item itself, not the delete button
                        if (event.target.tagName !== 'BUTTON') {
                             newTask.classList.toggle('completed');
                        }
                    });

                    // Add a click listener to the delete button
                    const deleteButton = newTask.querySelector('.delete-button');
                    deleteButton.addEventListener('click', function() {
                        taskList.removeChild(newTask);
                    });

                    // Append the new task to the list
                    taskList.appendChild(newTask);
                    
                    // Clear the input field
                    taskInput.value = "";
                }
            }

            // Listen for a click on the "Add" button
            addButton.addEventListener('click', addTask);

            // Allow adding a task by pressing the "Enter" key
            taskInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    addTask();
                }
            });
        });
    </script>

</body>
</html>