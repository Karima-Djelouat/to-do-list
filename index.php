<?php
include_once 'functions.php'
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello, World!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>

  <body>

    <div class="container">

      <div class="row mt-3">
        <div class="col offset-2">
          <h1>Tasks</h1>
        </div>
      </div>

      <form class="row mt-3" id="formAddTask">
        <input type="hidden" name="action" value="add_task">

        <div class="col-6 offset-2">
          <label for="inputTaskName" class="visually-hidden">Tasks</label>
          <input type="text" class="form-control" name="taskName" id="inputTaskName" placeholder="Add your task" required>
        </div>

        <div class="col-4">
          <button type="submit" class="btn btn-primary mb-3">Add</button>
        </div>

      </form>

      <div class="row">
        <div class="col-7 offset-2">
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <th>Done</th>
              <th>Name</th>
            </thead>
            <tbody>
              <tr>
                <td class="text-center" style="width: 10%;"><input type="checkbox" class="form-check-input"></td>
                <td>Task name</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>

</html>