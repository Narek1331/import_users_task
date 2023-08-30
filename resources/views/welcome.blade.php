<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Import Users Task</title>
</head>
<body>
    <br>
    <div class="container">

        <div id="main_div">

        <div class="border border-dark rounded form_data">

            <div class="form-group">
              <input type="text" class="form-control" required placeholder="Введите имя" name="users[0][first_name]">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" required placeholder="Введите фамилию" name="users[0][last_name]">
            </div>

            <div class="form-group">
              <input type="email" class="form-control" required placeholder="Введите адрес электронной почты" name="users[0][email]">
            </div>

            <div class="form-group">
              <input type="number" class="form-control" required value="1" min="1" placeholder="Введите возраст" name="users[0][age]">
            </div>

          </div>

         </div>

          <div class="form-group text-center">
            <button onclick="add_user()" class="btn" >Добавить еще одного пользователя</button>
          </div>

          <br>

          <div class="text-center">
            <button class="btn btn-primary" onclick="save_data()">
                импортировать пользователей
            </button>

            <span>Всего: </span> <span class="h5" id="total_users">0</span>,
            <span>Добавлено: </span>  <span class="h5" id="added_users">0</span>,
            <span>Обновлено: </span>  <span class="h5" id="updated_users">0</span>

          </div>

          <br>

          <div class="text-center">
            <div class="form-group">
                <input type="number" value="10" min="1" class="form-control form-control-sm" onkeypress="getRandom()" onclick="getRandom()" id="quantity_rand_users">
                <small id="emailHelp" class="form-text text-muted">Введите количество пользователей, которых вы хотите видеть</small>
              </div>
          </div>

          <br>

          <div id="random_users">
          </div>

    </div>

    <script src="/js/import_usres.js"></script>
</body>
</html>
