# Laravel Task Management

![Image Alt Text](https://bintangmfhd.s3.ap-southeast-3.amazonaws.com/photos/1/Tech/Screenshot%202024-01-13%20at%2005.12.31.png)

This is a simple web application built with Laravel for managing tasks. It allows users to create, edit, delete, and reorder tasks. Additionally, it includes a bonus feature for associating tasks with projects.

## Features

-   Create tasks with information such as task name, priority, and timestamps.
-   Edit existing tasks.
-   Delete tasks.
-   Reorder tasks using drag-and-drop functionality. The priority is automatically updated based on the new order.
-   Associate tasks with projects. Users can select a project from a dropdown and view tasks associated with that project.

## Getting Started

### Prerequisites

Make sure you have the following installed on your local environment:

-   PHP
-   Composer
-   MySQL

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/BintangDiLangit/task_management.git
    ```

2. Navigate to the project directory:

    ```bash
    cd task-management
    ```

3. Install the dependencies:

    ```bash
    composer install
    ```

4. Create a copy of the `.env.example` file and rename it to `.env`. Update the database connection information.

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run the database migrations:

    ```bash
    php artisan migrate
    ```

7. (Optional) Seed the database with sample data:

    ```bash
    php artisan db:seed
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

9. Access the application at `http://localhost:8000`.

## Usage

1. Create a new task by clicking on the "Add Task" button.
2. Edit tasks by clicking on the "Edit" button next to each task.
3. Delete tasks by clicking on the "Delete" button next to each task.
4. Reorder tasks by dragging and dropping them within the list.
5. Select a project from the dropdown menu to filter tasks by project.
