const total_users = document.getElementById('total_users');
const added_users = document.getElementById('added_users');
const updated_users = document.getElementById('updated_users');

function append(id, body, param = 'beforeend'){
    let el = document.getElementById(id);
    el.insertAdjacentHTML(param, body);
}

function add_user(){

    const user_data_length = document.getElementsByClassName("form_data").length;

    const form_div = `<br> <div class="border border-dark rounded form_data">

    <div class="form-group">
      <input type="text" class="form-control" required placeholder="Введите имя" name="users[${user_data_length}][first_name]">
    </div>

    <div class="form-group">
      <input type="text" class="form-control" required placeholder="Введите фамилию" name="users[${user_data_length}][last_name]">
    </div>

    <div class="form-group">
      <input type="email" class="form-control" required placeholder="Введите адрес электронной почты" name="users[${user_data_length}][email]">
    </div>

    <div class="form-group">
      <input type="number" class="form-control" required value="1" min="1" placeholder="Введите возраст" name="users[${user_data_length}][age]">
    </div>

  </div>`;
    append('main_div',form_div);

}

async function save_data(){

    const formData = new FormData();

    const user_data_length = document.getElementsByClassName("form_data").length;

    for(let i=0;i<user_data_length;i++){

        let user_age = document.querySelector(`input[name="users[${i}][age]"]`).value;
        let user_first_name = document.querySelector(`input[name="users[${i}][first_name]"]`).value;
        let user_last_name = document.querySelector(`input[name="users[${i}][last_name]"]`).value;
        let user_email = document.querySelector(`input[name="users[${i}][email]"]`).value;

        formData.append(`users[${i}][first_name]`,user_first_name);
        formData.append(`users[${i}][age]`,user_age);
        formData.append(`users[${i}][last_name]`,user_last_name);
        formData.append(`users[${i}][email]`,user_email);
    }


    await fetch('/api/user', {
        method: 'POST',
        body: formData
      }).then(res => res.json())
        .then(res => {
            if(res.status){
                updated_users.innerHTML = res.updated;
                added_users.innerHTML = res.created;
                total_users.innerHTML= +total_users.innerHTML + res.created;
            }

        });

    let user_div = document.getElementById('main_div');
    user_div.innerHTML = '';

    add_user()



}


async function getCountUsers(){
    await fetch('/api/user/count', {
        method: 'GET',
      }).then(res => res.json())
        .then(res => {
            if(res.status){
                total_users.innerHTML= res.datas;
            }

        });
}

async function getRandom(){
    const quantity_rand_users = document.getElementById('quantity_rand_users').value;

    await fetch(`/api/user/rand?c=${quantity_rand_users}`, {
        method: 'GET',
      }).then(res => res.json())
        .then(res => {
            if(res.status){
                let el = document.getElementById('random_users');
                el.innerHTML = '';

                for(let i=0;i<res.datas.length;i++){
                    append('random_users',`<div class="card">
                    <div class="card-body">
                      <p>имя: ${res.datas[i].first_name}</p>
                      <p>фамилию: ${res.datas[i].last_name}</p>
                      <p>адрес электронной почты: ${res.datas[i].email}</p>
                      <p>возраст: ${res.datas[i].age}</p>
                    </div>
                  </div><br>`,'beforeend');
                }
            }

        });

}

getCountUsers()
getRandom()


